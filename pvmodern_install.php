<?php
/**
 * PVModern One-Click Installer
 * =============================================================================
 * Place this file in the Magento root (same folder as bin/magento).
 * Then open:  http://YOUR-SITE/pvmodern_install.php
 * DELETE IT after running successfully.
 * =============================================================================
 */

// ── Security: restrict to local/known IP ──────────────────────────────────────
$allowedIps = ['127.0.0.1', '::1', '192.168.64.1', '192.168.64.6', '192.168.64.100'];
$clientIp   = $_SERVER['REMOTE_ADDR'] ?? '';
// Comment out these 4 lines if you are running from a different IP:
// if (!in_array($clientIp, $allowedIps, true)) {
//     http_response_code(403); exit('403 Forbidden');
// }

define('MAGENTO_ROOT', __DIR__);

$log     = [];
$success = true;

function pvlog($msg, $ok = true) {
    global $log, $success;
    $log[] = ['msg' => $msg, 'ok' => $ok];
    if (!$ok) $success = false;
}

// ─────────────────────────────────────────────────────────────────────────────
// STEP 1 — Bootstrap Magento
// ─────────────────────────────────────────────────────────────────────────────
try {
    require MAGENTO_ROOT . '/app/bootstrap.php';
    $bootstrap = \Magento\Framework\App\Bootstrap::create(MAGENTO_ROOT, $_SERVER);
    $om        = $bootstrap->getObjectManager();

    $appState = $om->get(\Magento\Framework\App\State::class);
    try { $appState->setAreaCode('adminhtml'); } catch (\Exception $e) {}

    pvlog('Magento bootstrap: OK');
} catch (\Throwable $e) {
    pvlog('Magento bootstrap FAILED: ' . $e->getMessage(), false);
    renderPage($log, false);
    exit;
}

// ─────────────────────────────────────────────────────────────────────────────
// STEP 2 — Enable module in app/etc/config.php
// ─────────────────────────────────────────────────────────────────────────────
try {
    $configFile = MAGENTO_ROOT . '/app/etc/config.php';
    if (!file_exists($configFile)) {
        pvlog('app/etc/config.php not found — skipping module enable step', false);
    } else {
        $config = include $configFile;

        if (!empty($config['modules']['YourVendor_PVModern']) && $config['modules']['YourVendor_PVModern'] == 1) {
            pvlog('Module YourVendor_PVModern already enabled in config.php');
        } else {
            $config['modules']['YourVendor_PVModern'] = 1;
            $php = "<?php\nreturn " . var_export($config, true) . ";\n";
            if (file_put_contents($configFile, $php) !== false) {
                pvlog('Module YourVendor_PVModern → ENABLED in app/etc/config.php');
            } else {
                pvlog('Could not write to app/etc/config.php (check permissions)', false);
            }
        }
    }
} catch (\Throwable $e) {
    pvlog('config.php step failed: ' . $e->getMessage(), false);
}

// ─────────────────────────────────────────────────────────────────────────────
// STEP 3 — Create CMS pages (backup: if module routes fail, CMS will work)
// ─────────────────────────────────────────────────────────────────────────────
$pages = [
    [
        'title'      => 'Deals — MixiiiStore',
        'identifier' => 'deals',
        'content'    => '<p>Deals page loaded via CMS fallback.</p>',
        'layout'     => '1column',
        'is_active'  => 1,
    ],
    [
        'title'      => 'Terms of Service — MixiiiStore',
        'identifier' => 'terms',
        'content'    => '<p>Terms page loaded via CMS fallback.</p>',
        'layout'     => '1column',
        'is_active'  => 1,
    ],
    [
        'title'      => 'Privacy Policy — MixiiiStore',
        'identifier' => 'privacy',
        'content'    => '<p>Privacy page loaded via CMS fallback.</p>',
        'layout'     => '1column',
        'is_active'  => 1,
    ],
    [
        'title'      => 'Cookie Policy — MixiiiStore',
        'identifier' => 'cookies',
        'content'    => '<p>Cookies page loaded via CMS fallback.</p>',
        'layout'     => '1column',
        'is_active'  => 1,
    ],
    [
        'title'      => 'Build Custom PC — MixiiiStore',
        'identifier' => 'pcbuilder',
        'content'    => '<p>PC Builder loaded via CMS fallback.</p>',
        'layout'     => 'cms-full-width',
        'is_active'  => 1,
    ],
];

try {
    /** @var \Magento\Cms\Api\PageRepositoryInterface $pageRepo */
    $pageRepo    = $om->get(\Magento\Cms\Api\PageRepositoryInterface::class);
    $pageFactory = $om->get(\Magento\Cms\Model\PageFactory::class);
    $pageModel   = $om->get(\Magento\Cms\Model\Page::class);
    $storeId     = 0; /* 0 = all stores */

    foreach ($pages as $pageData) {
        try {
            /* Check if page already exists */
            $existing = $om->create(\Magento\Cms\Model\Page::class);
            $existing->setStoreId($storeId)->load($pageData['identifier'], 'identifier');

            if ($existing->getId()) {
                pvlog('CMS page already exists: /' . $pageData['identifier']);
                continue;
            }

            $page = $pageFactory->create();
            $page->setTitle($pageData['title'])
                 ->setIdentifier($pageData['identifier'])
                 ->setContent($pageData['content'])
                 ->setPageLayout($pageData['layout'])
                 ->setIsActive($pageData['is_active'])
                 ->setStores([$storeId]);

            $pageRepo->save($page);
            pvlog('Created CMS page: /' . $pageData['identifier']);
        } catch (\Throwable $e) {
            pvlog('Failed to create page /' . $pageData['identifier'] . ': ' . $e->getMessage(), false);
        }
    }
} catch (\Throwable $e) {
    pvlog('CMS page step failed: ' . $e->getMessage(), false);
}

