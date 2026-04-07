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

namespace Magento\TestFramework\Annotation;

use Magento\Framework\DataObject;
<<<<<<< HEAD
use Magento\Framework\Exception\LocalizedException;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Registry;
use Magento\TestFramework\Fixture\DataFixtureFactory;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Fixture\RevertibleDataFixtureInterface;
<<<<<<< HEAD
use Magento\TestFramework\ScopeSwitcherInterface;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Apply and revert data fixtures
 */
class DataFixtureSetup
{
    /**
<<<<<<< HEAD
     * @param Registry $registry
     * @param DataFixtureFactory $dataFixtureFactory
     * @param ScopeSwitcherInterface $scopeSwitcher
     */
    public function __construct(
        private Registry $registry,
        private DataFixtureFactory $dataFixtureFactory,
        private ScopeSwitcherInterface $scopeSwitcher
    ) {
=======
     * @var Registry
     */
    private $registry;

    /**
     * @var DataFixtureFactory
     */
    private $dataFixtureFactory;

    /**
     * @param Registry $registry
     * @param DataFixtureFactory $dataFixtureFactory
     */
    public function __construct(
        Registry $registry,
        DataFixtureFactory $dataFixtureFactory
    ) {
        $this->registry = $registry;
        $this->dataFixtureFactory = $dataFixtureFactory;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    }

    /**
     * Applies data fixture and returns the result.
     *
     * @param array $fixture
     * @return DataObject|null
<<<<<<< HEAD
     * @throws LocalizedException
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    public function apply(array $fixture): ?DataObject
    {
        $data = $this->resolveVariables($fixture['data'] ?? []);
        $factory = $this->dataFixtureFactory->create($fixture['factory']);
<<<<<<< HEAD
        if (isset($fixture['scope'])) {
            $scope = DataFixtureStorageManager::getStorage()->get($fixture['scope']);
            $fromScope = $this->scopeSwitcher->switch($scope);
            try {
                $result = $factory->apply($data);
            } finally {
                $this->scopeSwitcher->switch($fromScope);
            }
        } else {
            $result = $factory->apply($data);
        }
=======
        $result = $factory->apply($data);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

        if ($result !== null && !empty($fixture['name'])) {
            DataFixtureStorageManager::getStorage()->persist(
                $fixture['name'],
                $result
            );
        }

        return $result;
    }

    /**
     * Revert data fixture.
     *
     * @param array $fixture
     */
    public function revert(array $fixture): void
    {
        $isSecureArea = $this->registry->registry('isSecureArea');
        $this->registry->unregister('isSecureArea');
        $this->registry->register('isSecureArea', true);
        try {
            $factory = $this->dataFixtureFactory->create($fixture['factory']);
            if ($factory instanceof RevertibleDataFixtureInterface) {
                $factory->revert($fixture['result'] ?? new DataObject());
            }
        } catch (NoSuchEntityException $exception) {
            //ignore
        } finally {
            $this->registry->unregister('isSecureArea');
            $this->registry->register('isSecureArea', $isSecureArea);
        }
    }

    /**
     * Replace fixtures references in the data by their value
     *
     * Supported formats:
     * - $fixture$
     * - $fixture.attribute$
     *
     * @param array $data
     * @return array
<<<<<<< HEAD
     * @throws LocalizedException
=======
     * @throws \Magento\Framework\Exception\LocalizedException
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    private function resolveVariables(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->resolveVariables($value);
            } else {
<<<<<<< HEAD
                if (is_string($value)) {
                    $value = $this->parseFixtureKeyValue($value);
                    if ($value) {
                        $data[$key] = $value;
                    }
                }
            }

            if (is_string($key)) {
                $newKey = $this->parseFixtureKeyValue($key);
                if (is_string($newKey)) {
                    $value = $data[$key];
                    unset($data[$key]);
                    $data[$newKey] = $value;
=======
                if (is_string($value) && preg_match('/^\$\w+(\.\w+)?\$$/', $value)) {
                    list($fixtureName, $attribute) = array_pad(explode('.', trim($value, '$')), 2, null);
                    $fixtureData = DataFixtureStorageManager::getStorage()->get($fixtureName);
                    if (!$fixtureData) {
                        throw new \InvalidArgumentException("Unable to resolve fixture reference '$value'");
                    }
                    $data[$key] = $attribute ? $fixtureData->getDataUsingMethod($attribute) : $fixtureData;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                }
            }
        }

        return $data;
    }
<<<<<<< HEAD

    /**
     * Parse either key or value of the fixture data
     *
     * @param string $data
     * @return DataObject|mixed|void
     * @throws LocalizedException
     */
    private function parseFixtureKeyValue(string $data)
    {
        // Check if entire string is a single placeholder
        if (preg_match('/^\$\w+(\.\w+)?\$$/', $data)) {
            return $this->resolveSinglePlaceholder($data);
        }

        // Check if string contains one or more placeholders, for multi value support
        if (preg_match('/\$\w+(\.\w+)?\$/', $data)) {
            return $this->resolveMultiplePlaceholders($data);
        }

        return false;
    }

    /**
     * Resolve a single fixture placeholder
     *
     * @param string $data
     * @return DataObject|mixed
     * @throws \InvalidArgumentException
     */
    private function resolveSinglePlaceholder(string $data)
    {
        list($fixtureName, $attribute) = array_pad(explode('.', trim($data, '$')), 2, null);
        $fixtureData = $this->getFixtureData($fixtureName, $data);
        return $this->extractValue($fixtureData, $attribute);
    }

    /**
     * Resolve multiple fixture placeholders in a string
     *
     * @param string $data
     * @return string|false
     */
    private function resolveMultiplePlaceholders(string $data)
    {
        $resolved = preg_replace_callback(
            '/\$(\w+)(\.\w+)?\$/',
            function ($matches) {
                return $this->replacePlaceholder($matches);
            },
            $data
        );
        return $resolved !== $data ? $resolved : false;
    }

    /**
     * Replace a single placeholder match
     *
     * @param array $matches
     * @return string|mixed
     * @throws \InvalidArgumentException
     */
    private function replacePlaceholder(array $matches)
    {
        $fixtureName = $matches[1];
        $attribute = isset($matches[2]) ? ltrim($matches[2], '.') : null;
        $reference = "\${$fixtureName}" . ($attribute ? ".{$attribute}" : '') . "\$";
        $fixtureData = $this->getFixtureData($fixtureName, $reference);
        $value = $this->extractValue($fixtureData, $attribute);
        return is_scalar($value) ? (string)$value : $value;
    }

    /**
     * Get fixture data from storage
     *
     * @param string $fixtureName
     * @param string $reference
     * @return DataObject
     * @throws \InvalidArgumentException
     */
    private function getFixtureData(string $fixtureName, string $reference): DataObject
    {
        $fixtureData = DataFixtureStorageManager::getStorage()->get($fixtureName);
        if (!$fixtureData) {
            throw new \InvalidArgumentException("Unable to resolve fixture reference '{$reference}'");
        }
        return $fixtureData;
    }

    /**
     * Extract value from fixture data
     *
     * @param DataObject $fixtureData
     * @param string|null $attribute
     * @return DataObject|mixed
     */
    private function extractValue(DataObject $fixtureData, ?string $attribute)
    {
        return $attribute ? $fixtureData->getDataUsingMethod($attribute) : $fixtureData;
    }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
