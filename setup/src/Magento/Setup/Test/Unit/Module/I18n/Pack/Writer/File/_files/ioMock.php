<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Setup\Module\I18n\Pack\Writer\File;

/**
 * Mock is_dir function
 *
 * @see \Magento\Setup\Module\I18n\Pack\Writer\File\AbstractFile
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
function is_dir($path)
{
    return false;
}

/**
 * Mock mkdir function
 *
 * @see \Magento\Setup\Module\I18n\Pack\Writer\File\AbstractFile
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
function mkdir($pathname, $mode = 0777, $recursive = false, $context = null)
{
    return true;
}

/**
 * Mock chmod function
 *
 * @see \Magento\Setup\Module\I18n\Pack\Writer\File\AbstractFile
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 */
function chmod($filename, $mode)
{
    return true;
}
