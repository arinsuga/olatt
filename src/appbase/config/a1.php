<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Company Information
    |--------------------------------------------------------------------------
    |
    | Informasi lengkap perusahaan yang menggunakan aplikasi ini
    |
    */

    'company' => [
        'version' => '3.0',
        'name' => 'hadiprana',
        'website' => 'http://hadipranadesign.com/',
        'address' => [
            'street1' => 'Jl. Pangeran Antasari No. 12',
            'street2' => 'Cipete Selatan',
            'city' => 'Jakarta Selatan'
        ],
        'copyright' => '2020 - 2021',
        'dateformat' => 'd-m-Y'
    ],

    /*
    |--------------------------------------------------------------------------
    | Format default Number
    |--------------------------------------------------------------------------
    |
    | Format menggunakan standard indonesia
    | https://carbon.nesbot.com/docs/ ==> Localization
    |
    */
    'number' => [
        'default' => [
            'thousandsign' => ',',
            'decimalsign' => '.',
            'currency' => 'Rp.',
            'closing' => ',-'
        ],
        'system' => [
            'closing' => '', //Replace closing number sign with blank ( urutan array berpengaruh)
            'thousandsign' => '', //Replace thousand sign with blank
            'decimalsign' => '.', //Replace decima sign with (.) sign
            'currency' => '', //Replace currency sign with blank
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Format default tanggal
    |--------------------------------------------------------------------------
    |
    | Format menggunakan isoFormat dari php Carbon
    | https://carbon.nesbot.com/docs/ ==> Localization
    |
    */
    'date' => [
        'timezone' => 'Asia/Jakarta',
        'locale' => 'id_ID',

        'time' => 'HH:mm:ss',
        'timeampm' => 'hh:mm:ss A',

        'date' => 'DD/MM/YYYY',
        'datetime' => 'DD/MM/YYYY HH:mm:ss',
        'datetimeampm' => 'DD/MM/YYYY hh:mm:ss A',

        'datemonth' => 'DD MMMM YYYY',
        'datetimemonth' => 'DD MMMM YYYY HH:mm:ss',
        'datetimeampmmonth' => 'DD MMMM YYYY hh:mm:ss A',

        'datemonthshort' => 'DD-MMM-YYYY',
        'datetimemonthshort' => 'DD-MMM-YYYY HH:mm:ss',
        'datetimeampmmonthshort' => 'DD-MMM-YYYY hh:mm:ss A',

        'datemonthday' => 'dddd, DD MMMM YYYY',
        'datetimemonthday' => 'dddd, DD MMMM YYYY HH:mm:ss',
        'datetimeampmmonthday' => 'dddd, DD MMMM YYYY hh:mm:ss A',

        'datemonthshortday' => 'dddd, DD-MMM-YYYY',
        'datetimemonthshortday' => 'dddd, DD-MMM-YYYY HH:mm:ss',
        'datetimeampmmonthshortday' => 'dddd, DD-MMM-YYYY hh:mm:ss A',
        
        'iso' => [
            'months' => [
                'Januari' => 'January',
                'Februari' => 'February',
                'Maret' => 'March',
                'April' => 'April',
                'Mei' => 'May',
                'Juni' => 'June',
                'Juli' => 'July',
                'Agustus' => 'August',
                'September' => 'September',
                'Oktober' => 'October',
                'November' => 'November',
                'Desember' => 'December'
            ],
            'short_months' => [
                'Jan' => 'Jan',
                'Feb' => 'Feb',
                'Mar' => 'Mar',
                'Apr' => 'Apr',
                'Mei' => 'May',
                'Jun' => 'Jun',
                'Jul' => 'Jul',
                'Agt' => 'Aug',
                'Sep' => 'Sep',
                'Okt' => 'Oct',
                'Nov' => 'Nov',
                'Des' => 'Dec'
            ],

            'weekdays' => [
                'Minggu' => 'Sunday',
                'Senin' => 'Monday',
                'Selasa' => 'Tuesday',
                'Rabu' => 'Wednesday',
                'Kamis' => 'Thursday',
                'Jumat' => 'Friday',
                'Sabtu' => 'Saturday'
            ],

            'weekdays_short' => [
                'Min' => 'Sun',
                'Sen' => 'Mon',
                'Sel' => 'Tue',
                'Rab' => 'Wed',
                'Kam' => 'Thu',
                'Jum' => 'Fri',
                'Sab' => 'Sat'
            ],

            'weekdays_min' => [
                'Mg' => 'Su',
                'Sn' => 'Mo',
                'Sl' => 'Tu',
                'Rb' => 'We',
                'Km' => 'Th',
                'Jm' => 'Fr',
                'Sb' => 'Sa'
            ],
        
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Google API Information
    |--------------------------------------------------------------------------
    |
    | Google API Information
    |
    */
    "google" => [
        "geocodekey" => env("GEOCODE_KEY", "put_google_geocode_key_here"),
        "geocodeurl" => env("GEOCODE_URL", "put_google_geocode_url_here"),
    ],

];
