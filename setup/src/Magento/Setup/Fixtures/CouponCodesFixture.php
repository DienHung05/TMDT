<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Setup\Fixtures;

<<<<<<< HEAD
use Magento\SalesRule\Model\ResourceModel\Coupon\CollectionFactory as CouponCollectionFactory;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * Fixture for generating coupon codes
 *
 * Support the following format:
 * <!-- Number of coupon codes -->
 * <coupon_codes>{int}</coupon_codes>
 *
 * @see setup/performance-toolkit/profiles/ce/small.xml
 */
class CouponCodesFixture extends Fixture
{
    /**
     * @var int
     */
    protected $priority = 129;

    /**
     * @var int
     */
    protected $couponCodesCount = 0;

    /**
     * @var \Magento\SalesRule\Model\RuleFactory
     */
    private $ruleFactory;

    /**
     * @var \Magento\SalesRule\Model\CouponFactory
     */
    private $couponCodeFactory;

    /**
<<<<<<< HEAD
     * @var CouponCollectionFactory
     */
    private $couponCollectionFactory;

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * Constructor
     *
     * @param FixtureModel $fixtureModel
     * @param \Magento\SalesRule\Model\RuleFactory|null $ruleFactory
     * @param \Magento\SalesRule\Model\CouponFactory|null $couponCodeFactory
<<<<<<< HEAD
     * @param CouponCollectionFactory|null $couponCollectionFactory
     */
    public function __construct(
        FixtureModel $fixtureModel,
        ?\Magento\SalesRule\Model\RuleFactory $ruleFactory = null,
        ?\Magento\SalesRule\Model\CouponFactory $couponCodeFactory = null,
        ?CouponCollectionFactory $couponCollectionFactory = null
=======
     */
    public function __construct(
        FixtureModel $fixtureModel,
        \Magento\SalesRule\Model\RuleFactory $ruleFactory = null,
        \Magento\SalesRule\Model\CouponFactory $couponCodeFactory = null
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    ) {
        parent::__construct($fixtureModel);
        $this->ruleFactory = $ruleFactory ?: $this->fixtureModel->getObjectManager()
            ->get(\Magento\SalesRule\Model\RuleFactory::class);
        $this->couponCodeFactory = $couponCodeFactory ?: $this->fixtureModel->getObjectManager()
            ->get(\Magento\SalesRule\Model\CouponFactory::class);
<<<<<<< HEAD
        $this->couponCollectionFactory = $couponCollectionFactory ?: $this->fixtureModel->getObjectManager()
            ->get(CouponCollectionFactory::class);
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * @inheritdoc
     *
     * @SuppressWarnings(PHPMD)
     */
    public function execute()
    {
<<<<<<< HEAD
        $requestedCouponsCount = (int) $this->fixtureModel->getValue('coupon_codes', 0);
        $existedCouponsCount = $this->couponCollectionFactory->create()->getSize();
        $this->couponCodesCount = max(0, $requestedCouponsCount - $existedCouponsCount);
=======
        $this->fixtureModel->resetObjectManager();
        $this->couponCodesCount = $this->fixtureModel->getValue('coupon_codes', 0);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        if (!$this->couponCodesCount) {
            return;
        }

        /** @var \Magento\Store\Model\StoreManager $storeManager */
        $storeManager = $this->fixtureModel->getObjectManager()->create(\Magento\Store\Model\StoreManager::class);

        //Get all websites
        $websitesArray = [];
        $websites = $storeManager->getWebsites();
        foreach ($websites as $website) {
            $websitesArray[] = $website->getId();
        }

        $this->generateCouponCodes($this->ruleFactory, $this->couponCodeFactory, $websitesArray);
    }

    /**
     * Generate Coupon Codes
     *
     * @param \Magento\SalesRule\Model\RuleFactory $ruleFactory
     * @param \Magento\SalesRule\Model\CouponFactory $couponCodeFactory
     * @param array $websitesArray
     *
     * @return void
     */
    public function generateCouponCodes($ruleFactory, $couponCodeFactory, $websitesArray)
    {
        for ($i = 0; $i < $this->couponCodesCount; $i++) {
            $ruleName = sprintf('Coupon Code %1$d', $i);
            $data = [
                'rule_id'               => null,
                'name'                  => $ruleName,
                'is_active'             => '1',
                'website_ids'           => $websitesArray,
                'customer_group_ids'    => [
                    0 => '0',
                    1 => '1',
                    2 => '2',
                    3 => '3',
                ],
                'coupon_type'           => \Magento\SalesRule\Model\Rule::COUPON_TYPE_SPECIFIC,
                'conditions'            => [],
                'simple_action'         => \Magento\SalesRule\Model\Rule::BY_PERCENT_ACTION,
                'discount_amount'       => 5,
                'discount_step'         => 0,
                'stop_rules_processing' => 1,
                'sort_order'            => '5',
            ];

            $model = $ruleFactory->create();
            $model->loadPost($data);
            $useAutoGeneration = (int)!empty($data['use_auto_generation']);
            $model->setUseAutoGeneration($useAutoGeneration);
            $model->save();

            $coupon = $couponCodeFactory->create();
            $coupon->setRuleId($model->getId())
                ->setCode('CouponCode' . $i)
                ->setIsPrimary(true)
                ->setType(0);
            $coupon->save();
        }
    }

    /**
     * @inheritdoc
     */
    public function getActionTitle()
    {
        return 'Generating coupon codes';
    }

    /**
     * @inheritdoc
     */
    public function introduceParamLabels()
    {
        return [
            'coupon_codes' => 'Coupon Codes'
        ];
    }
}
