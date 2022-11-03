<?php
namespace Avenirer\PhpCalendar;

class Languages
{
    private static $locales = [
        'en' => [
            'months' => [
                1 => [ 'index' => 1, 'long' => 'January', 'short' => 'Jan' ],
                2 => [ 'index' => 2, 'long' => 'February', 'short' => 'Feb' ],
                3 => [ 'index' => 3, 'long' => 'March', 'short' => 'Mar' ],
                4 => [ 'index' => 4, 'long' => 'April', 'short' => 'Apr' ],
                5 => [ 'index' => 5, 'long' => 'May', 'short' => 'May' ],
                6 => [ 'index' => 6, 'long' => 'June', 'short' => 'Jun' ],
                7 => [ 'index' => 7, 'long' => 'July', 'short' => 'Jul' ],
                8 => [ 'index' => 8, 'long' => 'August', 'short' => 'Aug' ],
                9 => [ 'index' => 9, 'long' => 'September', 'short' => 'Sep' ],
                10 => [ 'index' => 10, 'long' => 'October', 'short' => 'Oct' ],
                11 => [ 'index' => 11, 'long' => 'November', 'short' => 'Nov' ],
                12 => [ 'index' => 12, 'long' => 'December', 'short' => 'Dec' ],
            ],
            'weekdays' => [
                0 => [ 'index' => 0, 'long' => 'Sunday', 'short' => 'Sun' ],
                1 => [ 'index' => 1, 'long' => 'Monday', 'short' => 'Mon' ],
                2 => [ 'index' => 2, 'long' => 'Tuesday', 'short' => 'Tue' ],
                3 => [ 'index' => 3, 'long' => 'Wednesday', 'short' => 'Wed' ],
                4 => [ 'index' => 4, 'long' => 'Thursday', 'short' => 'Thu' ],
                5 => [ 'index' => 5, 'long' => 'Friday', 'short' => 'Fri' ],
                6 => [ 'index' => 6, 'long' => 'Saturday', 'short' => 'Sat'],
            ],
        ],
        'fr' => [
            'months' => [
                1 => [ 'index' => 1, 'long' => 'Janvier', 'short' => 'Jan' ],
                2 => [ 'index' => 2, 'long' => 'Février', 'short' => 'Fév' ],
                3 => [ 'index' => 3, 'long' => 'Mars', 'short' => 'Mar' ],
                4 => [ 'index' => 4, 'long' => 'Avril', 'short' => 'Avr' ],
                5 => [ 'index' => 5, 'long' => 'Mai', 'short' => 'Mai'],
                6 => [ 'index' => 6, 'long' => 'Juin', 'short' => 'Juin'],
                7 => [ 'index' => 7, 'long' => 'Juillet', 'short' => ''],
                8 => [ 'index' => 8, 'long' => 'Août', 'short' => 'Juil'],
                9 => [ 'index' => 9, 'long' => 'Septembre', 'short' => 'Sep'],
                10 => [ 'index' => 10, 'long' => 'Octobre', 'short' => 'Oct'],
                11 => [ 'index' => 11, 'long' => 'Novembre', 'short' => 'Nov'],
                12 => [ 'index' => 12, 'long' => 'Décembre', 'short' => 'Déc'],
            ],
            'weekdays' => [
                0 => [ 'index' => 0, 'long' => 'Dimanche', 'short' => 'Dim'],
                1 => [ 'index' => 1, 'long' => 'Lundi', 'short' => 'Lun'],
                2 => [ 'index' => 2, 'long' => 'Mardi', 'short' => 'Mar'],
                3 => [ 'index' => 3, 'long' => 'Mercredi', 'short' => 'Mer'],
                4 => [ 'index' => 4, 'long' => 'Jeudi', 'short' => 'Jeu'],
                5 => [ 'index' => 5, 'long' => 'Vendredi', 'short' => 'Ven'],
                6 => [ 'index' => 6, 'long' => 'Samedi', 'short' => 'Sam'],
            ],
        ],
        
        'ro' => [
            'months' => [
                1 => [ 'index' => 1, 'long' => 'Ianuarie', 'short' => 'Ian' ],
                2 => [ 'index' => 2, 'long' => 'Februarie', 'short' => 'Feb' ],
                3 => [ 'index' => 3, 'long' => 'Martie', 'short' => 'Mar' ],
                4 => [ 'index' => 4, 'long' => 'Aprilie', 'short' => 'Apr' ],
                5 => [ 'index' => 5, 'long' => 'Mai', 'short' => 'Mai' ],
                6 => [ 'index' => 6, 'long' => 'Iunie', 'short' => 'Iun' ],
                7 => [ 'index' => 7, 'long' => 'Iulie', 'short' => 'Iul' ],
                8 => [ 'index' => 8, 'long' => 'August', 'short' => 'Aug' ],
                9 => [ 'index' => 9, 'long' => 'Septembrie', 'short' => 'Sep' ],
                10 => [ 'index' => 10, 'long' => 'Octombrie', 'short' => 'Oct' ],
                11 => [ 'index' => 11, 'long' => 'Noiembrie', 'short' => 'Noi' ],
                12 => [ 'index' => 12, 'long' => 'Decembrie', 'short' => 'Dec'],
            ],
            'weekdays' => [
                0 => [ 'index' => 0, 'long' => 'Duminica', 'short' => 'Du'],
                1 => [ 'index' => 1, 'long' => 'Luni', 'short' => 'Lu'],
                2 => [ 'index' => 2, 'long' => 'Marti', 'short' => 'Ma'],
                3 => [ 'index' => 3, 'long' => 'Miercuri', 'short' => 'Mi'],
                4 => [ 'index' => 4, 'long' => 'Joi', 'short' => 'Jo'],
                5 => [ 'index' => 5, 'long' => 'Vineri', 'short' => 'Vi'],
                6 => [ 'index' => 6, 'long' => 'Sambata', 'short' => 'Sa'],
            ],
        ],

    ];

    public static function getLocale($locale)
    {
        return self::$locales[$locale] ?? self::$locales['en'];
    }
}