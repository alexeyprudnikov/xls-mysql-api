<?php
/**
 * Created by PhpStorm.
 * User: aprudnikov
 * Date: 2019-02-20
 * Time: 13:42
 */

namespace App\Utils;


class DataMapper
{
    protected static $mapper = [
        'B' => 'companyName',
        'C' => 'companyLegalForm',
        'D' => 'companyAddressStreet',
        'E' => 'companyAddressZip',
        'F' => 'companyAddressCity',
        'G' => 'companyEmail',
        'H' => 'companyHomepage',
        'I' => 'companyHomepagePrint',
        'J' => 'companyPhone',
        'K' => 'companyPhoneContact',
        'L' => 'companyInstagram',
        'M' => 'companyInstagramPrint',
        'N' => 'companyInstagramContact',
        'O' => 'companyTwitter',
        'P' => 'companyTwitterPrint',
        'Q' => 'companyTwitterContact',
        'R' => 'companyFacebook',
        'S' => 'companyFacebookPrint',
        'T' => 'companyFacebookContact',
        'U' => 'companyLinkedIn',
        'V' => 'companyLinkedInPrint',
        'W' => 'companyLinkedInContact',
        'X' => 'companyXing',
        'Y' => 'companyXingPrint',
        'Z' => 'companyXingContact',
        'AA' => 'companySlacPrint',
        'AB' => 'companySlacContact',
        'AC' => 'companyPinterest',

        'AL' => 'contactPersonFullName',
        'AM' => 'contactPersonPosition',
        'AN' => 'contactPersonEmail',

        'AP' => 'categories',
        'AQ' => 'categories',
        'AR' => 'categories',
        'AS' => 'categories',
        'AT' => 'categories',
        'AU' => 'categories',
        'AV' => 'categories',
        'AW' => 'categories',
        'AX' => 'categories',
        'AY' => 'categories',
        'AZ' => 'categories',
        'BA' => 'categories',
        'BB' => 'categories',
        'BC' => 'categories',
        'BD' => 'categories',
        'BE' => 'categories',
        'BF' => 'tags',
        'BG' => 'exhibitorSxswTradeShow',
        'BH' => 'partnerGermanHouse',
        'BI' => 'partnerGermanHouseExt',
        'BJ' => 'companyPortrait',
        'BK' => 'logoLoaded',
    ];

    /**
     * @param string $key
     * @return string
     */
    public function getCompanyDataSetter(string $key): string
    {
        return (array_key_exists($key, self::$mapper) ? 'set'.ucfirst(self::$mapper[$key]) : '');
    }

}