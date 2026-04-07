<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

return [
    'before' => 'CREATE TABLE `some_table` (
  `some_column` varchar(255) DEFAULT NULL COMMENT \'Some Column Name\'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3',
    'after' => 'CREATE TABLE `some_table_renamed` (
  `some_column` varchar(255) DEFAULT NULL COMMENT \'Some Column Name\'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3',
];
