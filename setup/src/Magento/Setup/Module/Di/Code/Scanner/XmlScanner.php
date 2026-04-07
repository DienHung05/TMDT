<?php
<<<<<<< HEAD
declare(strict_types=1);

/**
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Setup\Module\Di\Code\Scanner;

use Magento\Framework\ObjectManager\Code\Generator\Proxy as ProxyGenerator;

class XmlScanner implements ScannerInterface
{
    /**
     * @var \Magento\Setup\Module\Di\Compiler\Log\Log $log
     */
    protected $_log;

    /**
     * @param \Magento\Setup\Module\Di\Compiler\Log\Log $log
     */
    public function __construct(\Magento\Setup\Module\Di\Compiler\Log\Log $log)
    {
        $this->_log = $log;
    }

    /**
     * Get array of class names
     *
     * @param array $files
     * @return array
     */
    public function collectEntities(array $files)
    {
        $virtualTypes = [];
        $output = [];
        $factoriesOutput = [];
        foreach ($files as $file) {
            $dom = new \DOMDocument();
            $dom->load($file);
            $xpath = new \DOMXPath($dom);
            $xpath->registerNamespace("php", "http://php.net/xpath");
            $xpath->registerPhpFunctions('preg_match');
            $virtualTypeQuery = "//virtualType/@name";

            foreach ($xpath->query($virtualTypeQuery) as $virtualNode) {
<<<<<<< HEAD
                $virtualTypes[] = ltrim($virtualNode->nodeValue, '\\');
            }

            $output[] = $this->scanProxies($xpath);
            $factoriesOutput[] = $this->scanFactories($xpath);
        }

        $output = array_unique(array_merge([], ...$output));
        $factoriesOutput = array_unique(array_merge([], ...$factoriesOutput));
=======
                $virtualTypes[] = $virtualNode->nodeValue;
            }

            $regex = '/^(.*)\\\(.*)Proxy$/';
            $query = "/config/preference[ php:functionString('preg_match', '{$regex}', @type) > 0]/@type | " .
                "//argument[@xsi:type='object' and php:functionString('preg_match', '{$regex}', text()) > 0] |" .
                "//item[@xsi:type='object' and php:functionString('preg_match', '{$regex}', text()) > 0] |" .
                "/config/virtualType[ php:functionString('preg_match', '{$regex}', @type) > 0]/@type";
            /** @var \DOMNode $node */
            foreach ($xpath->query($query) as $node) {
                $output[] = $node->nodeValue;
            }

            $factoriesOutput = array_merge($factoriesOutput, $this->scanFactories($xpath));
        }

        $output = array_unique($output);
        $factoriesOutput = array_unique($factoriesOutput);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $factoriesOutput = array_diff($factoriesOutput, $virtualTypes);
        return array_merge($this->_filterEntities($output), $factoriesOutput);
    }

    /**
<<<<<<< HEAD
     * Scan proxies from all di.xml
     *
     * @param \DOMXPath $xpath
     * @return array
     */
    private function scanProxies(\DOMXPath $xpath): array
    {
        $result = [];
        $regex = '/^(\s+)?(.*)\\\(.*)Proxy(\s+)?$/';
        $query = "/config/preference[ php:functionString('preg_match', '{$regex}', @type) > 0]/@type | " .
            "//argument[@xsi:type='object' and php:functionString('preg_match', '{$regex}', text()) > 0] |" .
            "//item[@xsi:type='object' and php:functionString('preg_match', '{$regex}', text()) > 0] |" .
            "/config/virtualType[ php:functionString('preg_match', '{$regex}', @type) > 0]/@type";
        /** @var \DOMNode $node */
        foreach ($xpath->query($query) as $node) {
            $result[] = ltrim(trim($node->nodeValue), '\\');
        }
        return $result;
    }

    /**
     * Scan factories from all di.xml and retrieve non-virtual one
=======
     * Scan factories from all di.xml and retrieve non virtual one
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @param \DOMXPath $domXpath
     * @return array
     */
<<<<<<< HEAD
    private function scanFactories(\DOMXPath $domXpath): array
    {
        $output = [];
        $regex = '/^(\s+)?(.*)Factory(\s+)?$/';
        $query = "//argument[@xsi:type='object' and php:functionString('preg_match', '{$regex}', text()) > 0] |" .
            "//item[@xsi:type='object' and php:functionString('preg_match', '{$regex}', text()) > 0]";

        foreach ($domXpath->query($query) as $node) {
            $output[] = ltrim(trim($node->nodeValue), '\\');
=======
    private function scanFactories(\DOMXPath $domXpath)
    {
        $output = [];
        $regex = '/^(.*)Factory$/';
        $query = "//argument[@xsi:type='object' and php:functionString('preg_match', '{$regex}', text()) > 0] |" .
            "//item[@xsi:type='object' and php:functionString('preg_match', '{$regex}', text()) > 0]";
        foreach ($domXpath->query($query) as $node) {
            $output[] = $node->nodeValue;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        }

        return $output;
    }

    /**
     * Filter found entities if needed
     *
     * @param array $output
     * @return array
     */
    protected function _filterEntities(array $output)
    {
        $entitySuffix = '\\' . ucfirst(ProxyGenerator::ENTITY_TYPE);
        $filteredEntities = [];
        foreach ($output as $className) {
<<<<<<< HEAD
            $entityName = str_ends_with($className, $entitySuffix)
=======
            $entityName = substr($className, -strlen($entitySuffix)) === $entitySuffix
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ? substr($className, 0, -strlen($entitySuffix))
                : $className;
            $isClassExists = false;
            try {
                $isClassExists = class_exists($className);
<<<<<<< HEAD
            } catch (\RuntimeException $e) { //@codingStandardsIgnoreLine
=======
            } catch (\RuntimeException $e) {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            }
            if (false === $isClassExists) {
                if (class_exists($entityName) || interface_exists($entityName)) {
                    $filteredEntities[] = $className;
                } else {
                    $this->_log->add(
                        \Magento\Setup\Module\Di\Compiler\Log\Log::CONFIGURATION_ERROR,
                        $className,
                        'Invalid proxy class for ' . substr($className, 0, -5)
                    );
                }
            }
        }
        return $filteredEntities;
    }
}
