<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\TestFramework\Utility;

/**
 * Helper class to add list of added new files.
 */
class AddedFiles
{
    /**
     * Provide list of new files.
     *
     * @param string $changedFilesBaseDir
     *
     * @return string[]
     */
    public static function getAddedFilesList(string $changedFilesBaseDir): array
    {
        return FilesSearch::getFilesFromListFile(
            $changedFilesBaseDir,
            'changed_files*.added.*',
            function () {
                // if no list files, probably, this is the dev environment
                // phpcs:ignore Generic.PHP.NoSilencedErrors,Magento2.Security.InsecureFunction
                @exec('git diff --cached --name-only --diff-filter=A', $addedFiles);
                return $addedFiles;
            }
        );
    }
}
