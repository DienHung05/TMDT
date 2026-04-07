<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\WebapiAsync\Model;

use Magento\Framework\Webapi\Authorization;

class AuthorizationMock extends Authorization
{
    /**
     * @param string[] $aclResources
     * @return bool
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function isAllowed($aclResources)
    {
        return true;
    }
}
