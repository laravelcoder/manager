<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

use Illuminate\Database\Seeder;

class TimezoneSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $items = [

                ['id' => 1, 'timezone' => 'Africa/Abidjan'],
                ['id' => 2, 'timezone' => 'Africa/Accra'],
                ['id' => 3, 'timezone' => 'Africa/Addis_Ababa'],
                ['id' => 4, 'timezone' => 'Africa/Algiers'],
                ['id' => 5, 'timezone' => 'Africa/Asmara'],
                ['id' => 6, 'timezone' => 'Africa/Bamako'],
                ['id' => 7, 'timezone' => 'Africa/Bangui'],
                ['id' => 8, 'timezone' => 'Africa/Banjul'],
                ['id' => 9, 'timezone' => 'Africa/Bissau'],
                ['id' => 10, 'timezone' => 'Africa/Blantyre'],
                ['id' => 11, 'timezone' => 'Africa/Brazzaville'],
                ['id' => 12, 'timezone' => 'Africa/Bujumbura'],
                ['id' => 13, 'timezone' => 'Africa/Cairo'],
                ['id' => 14, 'timezone' => 'Africa/Casablanca'],
                ['id' => 15, 'timezone' => 'Africa/Ceuta'],
                ['id' => 16, 'timezone' => 'Africa/Conakry'],
                ['id' => 17, 'timezone' => 'Africa/Dakar'],
                ['id' => 18, 'timezone' => 'Africa/Dar_es_Salaam'],
                ['id' => 19, 'timezone' => 'Africa/Djibouti'],
                ['id' => 20, 'timezone' => 'Africa/Douala'],
                ['id' => 21, 'timezone' => 'Africa/El_Aaiun'],
                ['id' => 22, 'timezone' => 'Africa/Freetown'],
                ['id' => 23, 'timezone' => 'Africa/Gaborone'],
                ['id' => 24, 'timezone' => 'Africa/Harare'],
                ['id' => 25, 'timezone' => 'Africa/Johannesburg'],
                ['id' => 26, 'timezone' => 'Africa/Juba'],
                ['id' => 27, 'timezone' => 'Africa/Kampala'],
                ['id' => 28, 'timezone' => 'Africa/Khartoum'],
                ['id' => 29, 'timezone' => 'Africa/Kigali'],
                ['id' => 30, 'timezone' => 'Africa/Kinshasa'],
                ['id' => 31, 'timezone' => 'Africa/Lagos'],
                ['id' => 32, 'timezone' => 'Africa/Libreville'],
                ['id' => 33, 'timezone' => 'Africa/Lome'],
                ['id' => 34, 'timezone' => 'Africa/Luanda'],
                ['id' => 35, 'timezone' => 'Africa/Lubumbashi'],
                ['id' => 36, 'timezone' => 'Africa/Lusaka'],
                ['id' => 37, 'timezone' => 'Africa/Malabo'],
                ['id' => 38, 'timezone' => 'Africa/Maputo'],
                ['id' => 39, 'timezone' => 'Africa/Maseru'],
                ['id' => 40, 'timezone' => 'Africa/Mbabane'],
                ['id' => 41, 'timezone' => 'Africa/Mogadishu'],
                ['id' => 42, 'timezone' => 'Africa/Monrovia'],
                ['id' => 43, 'timezone' => 'Africa/Nairobi'],
                ['id' => 44, 'timezone' => 'Africa/Ndjamena'],
                ['id' => 45, 'timezone' => 'Africa/Niamey'],
                ['id' => 46, 'timezone' => 'Africa/Nouakchott'],
                ['id' => 47, 'timezone' => 'Africa/Ouagadougou'],
                ['id' => 48, 'timezone' => 'Africa/Porto-Novo'],
                ['id' => 49, 'timezone' => 'Africa/Sao_Tome'],
                ['id' => 50, 'timezone' => 'Africa/Tripoli'],
                ['id' => 51, 'timezone' => 'Africa/Tunis'],
                ['id' => 52, 'timezone' => 'Africa/Windhoek'],
                ['id' => 53, 'timezone' => 'America/Adak'],
                ['id' => 54, 'timezone' => 'America/Anchorage'],
                ['id' => 55, 'timezone' => 'America/Anguilla'],
                ['id' => 56, 'timezone' => 'America/Antigua'],
                ['id' => 57, 'timezone' => 'America/Araguaina'],
                ['id' => 58, 'timezone' => 'America/Argentina/Buenos_Aires'],
                ['id' => 59, 'timezone' => 'America/Argentina/Catamarca'],
                ['id' => 60, 'timezone' => 'America/Argentina/Cordoba'],
                ['id' => 61, 'timezone' => 'America/Argentina/Jujuy'],
                ['id' => 62, 'timezone' => 'America/Argentina/La_Rioja'],
                ['id' => 63, 'timezone' => 'America/Argentina/Mendoza'],
                ['id' => 64, 'timezone' => 'America/Argentina/Rio_Gallegos'],
                ['id' => 65, 'timezone' => 'America/Argentina/Salta'],
                ['id' => 66, 'timezone' => 'America/Argentina/San_Juan'],
                ['id' => 67, 'timezone' => 'America/Argentina/San_Luis'],
                ['id' => 68, 'timezone' => 'America/Argentina/Tucuman'],
                ['id' => 69, 'timezone' => 'America/Argentina/Ushuaia'],
                ['id' => 70, 'timezone' => 'America/Aruba'],
                ['id' => 71, 'timezone' => 'America/Asuncion'],
                ['id' => 72, 'timezone' => 'America/Atikokan'],
                ['id' => 73, 'timezone' => 'America/Bahia'],
                ['id' => 74, 'timezone' => 'America/Bahia_Banderas'],
                ['id' => 75, 'timezone' => 'America/Barbados'],
                ['id' => 76, 'timezone' => 'America/Belem'],
                ['id' => 77, 'timezone' => 'America/Belize'],
                ['id' => 78, 'timezone' => 'America/Blanc-Sablon'],
                ['id' => 79, 'timezone' => 'America/Boa_Vista'],
                ['id' => 80, 'timezone' => 'America/Bogota'],
                ['id' => 81, 'timezone' => 'America/Boise'],
                ['id' => 82, 'timezone' => 'America/Cambridge_Bay'],
                ['id' => 83, 'timezone' => 'America/Campo_Grande'],
                ['id' => 84, 'timezone' => 'America/Cancun'],
                ['id' => 85, 'timezone' => 'America/Caracas'],
                ['id' => 86, 'timezone' => 'America/Cayenne'],
                ['id' => 87, 'timezone' => 'America/Cayman'],
                ['id' => 88, 'timezone' => 'America/Chicago'],
                ['id' => 89, 'timezone' => 'America/Chihuahua'],
                ['id' => 90, 'timezone' => 'America/Costa_Rica'],
                ['id' => 91, 'timezone' => 'America/Creston'],
                ['id' => 92, 'timezone' => 'America/Cuiaba'],
                ['id' => 93, 'timezone' => 'America/Curacao'],
                ['id' => 94, 'timezone' => 'America/Danmarkshavn'],
                ['id' => 95, 'timezone' => 'America/Dawson'],
                ['id' => 96, 'timezone' => 'America/Dawson_Creek'],
                ['id' => 97, 'timezone' => 'America/Denver'],
                ['id' => 98, 'timezone' => 'America/Detroit'],
                ['id' => 99, 'timezone' => 'America/Dominica'],
                ['id' => 100, 'timezone' => 'America/Edmonton'],
                ['id' => 101, 'timezone' => 'America/Eirunepe'],
                ['id' => 102, 'timezone' => 'America/El_Salvador'],
                ['id' => 103, 'timezone' => 'America/Fort_Nelson'],
                ['id' => 104, 'timezone' => 'America/Fortaleza'],
                ['id' => 105, 'timezone' => 'America/Glace_Bay'],
                ['id' => 106, 'timezone' => 'America/Godthab'],
                ['id' => 107, 'timezone' => 'America/Goose_Bay'],
                ['id' => 108, 'timezone' => 'America/Grand_Turk'],
                ['id' => 109, 'timezone' => 'America/Grenada'],
                ['id' => 110, 'timezone' => 'America/Guadeloupe'],
                ['id' => 111, 'timezone' => 'America/Guatemala'],
                ['id' => 112, 'timezone' => 'America/Guayaquil'],
                ['id' => 113, 'timezone' => 'America/Guyana'],
                ['id' => 114, 'timezone' => 'America/Halifax'],
                ['id' => 115, 'timezone' => 'America/Havana'],
                ['id' => 116, 'timezone' => 'America/Hermosillo'],
                ['id' => 117, 'timezone' => 'America/Indiana/Indianapolis'],
                ['id' => 118, 'timezone' => 'America/Indiana/Knox'],
                ['id' => 119, 'timezone' => 'America/Indiana/Marengo'],
                ['id' => 120, 'timezone' => 'America/Indiana/Petersburg'],
                ['id' => 121, 'timezone' => 'America/Indiana/Tell_City'],
                ['id' => 122, 'timezone' => 'America/Indiana/Vevay'],
                ['id' => 123, 'timezone' => 'America/Indiana/Vincennes'],
                ['id' => 124, 'timezone' => 'America/Indiana/Winamac'],
                ['id' => 125, 'timezone' => 'America/Inuvik'],
                ['id' => 126, 'timezone' => 'America/Iqaluit'],
                ['id' => 127, 'timezone' => 'America/Jamaica'],
                ['id' => 128, 'timezone' => 'America/Juneau'],
                ['id' => 129, 'timezone' => 'America/Kentucky/Louisville'],
                ['id' => 130, 'timezone' => 'America/Kentucky/Monticello'],
                ['id' => 131, 'timezone' => 'America/Kralendijk'],
                ['id' => 132, 'timezone' => 'America/La_Paz'],
                ['id' => 133, 'timezone' => 'America/Lima'],
                ['id' => 134, 'timezone' => 'America/Los_Angeles'],
                ['id' => 135, 'timezone' => 'America/Lower_Princes'],
                ['id' => 136, 'timezone' => 'America/Maceio'],
                ['id' => 137, 'timezone' => 'America/Managua'],
                ['id' => 138, 'timezone' => 'America/Manaus'],
                ['id' => 139, 'timezone' => 'America/Marigot'],
                ['id' => 140, 'timezone' => 'America/Martinique'],
                ['id' => 141, 'timezone' => 'America/Matamoros'],
                ['id' => 142, 'timezone' => 'America/Mazatlan'],
                ['id' => 143, 'timezone' => 'America/Menominee'],
                ['id' => 144, 'timezone' => 'America/Merida'],
                ['id' => 145, 'timezone' => 'America/Metlakatla'],
                ['id' => 146, 'timezone' => 'America/Mexico_City'],
                ['id' => 147, 'timezone' => 'America/Miquelon'],
                ['id' => 148, 'timezone' => 'America/Moncton'],
                ['id' => 149, 'timezone' => 'America/Monterrey'],
                ['id' => 150, 'timezone' => 'America/Montevideo'],
                ['id' => 151, 'timezone' => 'America/Montserrat'],
                ['id' => 152, 'timezone' => 'America/Nassau'],
                ['id' => 153, 'timezone' => 'America/New_York'],
                ['id' => 154, 'timezone' => 'America/Nipigon'],
                ['id' => 155, 'timezone' => 'America/Nome'],
                ['id' => 156, 'timezone' => 'America/Noronha'],
                ['id' => 157, 'timezone' => 'America/North_Dakota/Beulah'],
                ['id' => 158, 'timezone' => 'America/North_Dakota/Center'],
                ['id' => 159, 'timezone' => 'America/North_Dakota/New_Salem'],
                ['id' => 160, 'timezone' => 'America/Ojinaga'],
                ['id' => 161, 'timezone' => 'America/Panama'],
                ['id' => 162, 'timezone' => 'America/Pangnirtung'],
                ['id' => 163, 'timezone' => 'America/Paramaribo'],
                ['id' => 164, 'timezone' => 'America/Phoenix'],
                ['id' => 165, 'timezone' => 'America/Port-au-Prince'],
                ['id' => 166, 'timezone' => 'America/Port_of_Spain'],
                ['id' => 167, 'timezone' => 'America/Porto_Velho'],
                ['id' => 168, 'timezone' => 'America/Puerto_Rico'],
                ['id' => 169, 'timezone' => 'America/Punta_Arenas'],
                ['id' => 170, 'timezone' => 'America/Rainy_River'],
                ['id' => 171, 'timezone' => 'America/Rankin_Inlet'],
                ['id' => 172, 'timezone' => 'America/Recife'],
                ['id' => 173, 'timezone' => 'America/Regina'],
                ['id' => 174, 'timezone' => 'America/Resolute'],
                ['id' => 175, 'timezone' => 'America/Rio_Branco'],
                ['id' => 176, 'timezone' => 'America/Santarem'],
                ['id' => 177, 'timezone' => 'America/Santiago'],
                ['id' => 178, 'timezone' => 'America/Santo_Domingo'],
                ['id' => 179, 'timezone' => 'America/Sao_Paulo'],
                ['id' => 180, 'timezone' => 'America/Scoresbysund'],
                ['id' => 181, 'timezone' => 'America/Sitka'],
                ['id' => 182, 'timezone' => 'America/St_Barthelemy'],
                ['id' => 183, 'timezone' => 'America/St_Johns'],
                ['id' => 184, 'timezone' => 'America/St_Kitts'],
                ['id' => 185, 'timezone' => 'America/St_Lucia'],
                ['id' => 186, 'timezone' => 'America/St_Thomas'],
                ['id' => 187, 'timezone' => 'America/St_Vincent'],
                ['id' => 188, 'timezone' => 'America/Swift_Current'],
                ['id' => 189, 'timezone' => 'America/Tegucigalpa'],
                ['id' => 190, 'timezone' => 'America/Thule'],
                ['id' => 191, 'timezone' => 'America/Thunder_Bay'],
                ['id' => 192, 'timezone' => 'America/Tijuana'],
                ['id' => 193, 'timezone' => 'America/Toronto'],
                ['id' => 194, 'timezone' => 'America/Tortola'],
                ['id' => 195, 'timezone' => 'America/Vancouver'],
                ['id' => 196, 'timezone' => 'America/Whitehorse'],
                ['id' => 197, 'timezone' => 'America/Winnipeg'],
                ['id' => 198, 'timezone' => 'America/Yakutat'],
                ['id' => 199, 'timezone' => 'America/Yellowknife'],
                ['id' => 200, 'timezone' => 'Antarctica/Casey'],
                ['id' => 201, 'timezone' => 'Antarctica/Davis'],
                ['id' => 202, 'timezone' => 'Antarctica/DumontDUrville'],
                ['id' => 203, 'timezone' => 'Antarctica/Macquarie'],
                ['id' => 204, 'timezone' => 'Antarctica/Mawson'],
                ['id' => 205, 'timezone' => 'Antarctica/McMurdo'],
                ['id' => 206, 'timezone' => 'Antarctica/Palmer'],
                ['id' => 207, 'timezone' => 'Antarctica/Rothera'],
                ['id' => 208, 'timezone' => 'Antarctica/Syowa'],
                ['id' => 209, 'timezone' => 'Antarctica/Troll'],
                ['id' => 210, 'timezone' => 'Antarctica/Vostok'],
                ['id' => 211, 'timezone' => 'Arctic/Longyearbyen'],
                ['id' => 212, 'timezone' => 'Asia/Aden'],
                ['id' => 213, 'timezone' => 'Asia/Almaty'],
                ['id' => 214, 'timezone' => 'Asia/Amman'],
                ['id' => 215, 'timezone' => 'Asia/Anadyr'],
                ['id' => 216, 'timezone' => 'Asia/Aqtau'],
                ['id' => 217, 'timezone' => 'Asia/Aqtobe'],
                ['id' => 218, 'timezone' => 'Asia/Ashgabat'],
                ['id' => 219, 'timezone' => 'Asia/Atyrau'],
                ['id' => 220, 'timezone' => 'Asia/Baghdad'],
                ['id' => 221, 'timezone' => 'Asia/Bahrain'],
                ['id' => 222, 'timezone' => 'Asia/Baku'],
                ['id' => 223, 'timezone' => 'Asia/Bangkok'],
                ['id' => 224, 'timezone' => 'Asia/Barnaul'],
                ['id' => 225, 'timezone' => 'Asia/Beirut'],
                ['id' => 226, 'timezone' => 'Asia/Bishkek'],
                ['id' => 227, 'timezone' => 'Asia/Brunei'],
                ['id' => 228, 'timezone' => 'Asia/Chita'],
                ['id' => 229, 'timezone' => 'Asia/Choibalsan'],
                ['id' => 230, 'timezone' => 'Asia/Colombo'],
                ['id' => 231, 'timezone' => 'Asia/Damascus'],
                ['id' => 232, 'timezone' => 'Asia/Dhaka'],
                ['id' => 233, 'timezone' => 'Asia/Dili'],
                ['id' => 234, 'timezone' => 'Asia/Dubai'],
                ['id' => 235, 'timezone' => 'Asia/Dushanbe'],
                ['id' => 236, 'timezone' => 'Asia/Famagusta'],
                ['id' => 237, 'timezone' => 'Asia/Gaza'],
                ['id' => 238, 'timezone' => 'Asia/Hebron'],
                ['id' => 239, 'timezone' => 'Asia/Ho_Chi_Minh'],
                ['id' => 240, 'timezone' => 'Asia/Hong_Kong'],
                ['id' => 241, 'timezone' => 'Asia/Hovd'],
                ['id' => 242, 'timezone' => 'Asia/Irkutsk'],
                ['id' => 243, 'timezone' => 'Asia/Jakarta'],
                ['id' => 244, 'timezone' => 'Asia/Jayapura'],
                ['id' => 245, 'timezone' => 'Asia/Jerusalem'],
                ['id' => 246, 'timezone' => 'Asia/Kabul'],
                ['id' => 247, 'timezone' => 'Asia/Kamchatka'],
                ['id' => 248, 'timezone' => 'Asia/Karachi'],
                ['id' => 249, 'timezone' => 'Asia/Kathmandu'],
                ['id' => 250, 'timezone' => 'Asia/Khandyga'],
                ['id' => 251, 'timezone' => 'Asia/Kolkata'],
                ['id' => 252, 'timezone' => 'Asia/Krasnoyarsk'],
                ['id' => 253, 'timezone' => 'Asia/Kuala_Lumpur'],
                ['id' => 254, 'timezone' => 'Asia/Kuching'],
                ['id' => 255, 'timezone' => 'Asia/Kuwait'],
                ['id' => 256, 'timezone' => 'Asia/Macau'],
                ['id' => 257, 'timezone' => 'Asia/Magadan'],
                ['id' => 258, 'timezone' => 'Asia/Makassar'],
                ['id' => 259, 'timezone' => 'Asia/Manila'],
                ['id' => 260, 'timezone' => 'Asia/Muscat'],
                ['id' => 261, 'timezone' => 'Asia/Nicosia'],
                ['id' => 262, 'timezone' => 'Asia/Novokuznetsk'],
                ['id' => 263, 'timezone' => 'Asia/Novosibirsk'],
                ['id' => 264, 'timezone' => 'Asia/Omsk'],
                ['id' => 265, 'timezone' => 'Asia/Oral'],
                ['id' => 266, 'timezone' => 'Asia/Phnom_Penh'],
                ['id' => 267, 'timezone' => 'Asia/Pontianak'],
                ['id' => 268, 'timezone' => 'Asia/Pyongyang'],
                ['id' => 269, 'timezone' => 'Asia/Qatar'],
                ['id' => 270, 'timezone' => 'Asia/Qyzylorda'],
                ['id' => 271, 'timezone' => 'Asia/Riyadh'],
                ['id' => 272, 'timezone' => 'Asia/Sakhalin'],
                ['id' => 273, 'timezone' => 'Asia/Samarkand'],
                ['id' => 274, 'timezone' => 'Asia/Seoul'],
                ['id' => 275, 'timezone' => 'Asia/Shanghai'],
                ['id' => 276, 'timezone' => 'Asia/Singapore'],
                ['id' => 277, 'timezone' => 'Asia/Srednekolymsk'],
                ['id' => 278, 'timezone' => 'Asia/Taipei'],
                ['id' => 279, 'timezone' => 'Asia/Tashkent'],
                ['id' => 280, 'timezone' => 'Asia/Tbilisi'],
                ['id' => 281, 'timezone' => 'Asia/Tehran'],
                ['id' => 282, 'timezone' => 'Asia/Thimphu'],
                ['id' => 283, 'timezone' => 'Asia/Tokyo'],
                ['id' => 284, 'timezone' => 'Asia/Tomsk'],
                ['id' => 285, 'timezone' => 'Asia/Ulaanbaatar'],
                ['id' => 286, 'timezone' => 'Asia/Urumqi'],
                ['id' => 287, 'timezone' => 'Asia/Ust-Nera'],
                ['id' => 288, 'timezone' => 'Asia/Vientiane'],
                ['id' => 289, 'timezone' => 'Asia/Vladivostok'],
                ['id' => 290, 'timezone' => 'Asia/Yakutsk'],
                ['id' => 291, 'timezone' => 'Asia/Yangon'],
                ['id' => 292, 'timezone' => 'Asia/Yekaterinburg'],
                ['id' => 293, 'timezone' => 'Asia/Yerevan'],
                ['id' => 294, 'timezone' => 'Atlantic/Azores'],
                ['id' => 295, 'timezone' => 'Atlantic/Bermuda'],
                ['id' => 296, 'timezone' => 'Atlantic/Canary'],
                ['id' => 297, 'timezone' => 'Atlantic/Cape_Verde'],
                ['id' => 298, 'timezone' => 'Atlantic/Faroe'],
                ['id' => 299, 'timezone' => 'Atlantic/Madeira'],
                ['id' => 300, 'timezone' => 'Atlantic/Reykjavik'],
                ['id' => 301, 'timezone' => 'Atlantic/South_Georgia'],
                ['id' => 302, 'timezone' => 'Atlantic/St_Helena'],
                ['id' => 303, 'timezone' => 'Atlantic/Stanley'],
                ['id' => 304, 'timezone' => 'Australia/Adelaide'],
                ['id' => 305, 'timezone' => 'Australia/Brisbane'],
                ['id' => 306, 'timezone' => 'Australia/Broken_Hill'],
                ['id' => 307, 'timezone' => 'Australia/Currie'],
                ['id' => 308, 'timezone' => 'Australia/Darwin'],
                ['id' => 309, 'timezone' => 'Australia/Eucla'],
                ['id' => 310, 'timezone' => 'Australia/Hobart'],
                ['id' => 311, 'timezone' => 'Australia/Lindeman'],
                ['id' => 312, 'timezone' => 'Australia/Lord_Howe'],
                ['id' => 313, 'timezone' => 'Australia/Melbourne'],
                ['id' => 314, 'timezone' => 'Australia/Perth'],
                ['id' => 315, 'timezone' => 'Australia/Sydney'],
                ['id' => 316, 'timezone' => 'Europe/Amsterdam'],
                ['id' => 317, 'timezone' => 'Europe/Andorra'],
                ['id' => 318, 'timezone' => 'Europe/Astrakhan'],
                ['id' => 319, 'timezone' => 'Europe/Athens'],
                ['id' => 320, 'timezone' => 'Europe/Belgrade'],
                ['id' => 321, 'timezone' => 'Europe/Berlin'],
                ['id' => 322, 'timezone' => 'Europe/Bratislava'],
                ['id' => 323, 'timezone' => 'Europe/Brussels'],
                ['id' => 324, 'timezone' => 'Europe/Bucharest'],
                ['id' => 325, 'timezone' => 'Europe/Budapest'],
                ['id' => 326, 'timezone' => 'Europe/Busingen'],
                ['id' => 327, 'timezone' => 'Europe/Chisinau'],
                ['id' => 328, 'timezone' => 'Europe/Copenhagen'],
                ['id' => 329, 'timezone' => 'Europe/Dublin'],
                ['id' => 330, 'timezone' => 'Europe/Gibraltar'],
                ['id' => 331, 'timezone' => 'Europe/Guernsey'],
                ['id' => 332, 'timezone' => 'Europe/Helsinki'],
                ['id' => 333, 'timezone' => 'Europe/Isle_of_Man'],
                ['id' => 334, 'timezone' => 'Europe/Istanbul'],
                ['id' => 335, 'timezone' => 'Europe/Jersey'],
                ['id' => 336, 'timezone' => 'Europe/Kaliningrad'],
                ['id' => 337, 'timezone' => 'Europe/Kiev'],
                ['id' => 338, 'timezone' => 'Europe/Kirov'],
                ['id' => 339, 'timezone' => 'Europe/Lisbon'],
                ['id' => 340, 'timezone' => 'Europe/Ljubljana'],
                ['id' => 341, 'timezone' => 'Europe/London'],
                ['id' => 342, 'timezone' => 'Europe/Luxembourg'],
                ['id' => 343, 'timezone' => 'Europe/Madrid'],
                ['id' => 344, 'timezone' => 'Europe/Malta'],
                ['id' => 345, 'timezone' => 'Europe/Mariehamn'],
                ['id' => 346, 'timezone' => 'Europe/Minsk'],
                ['id' => 347, 'timezone' => 'Europe/Monaco'],
                ['id' => 348, 'timezone' => 'Europe/Moscow'],
                ['id' => 349, 'timezone' => 'Europe/Oslo'],
                ['id' => 350, 'timezone' => 'Europe/Paris'],
                ['id' => 351, 'timezone' => 'Europe/Podgorica'],
                ['id' => 352, 'timezone' => 'Europe/Prague'],
                ['id' => 353, 'timezone' => 'Europe/Riga'],
                ['id' => 354, 'timezone' => 'Europe/Rome'],
                ['id' => 355, 'timezone' => 'Europe/Samara'],
                ['id' => 356, 'timezone' => 'Europe/San_Marino'],
                ['id' => 357, 'timezone' => 'Europe/Sarajevo'],
                ['id' => 358, 'timezone' => 'Europe/Saratov'],
                ['id' => 359, 'timezone' => 'Europe/Simferopol'],
                ['id' => 360, 'timezone' => 'Europe/Skopje'],
                ['id' => 361, 'timezone' => 'Europe/Sofia'],
                ['id' => 362, 'timezone' => 'Europe/Stockholm'],
                ['id' => 363, 'timezone' => 'Europe/Tallinn'],
                ['id' => 364, 'timezone' => 'Europe/Tirane'],
                ['id' => 365, 'timezone' => 'Europe/Ulyanovsk'],
                ['id' => 366, 'timezone' => 'Europe/Uzhgorod'],
                ['id' => 367, 'timezone' => 'Europe/Vaduz'],
                ['id' => 368, 'timezone' => 'Europe/Vatican'],
                ['id' => 369, 'timezone' => 'Europe/Vienna'],
                ['id' => 370, 'timezone' => 'Europe/Vilnius'],
                ['id' => 371, 'timezone' => 'Europe/Volgograd'],
                ['id' => 372, 'timezone' => 'Europe/Warsaw'],
                ['id' => 373, 'timezone' => 'Europe/Zagreb'],
                ['id' => 374, 'timezone' => 'Europe/Zaporozhye'],
                ['id' => 375, 'timezone' => 'Europe/Zurich'],
                ['id' => 376, 'timezone' => 'Indian/Antananarivo'],
                ['id' => 377, 'timezone' => 'Indian/Chagos'],
                ['id' => 378, 'timezone' => 'Indian/Christmas'],
                ['id' => 379, 'timezone' => 'Indian/Cocos'],
                ['id' => 380, 'timezone' => 'Indian/Comoro'],
                ['id' => 381, 'timezone' => 'Indian/Kerguelen'],
                ['id' => 382, 'timezone' => 'Indian/Mahe'],
                ['id' => 383, 'timezone' => 'Indian/Maldives'],
                ['id' => 384, 'timezone' => 'Indian/Mauritius'],
                ['id' => 385, 'timezone' => 'Indian/Mayotte'],
                ['id' => 386, 'timezone' => 'Indian/Reunion'],
                ['id' => 387, 'timezone' => 'Pacific/Apia'],
                ['id' => 388, 'timezone' => 'Pacific/Auckland'],
                ['id' => 389, 'timezone' => 'Pacific/Bougainville'],
                ['id' => 390, 'timezone' => 'Pacific/Chatham'],
                ['id' => 391, 'timezone' => 'Pacific/Chuuk'],
                ['id' => 392, 'timezone' => 'Pacific/Easter'],
                ['id' => 393, 'timezone' => 'Pacific/Efate'],
                ['id' => 394, 'timezone' => 'Pacific/Enderbury'],
                ['id' => 395, 'timezone' => 'Pacific/Fakaofo'],
                ['id' => 396, 'timezone' => 'Pacific/Fiji'],
                ['id' => 397, 'timezone' => 'Pacific/Funafuti'],
                ['id' => 398, 'timezone' => 'Pacific/Galapagos'],
                ['id' => 399, 'timezone' => 'Pacific/Gambier'],
                ['id' => 400, 'timezone' => 'Pacific/Guadalcanal'],
                ['id' => 401, 'timezone' => 'Pacific/Guam'],
                ['id' => 402, 'timezone' => 'Pacific/Honolulu'],
                ['id' => 403, 'timezone' => 'Pacific/Kiritimati'],
                ['id' => 404, 'timezone' => 'Pacific/Kosrae'],
                ['id' => 405, 'timezone' => 'Pacific/Kwajalein'],
                ['id' => 406, 'timezone' => 'Pacific/Majuro'],
                ['id' => 407, 'timezone' => 'Pacific/Marquesas'],
                ['id' => 408, 'timezone' => 'Pacific/Midway'],
                ['id' => 409, 'timezone' => 'Pacific/Nauru'],
                ['id' => 410, 'timezone' => 'Pacific/Niue'],
                ['id' => 411, 'timezone' => 'Pacific/Norfolk'],
                ['id' => 412, 'timezone' => 'Pacific/Noumea'],
                ['id' => 413, 'timezone' => 'Pacific/Pago_Pago'],
                ['id' => 414, 'timezone' => 'Pacific/Palau'],
                ['id' => 415, 'timezone' => 'Pacific/Pitcairn'],
                ['id' => 416, 'timezone' => 'Pacific/Pohnpei'],
                ['id' => 417, 'timezone' => 'Pacific/Port_Moresby'],
                ['id' => 418, 'timezone' => 'Pacific/Rarotonga'],
                ['id' => 419, 'timezone' => 'Pacific/Saipan'],
                ['id' => 420, 'timezone' => 'Pacific/Tahiti'],
                ['id' => 421, 'timezone' => 'Pacific/Tarawa'],
                ['id' => 422, 'timezone' => 'Pacific/Tongatapu'],
                ['id' => 423, 'timezone' => 'Pacific/Wake'],
                ['id' => 424, 'timezone' => 'Pacific/Wallis'],
                ['id' => 425, 'timezone' => 'UTC'],

        ];

        foreach ($items as $item) {
            \App\Timezone::create($item);
        }
    }
}