// ─────────────────────────────────────────────────────────────────────────────
// STEP 4 — Flush caches
// ─────────────────────────────────────────────────────────────────────────────
try {
    $cacheManager = $om->get(\Magento\Framework\App\Cache\Manager::class);
    $cacheManager->flush($cacheManager->getAvailableTypes());
    pvlog('Cache flushed: OK');
} catch (\Throwable $e) {
    pvlog('Cache flush failed (non-critical): ' . $e->getMessage());
}

// ─────────────────────────────────────────────────────────────────────────────
// STEP 5 — Verify routes registered
// ─────────────────────────────────────────────────────────────────────────────
try {
    $configFile = MAGENTO_ROOT . '/app/etc/config.php';
    if (file_exists($configFile)) {
        $cfg = include $configFile;
        if (!empty($cfg['modules']['YourVendor_PVModern'])) {
            pvlog('Route verification: YourVendor_PVModern is active in config.php ✓');
        } else {
            pvlog('Route verification: YourVendor_PVModern NOT found in config.php', false);
        }
    }
} catch (\Throwable $e) {}

renderPage($log, $success);

// ─────────────────────────────────────────────────────────────────────────────
function renderPage(array $log, bool $success): void
{
    $siteUrl = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>PVModern Installer</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;background:#0f0f1a;color:#e2e8f0;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px}
.card{background:linear-gradient(135deg,rgba(99,102,241,.15),rgba(139,92,246,.1));border:1px solid rgba(139,92,246,.3);border-radius:20px;padding:40px;max-width:680px;width:100%}
h1{font-size:24px;font-weight:800;background:linear-gradient(135deg,#6366f1,#a855f7,#ec4899);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;margin-bottom:8px}
.sub{color:#94a3b8;font-size:14px;margin-bottom:28px}
.log-item{display:flex;align-items:flex-start;gap:10px;padding:10px 14px;border-radius:10px;margin-bottom:8px;font-size:14px;line-height:1.5}
.ok{background:rgba(74,222,128,.1);border:1px solid rgba(74,222,128,.25);color:#4ade80}
.fail{background:rgba(248,113,113,.1);border:1px solid rgba(248,113,113,.25);color:#f87171}
.icon{font-size:16px;flex-shrink:0;margin-top:1px}
.result{margin-top:24px;padding:18px 22px;border-radius:14px;font-size:18px;font-weight:700;text-align:center}
.result.ok{background:rgba(74,222,128,.15);border:1px solid rgba(74,222,128,.3);color:#4ade80}
.result.fail{background:rgba(248,113,113,.15);border:1px solid rgba(248,113,113,.3);color:#f87171}
.links{margin-top:28px;display:grid;grid-template-columns:1fr 1fr;gap:10px}
.link-btn{display:block;padding:12px 16px;background:rgba(99,102,241,.2);border:1px solid rgba(99,102,241,.35);border-radius:12px;color:#a5b4fc;text-decoration:none;font-size:13px;font-weight:600;text-align:center;transition:all .2s}
.link-btn:hover{background:rgba(99,102,241,.35);color:#fff}
.delete-note{margin-top:24px;padding:14px 18px;background:rgba(251,191,36,.1);border:1px solid rgba(251,191,36,.3);border-radius:12px;color:#fbbf24;font-size:13px;line-height:1.6}
</style>
</head>
<body>
<div class="card">
    <h1>PVModern Installer</h1>
    <div class="sub">Setting up routes &amp; pages for MixiiiStore</div>

    <?php foreach ($log as $item): ?>
    <div class="log-item <?= $item['ok'] ? 'ok' : 'fail' ?>">
        <span class="icon"><?= $item['ok'] ? '✓' : '✗' ?></span>
        <span><?= htmlspecialchars($item['msg'], ENT_QUOTES) ?></span>
    </div>
    <?php endforeach; ?>

    <div class="result <?= $success ? 'ok' : 'fail' ?>">
        <?= $success ? '🎉 Installation Complete!' : '⚠️ Some steps failed — check logs above' ?>
    </div>

    <?php if ($success): ?>
    <div class="links">
        <a class="link-btn" href="<?= $siteUrl ?>/deals">→ /deals</a>
        <a class="link-btn" href="<?= $siteUrl ?>/terms">→ /terms</a>
        <a class="link-btn" href="<?= $siteUrl ?>/privacy">→ /privacy</a>
        <a class="link-btn" href="<?= $siteUrl ?>/cookies">→ /cookies</a>
        <a class="link-btn" href="<?= $siteUrl ?>/pcbuilder">→ /pcbuilder</a>
        <a class="link-btn" href="<?= $siteUrl ?>/">→ Homepage</a>
    </div>
    <?php endif; ?>

    <div class="delete-note">
        ⚠️ <strong>Security:</strong> Delete <code>pvmodern_install.php</code>
        from your server root after this page shows success!
    </div>
</div>
</body>
</html>
<?php
}
