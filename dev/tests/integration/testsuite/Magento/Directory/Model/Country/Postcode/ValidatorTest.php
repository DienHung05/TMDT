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
namespace Magento\Directory\Model\Country\Postcode;

use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class ValidatorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Directory\Model\Country\Postcode\ValidatorInterface
     */
    protected $validator;

    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        $this->validator = $objectManager->create(\Magento\Directory\Model\Country\Postcode\ValidatorInterface::class);
    }

    /**
<<<<<<< HEAD
     */
    #[DataProvider('getPostcodesDataProvider')]
=======
     * @dataProvider getPostcodesDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testPostCodes($countryId, $validPostcode)
    {
        try {
            $this->assertTrue($this->validator->validate($validPostcode, $countryId));
            $this->assertFalse($this->validator->validate('INVALID-100', $countryId));
        } catch (\InvalidArgumentException $ex) {
            //skip validation test for none existing countryId
        }
    }

    /**
     */
    public function testPostCodesThrowsExceptionIfCountryDoesNotExist()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Provided countryId does not exist.');

        $this->validator->validate('12345', 'INVALID-CODE');
    }

    /**
<<<<<<< HEAD
     */
    #[DataProvider('getCanadaInvalidPostCodes')]
=======
     * @dataProvider getCanadaInvalidPostCodes
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testInvalidCanadaZipCode($countryId, $invalidPostCode)
    {
        $this->assertFalse($this->validator->validate($invalidPostCode, $countryId));
    }

    /**
<<<<<<< HEAD
     */
    #[DataProvider('getCanadaValidPostCodes')]
