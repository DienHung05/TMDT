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
namespace Magento\Setup\Module\Di\Code\Scanner;

/**
 * Class ServiceDataAttributesScanner
 */
class ServiceDataAttributesScanner implements ScannerInterface
{
    /**
     * Scan provided extension_attributes.xml and find extenstion classes.
     *
     * @param array $files
     * @return array
     */
    public function collectEntities(array $files)
    {
        $extensionClasses = [];
        foreach ($files as $fileName) {
            $dom = new \DOMDocument();
            $dom->loadXML(file_get_contents($fileName));
            $xpath = new \DOMXPath($dom);
            /** @var $node \DOMNode */
            foreach ($xpath->query('//extension_attributes') as $node) {
                $forType = $node->attributes->getNamedItem('for')->nodeValue;
                $extensionClasses[] = str_replace('Interface', 'ExtensionInterface', $forType);
                $extensionClasses[] = str_replace('Interface', 'Extension', $forType);
            }
        }
        return $extensionClasses;
    }
}
