<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Api;

interface ShippingProviderInterface
{
    public function getCode(): string;

    public function getLabel(): string;

    public function isAvailable(array $context = []): bool;

    /**
     * @return array{
     *   provider:string,
     *   label:string,
     *   method_code:string,
     *   amount:float,
     *   currency:string,
     *   eta_label:string,
     *   eta_min:int,
     *   eta_max:int,
     *   description:string,
     *   mock:bool
     * }
     */
    public function quote(array $context): array;

    /**
     * @return array<string, mixed>
     */
    public function createShipment(array $context): array;

    /**
     * @return array<string, mixed>
     */
    public function track(string $trackingNumber): array;

    /**
     * @return array<string, mixed>
     */
    public function cancel(string $shipmentId): array;
}
