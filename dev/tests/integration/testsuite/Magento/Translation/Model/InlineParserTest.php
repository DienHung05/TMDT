<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

declare(strict_types=1);

namespace Magento\Translation\Model;

use Magento\Framework\App\Config\MutableScopeConfigInterface;
use Magento\Framework\App\State;
use Magento\Framework\Translate\Inline;
use Magento\Framework\App\Area;
use Magento\Store\Model\ScopeInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Translation\Model\Inline\Parser;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

/**
 * Test for \Magento\Translation\Model\Inline\Parser.
 */
class InlineParserTest extends TestCase
{
    private const STUB_STORE = 'default';
    private const XML_PATH_TRANSLATE_INLINE_ACTIVE = 'dev/translate_inline/active';

    /**
     * @var Parser
     */
    private $model;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $inline = Bootstrap::getObjectManager()->create(Inline::class);
        $this->model = Bootstrap::getObjectManager()->create(Parser::class, ['translateInline' => $inline]);
        Bootstrap::getObjectManager()->get(MutableScopeConfigInterface::class)
            ->setValue(self::XML_PATH_TRANSLATE_INLINE_ACTIVE, true, ScopeInterface::SCOPE_STORE, self::STUB_STORE);
    }

    /**
     * Process ajax post test
<<<<<<< HEAD
     */
    #[DataProvider('processAjaxPostDataProvider')]
=======
     *
     * @dataProvider processAjaxPostDataProvider
     *
     * @param string $originalText
     * @param string $translatedText
     * @param string $area
     * @param bool|null $isPerStore
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testProcessAjaxPost(
        string $originalText,
        string $translatedText,
        string $area,
        ?bool $isPerStore = null
    ): void {
        Bootstrap::getObjectManager()->get(State::class)
            ->setAreaCode($area);

        $inputArray = [['original' => $originalText, 'custom' => $translatedText]];
        if ($isPerStore !== null) {
            $inputArray[0]['perstore'] = $isPerStore;
        }
        $this->model->processAjaxPost($inputArray);

        $model = Bootstrap::getObjectManager()->create(StringUtils::class);
        $model->load($originalText);

        try {
            $this->assertEquals($translatedText, $model->getTranslate());
            $model->delete();
        } catch (\Exception $e) {
            $model->delete();
            Bootstrap::getObjectManager()->get(LoggerInterface::class)
                ->critical($e);
        }
    }

    /**
     * Data provider for testProcessAjaxPost
<<<<<<< HEAD
     */
    public static function processAjaxPostDataProvider(): array
=======
     *
     * @return array
     */
    public function processAjaxPostDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            ['original text 1', 'translated text 1', Area::AREA_ADMINHTML],
            ['original text 1', 'translated text 1', Area::AREA_FRONTEND],
            ['original text 2', 'translated text 2', Area::AREA_ADMINHTML, true],
            ['original text 2', 'translated text 2', Area::AREA_FRONTEND, true],
        ];
    }

    /**
     * Set get is json test
<<<<<<< HEAD
     */
    #[DataProvider('allowedAreasDataProvider')]
=======
     *
     * @dataProvider allowedAreasDataProvider
     *
     * @param string $area
     * @return void
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSetGetIsJson(string $area): void
    {
        Bootstrap::getObjectManager()->get(State::class)
            ->setAreaCode($area);

        $isJsonProperty = new \ReflectionProperty(get_class($this->model), '_isJson');
<<<<<<< HEAD
        $this->assertFalse($isJsonProperty->getValue($this->model));

        $setIsJsonMethod = new \ReflectionMethod($this->model, 'setIsJson');
=======
        $isJsonProperty->setAccessible(true);

        $this->assertFalse($isJsonProperty->getValue($this->model));

        $setIsJsonMethod = new \ReflectionMethod($this->model, 'setIsJson');
        $setIsJsonMethod->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $setIsJsonMethod->invoke($this->model, true);

        $this->assertTrue($isJsonProperty->getValue($this->model));
    }

    /**
     * Data provider for testSetGetIsJson
<<<<<<< HEAD
     */
    public static function allowedAreasDataProvider(): array
=======
     *
     * @return array
     */
    public function allowedAreasDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [Area::AREA_ADMINHTML],
            [Area::AREA_FRONTEND]
        ];
    }
}
