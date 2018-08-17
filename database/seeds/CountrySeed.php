<?php

use Illuminate\Database\Seeder;

class CountrySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'shortcode' => 'AF', 'title' => 'Afghanistan'],
            ['id' => 2, 'shortcode' => 'AL', 'title' => 'Albania'],
            ['id' => 3, 'shortcode' => 'DZ', 'title' => 'Algeria'],
            ['id' => 4, 'shortcode' => 'AS', 'title' => 'American Samoa'],
            ['id' => 5, 'shortcode' => 'AD', 'title' => 'Andorra'],
            ['id' => 6, 'shortcode' => 'AO', 'title' => 'Angola'],
            ['id' => 7, 'shortcode' => 'AI', 'title' => 'Anguilla'],
            ['id' => 8, 'shortcode' => 'AQ', 'title' => 'Antarctica'],
            ['id' => 9, 'shortcode' => 'AG', 'title' => 'Antigua and Barbuda'],
            ['id' => 10, 'shortcode' => 'AR', 'title' => 'Argentina'],
            ['id' => 11, 'shortcode' => 'AM', 'title' => 'Armenia'],
            ['id' => 12, 'shortcode' => 'AW', 'title' => 'Aruba'],
            ['id' => 13, 'shortcode' => 'AU', 'title' => 'Australia'],
            ['id' => 14, 'shortcode' => 'AT', 'title' => 'Austria'],
            ['id' => 15, 'shortcode' => 'AZ', 'title' => 'Azerbaijan'],
            ['id' => 16, 'shortcode' => 'BS', 'title' => 'Bahamas'],
            ['id' => 17, 'shortcode' => 'BH', 'title' => 'Bahrain'],
            ['id' => 18, 'shortcode' => 'BD', 'title' => 'Bangladesh'],
            ['id' => 19, 'shortcode' => 'BB', 'title' => 'Barbados'],
            ['id' => 20, 'shortcode' => 'BY', 'title' => 'Belarus'],
            ['id' => 21, 'shortcode' => 'BE', 'title' => 'Belgium'],
            ['id' => 22, 'shortcode' => 'BZ', 'title' => 'Belize'],
            ['id' => 23, 'shortcode' => 'BJ', 'title' => 'Benin'],
            ['id' => 24, 'shortcode' => 'BM', 'title' => 'Bermuda'],
            ['id' => 25, 'shortcode' => 'BT', 'title' => 'Bhutan'],
            ['id' => 26, 'shortcode' => 'BO', 'title' => 'Bolivia'],
            ['id' => 27, 'shortcode' => 'BA', 'title' => 'Bosnia and Herzegovina'],
            ['id' => 28, 'shortcode' => 'BW', 'title' => 'Botswana'],
            ['id' => 29, 'shortcode' => 'BV', 'title' => 'Bouvet Island'],
            ['id' => 30, 'shortcode' => 'BR', 'title' => 'Brazil'],
            ['id' => 31, 'shortcode' => 'BQ', 'title' => 'British Antarctic Territory'],
            ['id' => 32, 'shortcode' => 'IO', 'title' => 'British Indian Ocean Territory'],
            ['id' => 33, 'shortcode' => 'VG', 'title' => 'British Virgin Islands'],
            ['id' => 34, 'shortcode' => 'BN', 'title' => 'Brunei'],
            ['id' => 35, 'shortcode' => 'BG', 'title' => 'Bulgaria'],
            ['id' => 36, 'shortcode' => 'BF', 'title' => 'Burkina Faso'],
            ['id' => 37, 'shortcode' => 'BI', 'title' => 'Burundi'],
            ['id' => 38, 'shortcode' => 'KH', 'title' => 'Cambodia'],
            ['id' => 39, 'shortcode' => 'CM', 'title' => 'Cameroon'],
            ['id' => 40, 'shortcode' => 'CA', 'title' => 'Canada'],
            ['id' => 41, 'shortcode' => 'CT', 'title' => 'Canton and Enderbury Islands'],
            ['id' => 42, 'shortcode' => 'CV', 'title' => 'Cape Verde'],
            ['id' => 43, 'shortcode' => 'KY', 'title' => 'Cayman Islands'],
            ['id' => 44, 'shortcode' => 'CF', 'title' => 'Central African Republic'],
            ['id' => 45, 'shortcode' => 'TD', 'title' => 'Chad'],
            ['id' => 46, 'shortcode' => 'CL', 'title' => 'Chile'],
            ['id' => 47, 'shortcode' => 'CN', 'title' => 'China'],
            ['id' => 48, 'shortcode' => 'CX', 'title' => 'Christmas Island'],
            ['id' => 49, 'shortcode' => 'CC', 'title' => 'Cocos [Keeling] Islands'],
            ['id' => 50, 'shortcode' => 'CO', 'title' => 'Colombia'],
            ['id' => 51, 'shortcode' => 'KM', 'title' => 'Comoros'],
            ['id' => 52, 'shortcode' => 'CG', 'title' => 'Congo - Brazzaville'],
            ['id' => 53, 'shortcode' => 'CD', 'title' => 'Congo - Kinshasa'],
            ['id' => 54, 'shortcode' => 'CK', 'title' => 'Cook Islands'],
            ['id' => 55, 'shortcode' => 'CR', 'title' => 'Costa Rica'],
            ['id' => 56, 'shortcode' => 'HR', 'title' => 'Croatia'],
            ['id' => 57, 'shortcode' => 'CU', 'title' => 'Cuba'],
            ['id' => 58, 'shortcode' => 'CY', 'title' => 'Cyprus'],
            ['id' => 59, 'shortcode' => 'CZ', 'title' => 'Czech Republic'],
            ['id' => 60, 'shortcode' => 'CI', 'title' => 'Côte d’Ivoire'],
            ['id' => 61, 'shortcode' => 'DK', 'title' => 'Denmark'],
            ['id' => 62, 'shortcode' => 'DJ', 'title' => 'Djibouti'],
            ['id' => 63, 'shortcode' => 'DM', 'title' => 'Dominica'],
            ['id' => 64, 'shortcode' => 'DO', 'title' => 'Dominican Republic'],
            ['id' => 65, 'shortcode' => 'NQ', 'title' => 'Dronning Maud Land'],
            ['id' => 66, 'shortcode' => 'DD', 'title' => 'East Germany'],
            ['id' => 67, 'shortcode' => 'EC', 'title' => 'Ecuador'],
            ['id' => 68, 'shortcode' => 'EG', 'title' => 'Egypt'],
            ['id' => 69, 'shortcode' => 'SV', 'title' => 'El Salvador'],
            ['id' => 70, 'shortcode' => 'GQ', 'title' => 'Equatorial Guinea'],
            ['id' => 71, 'shortcode' => 'ER', 'title' => 'Eritrea'],
            ['id' => 72, 'shortcode' => 'EE', 'title' => 'Estonia'],
            ['id' => 73, 'shortcode' => 'ET', 'title' => 'Ethiopia'],
            ['id' => 74, 'shortcode' => 'FK', 'title' => 'Falkland Islands'],
            ['id' => 75, 'shortcode' => 'FO', 'title' => 'Faroe Islands'],
            ['id' => 76, 'shortcode' => 'FJ', 'title' => 'Fiji'],
            ['id' => 77, 'shortcode' => 'FI', 'title' => 'Finland'],
            ['id' => 78, 'shortcode' => 'FR', 'title' => 'France'],
            ['id' => 79, 'shortcode' => 'GF', 'title' => 'French Guiana'],
            ['id' => 80, 'shortcode' => 'PF', 'title' => 'French Polynesia'],
            ['id' => 81, 'shortcode' => 'TF', 'title' => 'French Southern Territories'],
            ['id' => 82, 'shortcode' => 'FQ', 'title' => 'French Southern and Antarctic Territories'],
            ['id' => 83, 'shortcode' => 'GA', 'title' => 'Gabon'],
            ['id' => 84, 'shortcode' => 'GM', 'title' => 'Gambia'],
            ['id' => 85, 'shortcode' => 'GE', 'title' => 'Georgia'],
            ['id' => 86, 'shortcode' => 'DE', 'title' => 'Germany'],
            ['id' => 87, 'shortcode' => 'GH', 'title' => 'Ghana'],
            ['id' => 88, 'shortcode' => 'GI', 'title' => 'Gibraltar'],
            ['id' => 89, 'shortcode' => 'GR', 'title' => 'Greece'],
            ['id' => 90, 'shortcode' => 'GL', 'title' => 'Greenland'],
            ['id' => 91, 'shortcode' => 'GD', 'title' => 'Grenada'],
            ['id' => 92, 'shortcode' => 'GP', 'title' => 'Guadeloupe'],
            ['id' => 93, 'shortcode' => 'GU', 'title' => 'Guam'],
            ['id' => 94, 'shortcode' => 'GT', 'title' => 'Guatemala'],
            ['id' => 95, 'shortcode' => 'GG', 'title' => 'Guernsey'],
            ['id' => 96, 'shortcode' => 'GN', 'title' => 'Guinea'],
            ['id' => 97, 'shortcode' => 'GW', 'title' => 'Guinea-Bissau'],
            ['id' => 98, 'shortcode' => 'GY', 'title' => 'Guyana'],
            ['id' => 99, 'shortcode' => 'HT', 'title' => 'Haiti'],
            ['id' => 100, 'shortcode' => 'HM', 'title' => 'Heard Island and McDonald Islands'],
            ['id' => 101, 'shortcode' => 'HN', 'title' => 'Honduras'],
            ['id' => 102, 'shortcode' => 'HK', 'title' => 'Hong Kong SAR China'],
            ['id' => 103, 'shortcode' => 'HU', 'title' => 'Hungary'],
            ['id' => 104, 'shortcode' => 'IS', 'title' => 'Iceland'],
            ['id' => 105, 'shortcode' => 'IN', 'title' => 'India'],
            ['id' => 106, 'shortcode' => 'ID', 'title' => 'Indonesia'],
            ['id' => 107, 'shortcode' => 'IR', 'title' => 'Iran'],
            ['id' => 108, 'shortcode' => 'IQ', 'title' => 'Iraq'],
            ['id' => 109, 'shortcode' => 'IE', 'title' => 'Ireland'],
            ['id' => 110, 'shortcode' => 'IM', 'title' => 'Isle of Man'],
            ['id' => 111, 'shortcode' => 'IL', 'title' => 'Israel'],
            ['id' => 112, 'shortcode' => 'IT', 'title' => 'Italy'],
            ['id' => 113, 'shortcode' => 'JM', 'title' => 'Jamaica'],
            ['id' => 114, 'shortcode' => 'JP', 'title' => 'Japan'],
            ['id' => 115, 'shortcode' => 'JE', 'title' => 'Jersey'],
            ['id' => 116, 'shortcode' => 'JT', 'title' => 'Johnston Island'],
            ['id' => 117, 'shortcode' => 'JO', 'title' => 'Jordan'],
            ['id' => 118, 'shortcode' => 'KZ', 'title' => 'Kazakhstan'],
            ['id' => 119, 'shortcode' => 'KE', 'title' => 'Kenya'],
            ['id' => 120, 'shortcode' => 'KI', 'title' => 'Kiribati'],
            ['id' => 121, 'shortcode' => 'KW', 'title' => 'Kuwait'],
            ['id' => 122, 'shortcode' => 'KG', 'title' => 'Kyrgyzstan'],
            ['id' => 123, 'shortcode' => 'LA', 'title' => 'Laos'],
            ['id' => 124, 'shortcode' => 'LV', 'title' => 'Latvia'],
            ['id' => 125, 'shortcode' => 'LB', 'title' => 'Lebanon'],
            ['id' => 126, 'shortcode' => 'LS', 'title' => 'Lesotho'],
            ['id' => 127, 'shortcode' => 'LR', 'title' => 'Liberia'],
            ['id' => 128, 'shortcode' => 'LY', 'title' => 'Libya'],
            ['id' => 129, 'shortcode' => 'LI', 'title' => 'Liechtenstein'],
            ['id' => 130, 'shortcode' => 'LT', 'title' => 'Lithuania'],
            ['id' => 131, 'shortcode' => 'LU', 'title' => 'Luxembourg'],
            ['id' => 132, 'shortcode' => 'MO', 'title' => 'Macau SAR China'],
            ['id' => 133, 'shortcode' => 'MK', 'title' => 'Macedonia'],
            ['id' => 134, 'shortcode' => 'MG', 'title' => 'Madagascar'],
            ['id' => 135, 'shortcode' => 'MW', 'title' => 'Malawi'],
            ['id' => 136, 'shortcode' => 'MY', 'title' => 'Malaysia'],
            ['id' => 137, 'shortcode' => 'MV', 'title' => 'Maldives'],
            ['id' => 138, 'shortcode' => 'ML', 'title' => 'Mali'],
            ['id' => 139, 'shortcode' => 'MT', 'title' => 'Malta'],
            ['id' => 140, 'shortcode' => 'MH', 'title' => 'Marshall Islands'],
            ['id' => 141, 'shortcode' => 'MQ', 'title' => 'Martinique'],
            ['id' => 142, 'shortcode' => 'MR', 'title' => 'Mauritania'],
            ['id' => 143, 'shortcode' => 'MU', 'title' => 'Mauritius'],
            ['id' => 144, 'shortcode' => 'YT', 'title' => 'Mayotte'],
            ['id' => 145, 'shortcode' => 'FX', 'title' => 'Metropolitan France'],
            ['id' => 146, 'shortcode' => 'MX', 'title' => 'Mexico'],
            ['id' => 147, 'shortcode' => 'FM', 'title' => 'Micronesia'],
            ['id' => 148, 'shortcode' => 'MI', 'title' => 'Midway Islands'],
            ['id' => 149, 'shortcode' => 'MD', 'title' => 'Moldova'],
            ['id' => 150, 'shortcode' => 'MC', 'title' => 'Monaco'],
            ['id' => 151, 'shortcode' => 'MN', 'title' => 'Mongolia'],
            ['id' => 152, 'shortcode' => 'ME', 'title' => 'Montenegro'],
            ['id' => 153, 'shortcode' => 'MS', 'title' => 'Montserrat'],
            ['id' => 154, 'shortcode' => 'MA', 'title' => 'Morocco'],
            ['id' => 155, 'shortcode' => 'MZ', 'title' => 'Mozambique'],
            ['id' => 156, 'shortcode' => 'MM', 'title' => 'Myanmar [Burma]'],
            ['id' => 157, 'shortcode' => 'NA', 'title' => 'Namibia'],
            ['id' => 158, 'shortcode' => 'NR', 'title' => 'Nauru'],
            ['id' => 159, 'shortcode' => 'NP', 'title' => 'Nepal'],
            ['id' => 160, 'shortcode' => 'NL', 'title' => 'Netherlands'],
            ['id' => 161, 'shortcode' => 'AN', 'title' => 'Netherlands Antilles'],
            ['id' => 162, 'shortcode' => 'NT', 'title' => 'Neutral Zone'],
            ['id' => 163, 'shortcode' => 'NC', 'title' => 'New Caledonia'],
            ['id' => 164, 'shortcode' => 'NZ', 'title' => 'New Zealand'],
            ['id' => 165, 'shortcode' => 'NI', 'title' => 'Nicaragua'],
            ['id' => 166, 'shortcode' => 'NE', 'title' => 'Niger'],
            ['id' => 167, 'shortcode' => 'NG', 'title' => 'Nigeria'],
            ['id' => 168, 'shortcode' => 'NU', 'title' => 'Niue'],
            ['id' => 169, 'shortcode' => 'NF', 'title' => 'Norfolk Island'],
            ['id' => 170, 'shortcode' => 'KP', 'title' => 'North Korea'],
            ['id' => 171, 'shortcode' => 'VD', 'title' => 'North Vietnam'],
            ['id' => 172, 'shortcode' => 'MP', 'title' => 'Northern Mariana Islands'],
            ['id' => 173, 'shortcode' => 'NO', 'title' => 'Norway'],
            ['id' => 174, 'shortcode' => 'OM', 'title' => 'Oman'],
            ['id' => 175, 'shortcode' => 'PC', 'title' => 'Pacific Islands Trust Territory'],
            ['id' => 176, 'shortcode' => 'PK', 'title' => 'Pakistan'],
            ['id' => 177, 'shortcode' => 'PW', 'title' => 'Palau'],
            ['id' => 178, 'shortcode' => 'PS', 'title' => 'Palestinian Territories'],
            ['id' => 179, 'shortcode' => 'PA', 'title' => 'Panama'],
            ['id' => 180, 'shortcode' => 'PZ', 'title' => 'Panama Canal Zone'],
            ['id' => 181, 'shortcode' => 'PG', 'title' => 'Papua New Guinea'],
            ['id' => 182, 'shortcode' => 'PY', 'title' => 'Paraguay'],
            ['id' => 183, 'shortcode' => 'YD', 'title' => 'People\'s Democratic Republic of Yemen'],
            ['id' => 184, 'shortcode' => 'PE', 'title' => 'Peru'],
            ['id' => 185, 'shortcode' => 'PH', 'title' => 'Philippines'],
            ['id' => 186, 'shortcode' => 'PN', 'title' => 'Pitcairn Islands'],
            ['id' => 187, 'shortcode' => 'PL', 'title' => 'Poland'],
            ['id' => 188, 'shortcode' => 'PT', 'title' => 'Portugal'],
            ['id' => 189, 'shortcode' => 'PR', 'title' => 'Puerto Rico'],
            ['id' => 190, 'shortcode' => 'QA', 'title' => 'Qatar'],
            ['id' => 191, 'shortcode' => 'RO', 'title' => 'Romania'],
            ['id' => 192, 'shortcode' => 'RU', 'title' => 'Russia'],
            ['id' => 193, 'shortcode' => 'RW', 'title' => 'Rwanda'],
            ['id' => 194, 'shortcode' => 'RE', 'title' => 'Réunion'],
            ['id' => 195, 'shortcode' => 'BL', 'title' => 'Saint Barthélemy'],
            ['id' => 196, 'shortcode' => 'SH', 'title' => 'Saint Helena'],
            ['id' => 197, 'shortcode' => 'KN', 'title' => 'Saint Kitts and Nevis'],
            ['id' => 198, 'shortcode' => 'LC', 'title' => 'Saint Lucia'],
            ['id' => 199, 'shortcode' => 'MF', 'title' => 'Saint Martin'],
            ['id' => 200, 'shortcode' => 'PM', 'title' => 'Saint Pierre and Miquelon'],
            ['id' => 201, 'shortcode' => 'VC', 'title' => 'Saint Vincent and the Grenadines'],
            ['id' => 202, 'shortcode' => 'WS', 'title' => 'Samoa'],
            ['id' => 203, 'shortcode' => 'SM', 'title' => 'San Marino'],
            ['id' => 204, 'shortcode' => 'SA', 'title' => 'Saudi Arabia'],
            ['id' => 205, 'shortcode' => 'SN', 'title' => 'Senegal'],
            ['id' => 206, 'shortcode' => 'RS', 'title' => 'Serbia'],
            ['id' => 207, 'shortcode' => 'CS', 'title' => 'Serbia and Montenegro'],
            ['id' => 208, 'shortcode' => 'SC', 'title' => 'Seychelles'],
            ['id' => 209, 'shortcode' => 'SL', 'title' => 'Sierra Leone'],
            ['id' => 210, 'shortcode' => 'SG', 'title' => 'Singapore'],
            ['id' => 211, 'shortcode' => 'SK', 'title' => 'Slovakia'],
            ['id' => 212, 'shortcode' => 'SI', 'title' => 'Slovenia'],
            ['id' => 213, 'shortcode' => 'SB', 'title' => 'Solomon Islands'],
            ['id' => 214, 'shortcode' => 'SO', 'title' => 'Somalia'],
            ['id' => 215, 'shortcode' => 'ZA', 'title' => 'South Africa'],
            ['id' => 216, 'shortcode' => 'GS', 'title' => 'South Georgia and the South Sandwich Islands'],
            ['id' => 217, 'shortcode' => 'KR', 'title' => 'South Korea'],
            ['id' => 218, 'shortcode' => 'ES', 'title' => 'Spain'],
            ['id' => 219, 'shortcode' => 'LK', 'title' => 'Sri Lanka'],
            ['id' => 220, 'shortcode' => 'SD', 'title' => 'Sudan'],
            ['id' => 221, 'shortcode' => 'SR', 'title' => 'Suriname'],
            ['id' => 222, 'shortcode' => 'SJ', 'title' => 'Svalbard and Jan Mayen'],
            ['id' => 223, 'shortcode' => 'SZ', 'title' => 'Swaziland'],
            ['id' => 224, 'shortcode' => 'SE', 'title' => 'Sweden'],
            ['id' => 225, 'shortcode' => 'CH', 'title' => 'Switzerland'],
            ['id' => 226, 'shortcode' => 'SY', 'title' => 'Syria'],
            ['id' => 227, 'shortcode' => 'ST', 'title' => 'São Tomé and Príncipe'],
            ['id' => 228, 'shortcode' => 'TW', 'title' => 'Taiwan'],
            ['id' => 229, 'shortcode' => 'TJ', 'title' => 'Tajikistan'],
            ['id' => 230, 'shortcode' => 'TZ', 'title' => 'Tanzania'],
            ['id' => 231, 'shortcode' => 'TH', 'title' => 'Thailand'],
            ['id' => 232, 'shortcode' => 'TL', 'title' => 'Timor-Leste'],
            ['id' => 233, 'shortcode' => 'TG', 'title' => 'Togo'],
            ['id' => 234, 'shortcode' => 'TK', 'title' => 'Tokelau'],
            ['id' => 235, 'shortcode' => 'TO', 'title' => 'Tonga'],
            ['id' => 236, 'shortcode' => 'TT', 'title' => 'Trinidad and Tobago'],
            ['id' => 237, 'shortcode' => 'TN', 'title' => 'Tunisia'],
            ['id' => 238, 'shortcode' => 'TR', 'title' => 'Turkey'],
            ['id' => 239, 'shortcode' => 'TM', 'title' => 'Turkmenistan'],
            ['id' => 240, 'shortcode' => 'TC', 'title' => 'Turks and Caicos Islands'],
            ['id' => 241, 'shortcode' => 'TV', 'title' => 'Tuvalu'],
            ['id' => 242, 'shortcode' => 'UM', 'title' => 'U.S. Minor Outlying Islands'],
            ['id' => 243, 'shortcode' => 'PU', 'title' => 'U.S. Miscellaneous Pacific Islands'],
            ['id' => 244, 'shortcode' => 'VI', 'title' => 'U.S. Virgin Islands'],
            ['id' => 245, 'shortcode' => 'UG', 'title' => 'Uganda'],
            ['id' => 246, 'shortcode' => 'UA', 'title' => 'Ukraine'],
            ['id' => 247, 'shortcode' => 'SU', 'title' => 'Union of Soviet Socialist Republics'],
            ['id' => 248, 'shortcode' => 'AE', 'title' => 'United Arab Emirates'],
            ['id' => 249, 'shortcode' => 'GB', 'title' => 'United Kingdom'],
            ['id' => 250, 'shortcode' => 'US', 'title' => 'United States'],
            ['id' => 251, 'shortcode' => 'ZZ', 'title' => 'Unknown or Invalid Region'],
            ['id' => 252, 'shortcode' => 'UY', 'title' => 'Uruguay'],
            ['id' => 253, 'shortcode' => 'UZ', 'title' => 'Uzbekistan'],
            ['id' => 254, 'shortcode' => 'VU', 'title' => 'Vanuatu'],
            ['id' => 255, 'shortcode' => 'VA', 'title' => 'Vatican City'],
            ['id' => 256, 'shortcode' => 'VE', 'title' => 'Venezuela'],
            ['id' => 257, 'shortcode' => 'VN', 'title' => 'Vietnam'],
            ['id' => 258, 'shortcode' => 'WK', 'title' => 'Wake Island'],
            ['id' => 259, 'shortcode' => 'WF', 'title' => 'Wallis and Futuna'],
            ['id' => 260, 'shortcode' => 'EH', 'title' => 'Western Sahara'],
            ['id' => 261, 'shortcode' => 'YE', 'title' => 'Yemen'],
            ['id' => 262, 'shortcode' => 'ZM', 'title' => 'Zambia'],
            ['id' => 263, 'shortcode' => 'ZW', 'title' => 'Zimbabwe'],
            ['id' => 264, 'shortcode' => 'AX', 'title' => 'Åland Islands'],

        ];

        foreach ($items as $item) {
            \App\Country::create($item);
        }
    }
}
