<?php
/**
 * Tests that existing page_layouts.xml files are valid to schema individually and merged.
 *
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Test\Integrity\Modular;

use Magento\Framework\Component\ComponentRegistrar;

class ThemeConfigFilesTest extends \Magento\TestFramework\TestCase\AbstractConfigFiles
{
    /**
     * Returns the reader class name that will be instantiated via ObjectManager
     *
     * @return string reader class name
     */
    protected function _getReaderClassName()
    {
        return \Magento\Theme\Model\Layout\Config\Reader::class;
    }

    /**
     * Returns a string that represents the path to the config file
     *
     * @return string
     */
<<<<<<< HEAD
    protected static function _getConfigFilePathGlob()
=======
    protected function _getConfigFilePathGlob()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return 'view/*/layouts.xml';
    }

    /**
     * Returns an absolute path to the XSD file corresponding to the XML files specified in _getConfigFilePathGlob
     *
     * @return string
     */
<<<<<<< HEAD
    protected static function _getXsdPath()
    {
        return self::$componentRegistrar->getPath(ComponentRegistrar::LIBRARY, 'magento/framework')
=======
    protected function _getXsdPath()
    {
        return $this->componentRegistrar->getPath(ComponentRegistrar::LIBRARY, 'magento/framework')
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            . '/View/PageLayout/etc/layouts.xsd';
    }
}