=======
     * @dataProvider getCanadaValidPostCodes
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testValidCanadaZipCode($countryId, $validPostCode)
    {
        $this->assertTrue($this->validator->validate($validPostCode, $countryId));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getCanadaInvalidPostCodes()
    {
        return [
            ['CA', '12345'],  // $countryId, $invalidPostCode
            ['CA', 'A1B2C3D'],
            ['CA', 'A1B2C'],
            ['CA', 'A1B  2C3'],
=======
    public function getCanadaInvalidPostCodes()
    {
        return [
            ['countryId' => 'CA', 'postcode' => '12345'],
            ['countryId' => 'CA', 'postcode' => 'A1B2C3D'],
            ['countryId' => 'CA', 'postcode' => 'A1B2C'],
            ['countryId' => 'CA', 'postcode' => 'A1B  2C3'],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getCanadaValidPostCodes()
    {
        return [
            ['CA', 'A1B2C3'],  // $countryId, $validPostCode
            ['CA', 'A1B 2C3'],
            ['CA', 'A1B'],
            ['CA', 'Z9Y 8X7'],
            ['CA', 'Z9Y8X7'],
            ['CA', 'Z9Y'],
=======
    public function getCanadaValidPostCodes()
    {
        return [
            ['countryId' => 'CA', 'postcode' => 'A1B2C3'],
            ['countryId' => 'CA', 'postcode' => 'A1B 2C3'],
            ['countryId' => 'CA', 'postcode' => 'A1B'],
            ['countryId' => 'CA', 'postcode' => 'Z9Y 8X7'],
            ['countryId' => 'CA', 'postcode' => 'Z9Y8X7'],
            ['countryId' => 'CA', 'postcode' => 'Z9Y'],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }

    /**
     * @return array
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
<<<<<<< HEAD
    public static function getPostcodesDataProvider()
    {
        return [
            ['AD', 'AD100'],  // $countryId, $validPostcode
            ['AM', '123456'],
            ['AR', '1234'], ['AS', '12345'], ['AT', '1234'], ['AU', '1234'], ['AX', '22101'],
            ['AZ', '1234'], ['AZ', '123456'], ['BA', '12345'], ['BB', 'BB10900'], ['BD', '1234'],
            ['BE', '1234'], ['BG', '1234'], ['BH', '323'], ['BH', '1209'], ['BM', 'MA 02'],
            ['BN', 'PS1234'], ['BR', '12345678'], ['BR', '12345-678'], ['BY', '123456'],
            ['CA', 'P9M 3T6'], ['CC', '6799'], ['CH', '1234'], ['CK', '1234'], ['CL', '1234567'],
            ['CN', '123456'], ['CR', '12345'], ['CS', '12345'], ['CU', '12345'], ['CV', '1234'],
            ['CX', '6798'], ['CY', '1234'], ['CZ', '123 45'], ['DE', '12345'], ['DK', '1234'],
            ['DO', '12345'], ['DZ', '12345'], ['EC', 'A1234B'], ['EC', 'AB123456'], ['EC', '123456'],
            ['EE', '12345'], ['EG', '12345'], ['ES', '12345'], ['ET', '1234'], ['FI', '12345'],
            ['FK', 'FIQQ 1ZZ'], ['FM', '96941'], ['FO', '123'], ['FR', '12345'],
            ['GB', 'PL12 3RT'], ['GB', 'P1L 2RT'], ['GB', 'QW1 2RT'], ['GB', 'QW1R 2TG'],
            ['GB', 'L12 3PL'], ['GB', 'Q1 2PL'], ['GE', '1234'], ['GF', '12345'],
            ['GG', 'GY10 2AB'], ['GL', '1234'], ['GH', 'GA18400'], ['GN', '123'], ['GP', '12345'],
            ['GR', '12345'], ['GS', 'SIQQ 1ZZ'], ['GT', '12345'], ['GU', '12345'], ['GW', '1234'],
            ['HM', '1234'], ['HN', '12345'], ['HR', '12345'], ['HT', '1234'], ['HU', '1234'],
            ['IC', '12345'], ['ID', '12345'], ['IR', 'A65 F4E2'], ['IR', 'D02 X285'],
            ['IL', '1234567'], ['IM', 'IM1 1AD'], ['IN', '123456'], ['IS', '123'], ['IT', '12345'],
            ['JE', 'JE2 4PJ'], ['JO', '12345'], ['JP', '123-4567'], ['JP', '1234567'],
            ['KE', '12345'], ['KG', '123456'], ['KH', '12345'], ['KR', '123-456'], ['KW', '12345'],
            ['KZ', '123456'], ['LA', '12345'], ['LB', '1234 5678'], ['LI', '1234'], ['LK', '12345'],
            ['LT', '12345'], ['LU', '1234'], ['LV', '1234'], ['MA', '12345'], ['MC', '12345'],
            ['ME', '81101'], ['MD', '1234'], ['MG', '123'], ['MH', '12345'], ['MK', '1234'],
            ['MN', '123456'], ['MP', '12345'], ['MQ', '12345'], ['MS', 'MSR1250'],
            ['MT', 'WRT 123'], ['MT', 'WRT 45'], ['MU', 'A1201'], ['MU', '80110'],
            ['MV', '12345'], ['MV', '1234'], ['MX', '12345'], ['MY', '12345'], ['NC', '98800'],
            ['NE', '1234'], ['NF', '2899'], ['NG', '123456'], ['NI', '22500'], ['NL', '1234 TR'],
            ['NO', '1234'], ['NP', '12345'], ['NZ', '1234'], ['OM', 'PC 123'], ['PA', '1234'],
            ['PF', '98701'], ['PG', '123'], ['PH', '1234'], ['PK', '12345'], ['PL', '12-345'],
            ['PM', '97500'], ['PN', 'PCRN 1ZZ'], ['PR', '12345'], ['PT', '1234'], ['PT', '1234-567'],
            ['PW', '96939'], ['PW', '96940'], ['PY', '1234'], ['RE', '12345'], ['RO', '123456'],
            ['RU', '123456'], ['SA', '12345'], ['SE', '123 45'], ['SG', '123456'],
            ['SH', 'ASCN 1ZZ'], ['SI', '1234'], ['SJ', '1234'], ['SK', '123 45'], ['SM', '47890'],
            ['SN', '12345'], ['SO', '12345'], ['SZ', 'R123'], ['TC', 'TKCA 1ZZ'], ['TH', '12345'],
            ['TJ', '123456'], ['TM', '123456'], ['TN', '1234'], ['TR', '12345'], ['TT', '120110'],
            ['TW', '123'], ['TW', '12345'], ['UA', '02232'], ['US', '12345-6789'], ['US', '12345'],
            ['UY', '12345'], ['UZ', '123456'], ['VA', '00120'], ['VE', '1234'], ['VI', '12345'],
            ['WF', '98601'], ['XK', '12345'], ['XY', '12345'], ['YT', '97601'], ['ZA', '1234'],
            ['ZM', '12345'],
=======
    public function getPostcodesDataProvider()
    {
        return [
            ['countryId' => 'AD', 'postcode' => 'AD100'],
            ['countryId' => 'AM', 'postcode' => '123456'],
            ['countryId' => 'AR', 'postcode' => '1234'],
            ['countryId' => 'AS', 'postcode' => '12345'],
            ['countryId' => 'AT', 'postcode' => '1234'],
            ['countryId' => 'AU', 'postcode' => '1234'],
            ['countryId' => 'AX', 'postcode' => '22101'],
            ['countryId' => 'AZ', 'postcode' => '1234'],
            ['countryId' => 'AZ', 'postcode' => '123456'],
            ['countryId' => 'BA', 'postcode' => '12345'],
            ['countryId' => 'BB', 'postcode' => 'BB10900'],
            ['countryId' => 'BD', 'postcode' => '1234'],
            ['countryId' => 'BE', 'postcode' => '1234'],
            ['countryId' => 'BG', 'postcode' => '1234'],
            ['countryId' => 'BH', 'postcode' => '323'],
            ['countryId' => 'BH', 'postcode' => '1209'],
            ['countryId' => 'BM', 'postcode' => 'MA 02'],
            ['countryId' => 'BN', 'postcode' => 'PS1234'],
            ['countryId' => 'BR', 'postcode' => '12345678'],
            ['countryId' => 'BR', 'postcode' => '12345-678'],
            ['countryId' => 'BY', 'postcode' => '123456'],
            ['countryId' => 'CA', 'postcode' => 'P9M 3T6'],
            ['countryId' => 'CC', 'postcode' => '6799'],
            ['countryId' => 'CH', 'postcode' => '1234'],
            ['countryId' => 'CK', 'postcode' => '1234'],
            ['countryId' => 'CL', 'postcode' => '1234567'],
            ['countryId' => 'CN', 'postcode' => '123456'],
            ['countryId' => 'CR', 'postcode' => '12345'],
            ['countryId' => 'CS', 'postcode' => '12345'],
            ['countryId' => 'CU', 'postcode' => '12345'],
            ['countryId' => 'CV', 'postcode' => '1234'],
            ['countryId' => 'CX', 'postcode' => '6798'],
            ['countryId' => 'CY', 'postcode' => '1234'],
            ['countryId' => 'CZ', 'postcode' => '123 45'],
            ['countryId' => 'DE', 'postcode' => '12345'],
            ['countryId' => 'DK', 'postcode' => '1234'],
            ['countryId' => 'DO', 'postcode' => '12345'],
            ['countryId' => 'DZ', 'postcode' => '12345'],
            ['countryId' => 'EC', 'postcode' => 'A1234B'],
            ['countryId' => 'EC', 'postcode' => 'AB123456'],
            ['countryId' => 'EC', 'postcode' => '123456'],
            ['countryId' => 'EE', 'postcode' => '12345'],
            ['countryId' => 'EG', 'postcode' => '12345'],
            ['countryId' => 'ES', 'postcode' => '12345'],
            ['countryId' => 'ET', 'postcode' => '1234'],
            ['countryId' => 'FI', 'postcode' => '12345'],
            ['countryId' => 'FK', 'postcode' => 'FIQQ 1ZZ'],
            ['countryId' => 'FM', 'postcode' => '96941'],
            ['countryId' => 'FO', 'postcode' => '123'],
            ['countryId' => 'FR', 'postcode' => '12345'],
            ['countryId' => 'GB', 'postcode' => 'PL12 3RT'],
            ['countryId' => 'GB', 'postcode' => 'P1L 2RT'],
            ['countryId' => 'GB', 'postcode' => 'QW1 2RT'],
            ['countryId' => 'GB', 'postcode' => 'QW1R 2TG'],
            ['countryId' => 'GB', 'postcode' => 'L12 3PL'],
            ['countryId' => 'GB', 'postcode' => 'Q1 2PL'],
            ['countryId' => 'GE', 'postcode' => '1234'],
            ['countryId' => 'GF', 'postcode' => '12345'],
            ['countryId' => 'GG', 'postcode' => 'GY10 2AB'],
            ['countryId' => 'GL', 'postcode' => '1234'],
            ['countryId' => 'GH', 'postcode' => 'GA18400'],
            ['countryId' => 'GN', 'postcode' => '123'],
            ['countryId' => 'GP', 'postcode' => '12345'],
            ['countryId' => 'GR', 'postcode' => '123 45'],
            ['countryId' => 'GS', 'postcode' => 'SIQQ 1ZZ'],
            ['countryId' => 'GT', 'postcode' => '12345'],
            ['countryId' => 'GU', 'postcode' => '12345'],
            ['countryId' => 'GW', 'postcode' => '1234'],
            ['countryId' => 'HM', 'postcode' => '1234'],
            ['countryId' => 'HN', 'postcode' => '12345'],
            ['countryId' => 'HR', 'postcode' => '12345'],
            ['countryId' => 'HT', 'postcode' => '1234'],
            ['countryId' => 'HU', 'postcode' => '1234'],
            ['countryId' => 'IC', 'postcode' => '12345'],
            ['countryId' => 'ID', 'postcode' => '12345'],
            ['countryId' => 'IL', 'postcode' => '1234567'],
            ['countryId' => 'IM', 'postcode' => 'IM1 1AD'],
            ['countryId' => 'IN', 'postcode' => '123456'],
            ['countryId' => 'IS', 'postcode' => '123'],
            ['countryId' => 'IT', 'postcode' => '12345'],
            ['countryId' => 'JE', 'postcode' => 'JE2 4PJ'],
            ['countryId' => 'JO', 'postcode' => '12345'],
            ['countryId' => 'JP', 'postcode' => '123-4567'],
            ['countryId' => 'JP', 'postcode' => '1234567'],
            ['countryId' => 'KE', 'postcode' => '12345'],
            ['countryId' => 'KG', 'postcode' => '123456'],
            ['countryId' => 'KH', 'postcode' => '12345'],
            ['countryId' => 'KR', 'postcode' => '123-456'],
            ['countryId' => 'KW', 'postcode' => '12345'],
            ['countryId' => 'KZ', 'postcode' => '123456'],
            ['countryId' => 'LA', 'postcode' => '12345'],
            ['countryId' => 'LB', 'postcode' => '1234 5678'],
            ['countryId' => 'LI', 'postcode' => '1234'],
            ['countryId' => 'LK', 'postcode' => '12345'],
            ['countryId' => 'LT', 'postcode' => '12345'],
            ['countryId' => 'LU', 'postcode' => '1234'],
            ['countryId' => 'LV', 'postcode' => '1234'],
            ['countryId' => 'MA', 'postcode' => '12345'],
            ['countryId' => 'MC', 'postcode' => '12345'],
            ['countryId' => 'ME', 'postcode' => '81101'],
            ['countryId' => 'MD', 'postcode' => '1234'],
            ['countryId' => 'MG', 'postcode' => '123'],
            ['countryId' => 'MH', 'postcode' => '12345'],
            ['countryId' => 'MK', 'postcode' => '1234'],
            ['countryId' => 'MN', 'postcode' => '123456'],
            ['countryId' => 'MP', 'postcode' => '12345'],
            ['countryId' => 'MQ', 'postcode' => '12345'],
            ['countryId' => 'MS', 'postcode' => 'MSR1250'],
            ['countryId' => 'MT', 'postcode' => 'WRT 123'],
            ['countryId' => 'MT', 'postcode' => 'WRT 45'],
            ['countryId' => 'MU', 'postcode' => 'A1201'],
            ['countryId' => 'MU', 'postcode' => '80110'],
            ['countryId' => 'MV', 'postcode' => '12345'],
            ['countryId' => 'MV', 'postcode' => '1234'],
            ['countryId' => 'MX', 'postcode' => '12345'],
            ['countryId' => 'MY', 'postcode' => '12345'],
            ['countryId' => 'NC', 'postcode' => '98800'],
            ['countryId' => 'NE', 'postcode' => '1234'],
            ['countryId' => 'NF', 'postcode' => '2899'],
            ['countryId' => 'NG', 'postcode' => '123456'],
            ['countryId' => 'NI', 'postcode' => '22500'],
            ['countryId' => 'NL', 'postcode' => '1234 TR'],
            ['countryId' => 'NO', 'postcode' => '1234'],
            ['countryId' => 'NP', 'postcode' => '12345'],
            ['countryId' => 'NZ', 'postcode' => '1234'],
            ['countryId' => 'OM', 'postcode' => 'PC 123'],
            ['countryId' => 'PA', 'postcode' => '1234'],
            ['countryId' => 'PF', 'postcode' => '98701'],
            ['countryId' => 'PG', 'postcode' => '123'],
            ['countryId' => 'PH', 'postcode' => '1234'],
            ['countryId' => 'PK', 'postcode' => '12345'],
            ['countryId' => 'PL', 'postcode' => '12-345'],
            ['countryId' => 'PM', 'postcode' => '97500'],
            ['countryId' => 'PN', 'postcode' => 'PCRN 1ZZ'],
            ['countryId' => 'PR', 'postcode' => '12345'],
            ['countryId' => 'PT', 'postcode' => '1234'],
            ['countryId' => 'PT', 'postcode' => '1234-567'],
            ['countryId' => 'PW', 'postcode' => '96939'],
            ['countryId' => 'PW', 'postcode' => '96940'],
            ['countryId' => 'PY', 'postcode' => '1234'],
            ['countryId' => 'RE', 'postcode' => '12345'],
            ['countryId' => 'RO', 'postcode' => '123456'],
            ['countryId' => 'RU', 'postcode' => '123456'],
            ['countryId' => 'SA', 'postcode' => '12345'],
            ['countryId' => 'SE', 'postcode' => '123 45'],
            ['countryId' => 'SG', 'postcode' => '123456'],
            ['countryId' => 'SH', 'postcode' => 'ASCN 1ZZ'],
            ['countryId' => 'SI', 'postcode' => '1234'],
            ['countryId' => 'SJ', 'postcode' => '1234'],
            ['countryId' => 'SK', 'postcode' => '123 45'],
            ['countryId' => 'SM', 'postcode' => '47890'],
            ['countryId' => 'SN', 'postcode' => '12345'],
            ['countryId' => 'SO', 'postcode' => '12345'],
            ['countryId' => 'SZ', 'postcode' => 'R123'],
            ['countryId' => 'TC', 'postcode' => 'TKCA 1ZZ'],
            ['countryId' => 'TH', 'postcode' => '12345'],
            ['countryId' => 'TJ', 'postcode' => '123456'],
            ['countryId' => 'TM', 'postcode' => '123456'],
            ['countryId' => 'TN', 'postcode' => '1234'],
            ['countryId' => 'TR', 'postcode' => '12345'],
            ['countryId' => 'TT', 'postcode' => '120110'],
            ['countryId' => 'TW', 'postcode' => '123'],
            ['countryId' => 'TW', 'postcode' => '12345'],
            ['countryId' => 'UA', 'postcode' => '02232'],
            ['countryId' => 'US', 'postcode' => '12345-6789'],
            ['countryId' => 'US', 'postcode' => '12345'],
            ['countryId' => 'UY', 'postcode' => '12345'],
            ['countryId' => 'UZ', 'postcode' => '123456'],
            ['countryId' => 'VA', 'postcode' => '00120'],
            ['countryId' => 'VE', 'postcode' => '1234'],
            ['countryId' => 'VI', 'postcode' => '12345'],
            ['countryId' => 'WF', 'postcode' => '98601'],
            ['countryId' => 'XK', 'postcode' => '12345'],
            ['countryId' => 'XY', 'postcode' => '12345'],
            ['countryId' => 'YT', 'postcode' => '97601'],
            ['countryId' => 'ZA', 'postcode' => '1234'],
            ['countryId' => 'ZM', 'postcode' => '12345'],
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }
}
