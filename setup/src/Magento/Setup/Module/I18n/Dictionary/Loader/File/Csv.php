<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Setup\Module\I18n\Dictionary\Loader\File;

use Magento\Setup\Module\I18n\Dictionary;

/**
 *  Dictionary loader from csv
 */
class Csv extends AbstractFile
{
    /**
     * {@inheritdoc}
     */
    protected function _readFile()
    {
<<<<<<< HEAD
        return fgetcsv($this->_fileHandler, null, ',', '"', '\\');
=======
        return fgetcsv($this->_fileHandler, null, ',', '"');
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }
}
