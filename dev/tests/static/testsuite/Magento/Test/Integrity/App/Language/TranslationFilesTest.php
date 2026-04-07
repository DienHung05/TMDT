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
namespace Magento\Test\Integrity\App\Language;

use Magento\Framework\App\Utility\Files;
use Magento\Framework\Component\ComponentRegistrar;
use Magento\Setup\Module\I18n\Dictionary\Options\ResolverFactory;
use Magento\Setup\Module\I18n\Locale;
use Magento\Setup\Module\I18n\Pack\Writer\File\Csv;
<<<<<<< HEAD
use Magento\Framework\Filesystem\Driver\File;
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class TranslationFilesTest extends TranslationFiles
{
    /**
<<<<<<< HEAD
     * I18n\Context
     *
     * @var \Magento\Setup\Module\I18n\Context
     */
    protected static $context;
=======
     * Context
     *
     * @var \Magento\Setup\Module\I18n\Context
     */
    protected $context;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /**
     * Test default locale
     *
     * Check that all translation phrases in code are present in the locale files
     *
     * @param string $file
     * @param array $phrases
<<<<<<< HEAD
     */
    #[DataProvider('defaultLocaleDataProvider')]
=======
     *
     * @dataProvider defaultLocaleDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testDefaultLocale($file, $phrases)
    {
        $this->markTestSkipped('MAGETWO-26083');
        $failures = $this->comparePhrase($phrases, $this->csvParser->getDataPairs($file));
        $this->assertEmpty(
            $failures,
            $this->printMessage([$file => $failures])
        );
    }

    /**
     * @return array
     * @throws \RuntimeException
     */
<<<<<<< HEAD
    public static function defaultLocaleDataProvider()
    {
        $parser = self::prepareParser();
=======
    public function defaultLocaleDataProvider()
    {
        $parser = $this->prepareParser();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        $optionResolverFactory = new ResolverFactory();
        $optionResolver = $optionResolverFactory->create(BP, true);

        $parser->parse($optionResolver->getOptions());

        $defaultLocale = [];
        foreach ($parser->getPhrases() as $key => $phrase) {
            if (!$phrase->getContextType() || !$phrase->getContextValue()) {
                throw new \RuntimeException(sprintf('Missed context in row #%d.', $key + 1));
            }
            foreach ($phrase->getContextValue() as $context) {
<<<<<<< HEAD
                $phraseText = self::eliminateSpecialChars($phrase->getPhrase());
                $phraseTranslation = self::eliminateSpecialChars($phrase->getTranslation());
                $file = self::buildFilePath($phrase, $context);
=======
                $phraseText = $this->eliminateSpecialChars($phrase->getPhrase());
                $phraseTranslation = $this->eliminateSpecialChars($phrase->getTranslation());
                $file = $this->buildFilePath($phrase, $context);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                $defaultLocale[$file]['file'] = $file;
                $defaultLocale[$file]['phrases'][$phraseText] = $phraseTranslation;
            }
        }
        return $defaultLocale;
    }

    /**
     * @param \Magento\Setup\Module\I18n\Dictionary\Phrase $phrase
     * @param array $context
     * @return string
     */
<<<<<<< HEAD
    protected static function buildFilePath($phrase, $context)
    {
        $path = self::getContext()->buildPathToLocaleDirectoryByContext($phrase->getContextType(), $context);
=======
    protected function buildFilePath($phrase, $context)
    {
        $path = $this->getContext()->buildPathToLocaleDirectoryByContext($phrase->getContextType(), $context);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        return $path . Locale::DEFAULT_SYSTEM_LOCALE . '.' . Csv::FILE_EXTENSION;
    }

    /**
     * @return \Magento\Setup\Module\I18n\Context
     */
<<<<<<< HEAD
    protected static function getContext()
    {
        if (self::$context === null) {
            self::$context = new \Magento\Setup\Module\I18n\Context(new ComponentRegistrar());
        }
        return self::$context;
=======
    protected function getContext()
    {
        if ($this->context === null) {
            $this->context = new \Magento\Setup\Module\I18n\Context(new ComponentRegistrar());
        }
        return $this->context;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @return \Magento\Setup\Module\I18n\Parser\Contextual
     */
<<<<<<< HEAD
    protected static function prepareParser()
=======
    protected function prepareParser()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $filesCollector = new \Magento\Setup\Module\I18n\FilesCollector();

        $phraseCollector = new \Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer\PhraseCollector(
            new \Magento\Setup\Module\I18n\Parser\Adapter\Php\Tokenizer()
        );
<<<<<<< HEAD
        $fileSystem = new File;
        $adapters = [
            'php' => new \Magento\Setup\Module\I18n\Parser\Adapter\Php($phraseCollector),
            'js' =>  new \Magento\Setup\Module\I18n\Parser\Adapter\Js($fileSystem),
=======
        $adapters = [
            'php' => new \Magento\Setup\Module\I18n\Parser\Adapter\Php($phraseCollector),
            'js' =>  new \Magento\Setup\Module\I18n\Parser\Adapter\Js(),
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            'xml' => new \Magento\Setup\Module\I18n\Parser\Adapter\Xml(),
            'html' => new \Magento\Setup\Module\I18n\Parser\Adapter\Html(),
        ];

        $parserContextual = new \Magento\Setup\Module\I18n\Parser\Contextual(
            $filesCollector,
            new \Magento\Setup\Module\I18n\Factory(),
            new \Magento\Setup\Module\I18n\Context(new ComponentRegistrar())
        );
        foreach ($adapters as $type => $adapter) {
            $parserContextual->addAdapter($type, $adapter);
        }

        return $parserContextual;
    }

    /**
     * @param string $text
     * @return string
     */
<<<<<<< HEAD
    protected static function eliminateSpecialChars($text)
=======
    protected function eliminateSpecialChars($text)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return preg_replace(['/\\\\\'/', '/\\\\\\\\/'], ['\'', '\\'], $text);
    }

    /**
     * Test placeholders in translations.
     * Compares count numeric placeholders in keys and translates.
     *
     * @param string $placePath
<<<<<<< HEAD
     */
    #[DataProvider('getLocalePlacePath')]
=======
     * @dataProvider getLocalePlacePath
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testPhrasePlaceHolders($placePath)
    {
        $this->markTestSkipped('MAGETWO-26083');
        $files = $this->getCsvFiles($placePath);

        $failures = [];
        foreach ($files as $locale => $file) {
            $fileData = $this->csvParser->getDataPairs($file);
            foreach ($fileData as $key => $translate) {
                preg_match_all('/%(\d+)/', $key, $keyMatches);
                preg_match_all('/%(\d+)/', $translate, $translateMatches);
                if (count(array_unique($keyMatches[1])) != count(array_unique($translateMatches[1]))) {
                    $failures[$locale][$key][] = $translate;
                }
            }
        }
        $this->assertEmpty(
            $failures,
            $this->printMessage(
                $failures,
                'Found discrepancy between keys and translations in count of numeric placeholders'
            )
        );
    }
}
