<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        $countries = [
            ['code' => 'GH', 'name' => 'Ghana', 'region_id' => 2, 'currency' => 'GHS'],
            ['code' => 'NG', 'name' => 'Nigeria', 'region_id' => 2, 'currency' => 'NGN'],
            ['code' => 'ZA', 'name' => 'South Africa', 'region_id' => 2, 'currency' => 'ZAR'],
            ['code' => 'DZ', 'name' => 'Algeria', 'region_id' => 2, 'currency' => 'DZD'],
            ['code' => 'AO', 'name' => 'Angola', 'region_id' => 2, 'currency' => 'AOA'],
            ['code' => 'BJ', 'name' => 'Benin', 'region_id' => 2, 'currency' => 'XOF'],
            ['code' => 'BW', 'name' => 'Botswana', 'region_id' => 2, 'currency' => 'BWP'],
            ['code' => 'BF', 'name' => 'Burkina Faso', 'region_id' => 2, 'currency' => 'XOF'],
            ['code' => 'BI', 'name' => 'Burundi', 'region_id' => 2, 'currency' => 'BIF'],
            ['code' => 'CM', 'name' => 'Cameroon', 'region_id' => 2, 'currency' => 'XAF'],
            ['code' => 'CV', 'name' => 'Cape Verde', 'region_id' => 2, 'currency' => 'CVE'],
            ['code' => 'CF', 'name' => 'Central African Republic', 'region_id' => 2, 'currency' => 'XAF'],
            ['code' => 'TD', 'name' => 'Chad', 'region_id' => 2, 'currency' => 'XAF'],
            ['code' => 'KM', 'name' => 'Comoros', 'region_id' => 2, 'currency' => 'KMF'],
            ['code' => 'CG', 'name' => 'Congo', 'region_id' => 2, 'currency' => 'CDF'],
            ['code' => 'DJ', 'name' => 'Djibouti', 'region_id' => 2, 'currency' => 'DJF'],
            ['code' => 'GQ', 'name' => 'Equatorial Guinea', 'region_id' => 2, 'currency' => 'XAF'],
            ['code' => 'ET', 'name' => 'Ethiopia', 'region_id' => 2, 'currency' => 'ETB'],
            ['code' => 'EG', 'name' => 'Egypt', 'region_id' => 2, 'currency' => 'EGP'],
            ['code' => 'ER', 'name' => 'Eritrea', 'region_id' => 2, 'currency' => 'ERN'],
            ['code' => 'GA', 'name' => 'Gabon', 'region_id' => 2, 'currency' => 'XAF'],
            ['code' => 'GM', 'name' => 'Gambia', 'region_id' => 2, 'currency' => 'GMD'],
            ['code' => 'GN', 'name' => 'Guinea', 'region_id' => 2, 'currency' => 'GNF'],
            ['code' => 'GW', 'name' => 'Guinea-Bissau', 'region_id' => 2, 'currency' => 'XOF'],
            ['code' => 'CI', 'name' => 'Ivory Coast', 'region_id' => 2, 'currency' => 'XOF'],
            ['code' => 'KE', 'name' => 'Kenya', 'region_id' => 2, 'currency' => 'KES'],
            ['code' => 'LS', 'name' => 'Lesotho', 'region_id' => 2, 'currency' => 'LSL'],
            ['code' => 'LR', 'name' => 'Liberia', 'region_id' => 2, 'currency' => 'LRD'],
            ['code' => 'LY', 'name' => 'Libya', 'region_id' => 2, 'currency' => 'LYD'],
            ['code' => 'MG', 'name' => 'Madagascar', 'region_id' => 2, 'currency' => 'MGA'],
            ['code' => 'MW', 'name' => 'Malawi', 'region_id' => 2, 'currency' => 'MWK'],
            ['code' => 'ML', 'name' => 'Mali', 'region_id' => 2, 'currency' => 'XOF'],
            ['code' => 'MR', 'name' => 'Mauritania', 'region_id' => 2, 'currency' => 'MRU'],
            ['code' => 'MU', 'name' => 'Mauritius', 'region_id' => 2, 'currency' => 'MUR'],
            ['code' => 'MA', 'name' => 'Morocco', 'region_id' => 2, 'currency' => 'MAD'],
            ['code' => 'MZ', 'name' => 'Mozambique', 'region_id' => 2, 'currency' => 'MZN'],
            ['code' => 5, 'name' => 'Namibia', 'region_id' => 2, 'currency' => 'NAD'],
            ['code' => 'NE', 'name' => 'Niger', 'region_id' => 2, 'currency' => 'XOF'],
            ['code' => 'SS', 'name' => 'South Sudan', 'region_id' => 2, 'currency' => 'SSP'],
            ['code' => 'RW', 'name' => 'Rwanda', 'region_id' => 2, 'currency' => 'RWF'],
            ['code' => 'ST', 'name' => 'Sao Tome and Principe', 'region_id' => 2, 'currency' => 'STD'],
            ['code' => 'SN', 'name' => 'Senegal', 'region_id' => 2, 'currency' => 'XOF'],
            ['code' => 'SC', 'name' => 'Seychelles', 'region_id' => 2, 'currency' => 'SCR'],
            ['code' => 'SL', 'name' => 'Sierra Leone', 'region_id' => 2, 'currency' => 'SLL'],
            ['code' => 'SO', 'name' => 'Somalia', 'region_id' => 2, 'currency' => 'SOS'],
            ['code' => 'SD', 'name' => 'Sudan', 'region_id' => 2, 'currency' => 'SDG'],
            ['code' => 'SZ', 'name' => 'Swaziland', 'region_id' => 2, 'currency' => 'SZL'],
            ['code' => 'TZ', 'name' => 'Tanzania', 'region_id' => 2, 'currency' => 'TZS'],
            ['code' => 'TG', 'name' => 'Togo', 'region_id' => 2, 'currency' => 'XOF'],
            ['code' => 'TN', 'name' => 'Tunisia', 'region_id' => 2, 'currency' => 'TND'],
            ['code' => 'UG', 'name' => 'Uganda', 'region_id' => 2, 'currency' => 'UGX'],
            ['code' => 'ZR', 'name' => 'Zaire', 'region_id' => 2, 'currency' => 'ZRN'],
            ['code' => 'ZM', 'name' => 'Zambia', 'region_id' => 2, 'currency' => 'ZMW'],
            ['code' => 'ZW', 'name' => 'Zimbabwe', 'region_id' => 2, 'currency' => 'ZWL'],
            ['code' => 2, 'name' => 'Afghanistan', 'region_id' => 1, 'currency' => 'AFN'],
            ['code' => 'BH', 'name' => 'Bahrain', 'region_id' => 1, 'currency' => 'BHD'],
            ['code' => 'BD', 'name' => 'Bangladesh', 'region_id' => 1, 'currency' => 'BDT'],
            ['code' => 'BN', 'name' => 'Brunei', 'region_id' => 1, 'currency' => 'BND'],
            ['code' => 'KH', 'name' => 'Cambodia', 'region_id' => 1, 'currency' => 'KHR'],
            ['code' => 'CN', 'name' => 'China', 'region_id' => 1, 'currency' => 'CNY'],
            ['code' => 'JP', 'name' => 'Japan', 'region_id' => 1, 'currency' => 'JPY'],
            ['code' => 'IN', 'name' => 'India', 'region_id' => 1, 'currency' => 'INR'],
            ['code' => 'ID', 'name' => 'Indonesia', 'region_id' => 1, 'currency' => 'IDR'],
            ['code' => 'IR', 'name' => 'Iran', 'region_id' => 1, 'currency' => 'IRR'],
            ['code' => 'IQ', 'name' => 'Iraq', 'region_id' => 1, 'currency' => 'IQD'],
            ['code' => 'IL', 'name' => 'Israel', 'region_id' => 1, 'currency' => 'ILS'],
            ['code' => 'JO', 'name' => 'Jordan', 'region_id' => 1, 'currency' => 'JOD'],
            ['code' => 'KZ', 'name' => 'Kazakhstan', 'region_id' => 1, 'currency' => 'KZT'],
            ['code' => 'KP', 'name' => 'South Korea', 'region_id' => 1, 'currency' => 'KRW'],
            ['code' => 'KR', 'name' => 'North Korea', 'region_id' => 1, 'currency' => 'KPW'],
            ['code' => 'KW', 'name' => 'Kuwait', 'region_id' => 1, 'currency' => 'KWD'],
            ['code' => 'KG', 'name' => 'Kyrgyzstan', 'region_id' => 1, 'currency' => 'KGS'],
            ['code' => 'LB', 'name' => 'Lebanon', 'region_id' => 1, 'currency' => 'LBP'],
            ['code' => 'MO', 'name' => 'Macau', 'region_id' => 1, 'currency' => 'MOP'],
            ['code' => 'MY', 'name' => 'Malaysia', 'region_id' => 1, 'currency' => 'MYR'],
            ['code' => 'MV', 'name' => 'Maldives', 'region_id' => 1, 'currency' => 'MVR'],
            ['code' => 'MM', 'name' => 'Myanmar', 'region_id' => 1, 'currency' => 'MMK'],
            ['code' => 'MN', 'name' => 'Mongolia', 'region_id' => 1, 'currency' => 'MNT'],
            ['code' => 'NP', 'name' => 'Nepal', 'region_id' => 1, 'currency' => 'NPR'],
            ['code' => 'OM', 'name' => 'Oman', 'region_id' => 1, 'currency' => 'OMR'],
            ['code' => 'PK', 'name' => 'Pakistan', 'region_id' => 1, 'currency' => 'OMR'],
            ['code' => 'PH', 'name' => 'Philippines', 'region_id' => 1, 'currency' => 'PHP'],
            ['code' => 'QA', 'name' => 'Qatar', 'region_id' => 1, 'currency' => 'QAR'],
            ['code' => 4, 'name' => 'Saudi Arabia', 'region_id' => 1, 'currency' => 'SAR'],
            ['code' => 'SG', 'name' => 'Singapore', 'region_id' => 1, 'currency' => 'SGD'],
            ['code' => 'LK', 'name' => 'Sri Lanka', 'region_id' => 1, 'currency' => 'LKR'],
            ['code' => 'SY', 'name' => 'Syrian Arab Republic', 'region_id' => 1, 'currency' => 'SYP'],
            ['code' => 'TW', 'name' => 'Taiwan', 'region_id' => 1, 'currency' => 'TWD'],
            ['code' => 'TJ', 'name' => 'Tajikistan', 'region_id' => 1, 'currency' => 'TJS'],
            ['code' => 'TH', 'name' => 'Thailand', 'region_id' => 1, 'currency' => 'THB'],
            ['code' => 'TR', 'name' => 'Turkey', 'region_id' => 1, 'currency' => 'TRY'],
            ['code' => 'AE', 'name' => 'United Arab Emirates', 'region_id' => 1, 'currency' => 'AED'],
            ['code' => 'UZ', 'name' => 'Uzbekistan', 'region_id' => 1, 'currency' => 'UZS'],
            ['code' => 'VN', 'name' => 'Vietnam', 'region_id' => 1, 'currency' => 'VND'],
            ['code' => 'YE', 'name' => 'Yemen', 'region_id' => 1, 'currency' => 'YER'],
            ['code' => 'AL', 'name' => 'Albania', 'region_id' => 3, 'currency' => 'ALL'],
            ['code' => 'AD', 'name' => 'Andorra', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'AM', 'name' => 'Armenia', 'region_id' => 3, 'currency' => 'AMD'],
            ['code' => 'AT', 'name' => 'Austria', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'AZ', 'name' => 'Azerbaijan', 'region_id' => 3, 'currency' => 'AZN'],
            ['code' => 'BY', 'name' => 'Belarus', 'region_id' => 3, 'currency' => 'BYN'],
            ['code' => 'BE', 'name' => 'Belgium', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'BA', 'name' => 'Bosnia and Herzegovina', 'region_id' => 3, 'currency' => 'BAM'],
            ['code' => 'BG', 'name' => 'Bulgaria', 'region_id' => 3, 'currency' => 'BGN'],
            ['code' => 'CY', 'name' => 'Cyprus', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'CZ', 'name' => 'Czech Republic', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'HR', 'name' => 'Croatia', 'region_id' => 3, 'currency' => 'HRK'],
            ['code' => 'EE', 'name' => 'Estonia', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'DK', 'name' => 'Denmark', 'region_id' => 3, 'currency' => 'DKK'],
            ['code' => 'FI', 'name' => 'Finland', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'FR', 'name' => 'France', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'GE', 'name' => 'Georgia', 'region_id' => 3, 'currency' => 'GEL'],
            ['code' => 'DE', 'name' => 'Germany', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'GI', 'name' => 'Gibraltar', 'region_id' => 3, 'currency' => 'GIP'],
            ['code' => 'GR', 'name' => 'Greece', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'HU', 'name' => 'Hungary', 'region_id' => 3, 'currency' => 'HUF'],
            ['code' => 'IS', 'name' => 'Iceland', 'region_id' => 3, 'currency' => 'ISK'],
            ['code' => 'IE', 'name' => 'Ireland', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'IT', 'name' => 'Italy',  'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'LV', 'name' => 'Latvia', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'LI', 'name' => 'Liechtenstein', 'region_id' => 3, 'currency' => 'CHF'],
            ['code' => 'LT', 'name' => 'Lithuania', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'LU', 'name' => 'Luxembourg', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'MK', 'name' => 'Macedonia', 'region_id' => 3, 'currency' => 'MKD'],
            ['code' => 'MT', 'name' => 'Malta', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'MD', 'name' => 'Moldova, Republic of', 'region_id' => 3, 'currency' => 'MDL'],
            ['code' => 'NL', 'name' => 'Netherlands', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'NO', 'name' => 'Norway', 'region_id' => 3, 'currency' => 'NOK'],
            ['code' => 'PL', 'name' => 'Poland', 'region_id' => 3, 'currency' => 'PLN'],
            ['code' => 'PT', 'name' => 'Portugal', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'RO', 'name' => 'Romania', 'region_id' => 3, 'currency' => 'RON'],
            ['code' => 'RU', 'name' => 'Russia', 'region_id' => 3, 'currency' => 'RUB'],
            ['code' => 'SM', 'name' => 'San Marino', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'RS', 'name' => 'Serbia', 'region_id' => 3, 'currency' => 'RSD'],
            ['code' => 'SK', 'name' => 'Slovakia', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'SI', 'name' => 'Slovenia', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'ES', 'name' => 'Spain', 'region_id' => 3, 'currency' => 'EUR'],
            ['code' => 'SE', 'name' => 'Sweden', 'region_id' => 3, 'currency' => 'SEK'],
            ['code' => 'CH', 'name' => 'Switzerland', 'region_id' => 3, 'currency' => 'CHF'],
            ['code' => 'UA', 'name' => 'Ukraine', 'region_id' => 3, 'currency' => 'UAH'],
            ['code' => 'GB', 'name' => 'United Kingdom', 'region_id' => 3, 'currency' => 'GBP'],
            ['code' => 'YU', 'name' => 'Yugoslavia', 'region_id' => 3, 'currency' => 'YUM'],
            ['code' => 'CA', 'name' => 'Canada', 'region_id' => 5, 'currency' => 'CAD'],
            ['code' => 'CR', 'name' => 'Costa Rica', 'region_id' => 5, 'currency' => 'CRC'],
            ['code' => 'BB', 'name' => 'Barbados', 'region_id' => 5, 'currency' => 'BBD'],
            ['code' => 'DO', 'name' => 'Dominican Republic', 'region_id' => 5, 'currency' => 'DOP'],
            ['code' => 'SV', 'name' => 'El Salvador', 'region_id' => 5, 'currency' => 'SVC'],
            ['code' => 'GL', 'name' => 'Greenland', 'region_id' => 5, 'currency' => 'DKK'],
            ['code' => 'GT', 'name' => 'Guatemala', 'region_id' => 5, 'currency' => 'GTQ'],
            ['code' => 'HT', 'name' => 'Haiti', 'region_id' => 5, 'currency' => 'HTG'],
            ['code' => 'HN', 'name' => 'Honduras', 'region_id' => 5, 'currency' => 'HNL'],
            ['code' => 'MX', 'name' => 'Mexico', 'region_id' => 5, 'currency' => 'MXN'],
            ['code' => 'NI', 'name' => 'Nicaragua', 'region_id' => 5, 'currency' => 'NIO'],
            ['code' => 'PA', 'name' => 'Panama', 'region_id' => 5, 'currency' => 'PAB'],
            ['code' => 'US', 'name' => 'United States of America', 'region_id' => 5, 'currency' => 'USD'],
            ['code' => 'AU', 'name' => 'Australia', 'region_id' => 7, 'currency' => 'AUD'],
            ['code' => 'NZ', 'name' => 'New Zealand', 'region_id' => 7, 'currency' => 'NZD'],
            ['code' => 'WS', 'name' => 'Samoa', 'region_id' => 7, 'currency' => 'WST'],
            ['code' => 'AR', 'name' => 'Argentina', 'region_id' => 4, 'currency' => 'ARS'],
            ['code' => 'BR', 'name' => 'Brazil', 'region_id' => 4, 'currency' => 'BRL'],
            ['code' => 'CL', 'name' => 'Chile', 'region_id' => 4, 'currency' => 'CLP'],
            ['code' => 'CO', 'name' => 'Colombia', 'region_id' => 4, 'currency' => 'COP'],
            ['code' => 'EC', 'name' => 'Ecuador', 'region_id' => 4, 'currency' => 'ECU'],
            ['code' => 'GY', 'name' => 'Guyana', 'region_id' => 4, 'currency' => 'GYD'],
            ['code' => 'PY', 'name' => 'Paraguay', 'region_id' => 4, 'currency' => 'PYG'],
            ['code' => 'PE', 'name' => 'Peru', 'region_id' => 4, 'currency' => 'PEN'],
            ['code' => 'BO', 'name' => 'Bolivia', 'region_id' => 4, 'currency' => 'BOB'],
            ['code' => 'SR', 'name' => 'Suriname', 'region_id' => 4, 'currency' => 'GHS'],
            ['code' => 'TT', 'name' => 'Trinidad and Tobago', 'region_id' => 4, 'currency' => 'TTD'],
            ['code' => 'UY', 'name' => 'Uruguay', 'region_id' => 4, 'currency' => 'UYU'],
            ['code' => 'VE', 'name' => 'Venezuela', 'region_id' => 4, 'currency' => 'VED'],
        ];

        foreach ($countries as $key => $country) {

            Country::create([
                'name' => $country['name'],
                'code' => $country['code'],
                'region_id' => $country['region_id']
            ]);
        }
    }
}
