<?php

namespace App\Helpers;

use Carbon\Carbon;

class SeasonHelper
{
    public static function getSeasonPeriods()
    {
        return [
            'spring' => [
                'name' => 'Primavera',
                'start_month' => 3,  // Marzo
                'duration' => 6,     // 6 mesi
                'route' => 'collection.spring'
            ],
            'summer' => [
                'name' => 'Estate',
                'start_month' => 6,  // Giugno
                'duration' => 6,     // 6 mesi
                'route' => 'collection.summer'
            ],
            'autumn' => [
                'name' => 'Autunno',
                'start_month' => 9,  // Settembre
                'duration' => 6,     // 6 mesi
                'route' => 'collection.autumn'
            ],
            'winter' => [
                'name' => 'Inverno',
                'start_month' => 12, // Dicembre
                'duration' => 6,     // 6 mesi
                'route' => 'collection.winter'
            ]
        ];
    }

    public static function isSeasonActive($season)
    {
        $periods = self::getSeasonPeriods();

        if (!isset($periods[$season])) {
            return false;
        }

        $currentMonth = Carbon::now()->month;
        $seasonData = $periods[$season];

        // Calcola i mesi attivi per questa stagione
        $activeMonths = [];
        for ($i = 0; $i < $seasonData['duration']; $i++) {
            $month = ($seasonData['start_month'] + $i - 1) % 12 + 1;
            $activeMonths[] = $month;
        }

        return in_array($currentMonth, $activeMonths);
    }

    public static function getAllSeasonsStatus()
    {
        $seasons = [];
        foreach (self::getSeasonPeriods() as $season => $data) {
            $seasons[$season] = [
                'name' => $data['name'],
                'route' => $data['route'],
                'active' => self::isSeasonActive($season),
                'next_available' => self::getNextAvailableDate($season)
            ];
        }
        return $seasons;
    }

    private static function getNextAvailableDate($season)
    {
        $periods = self::getSeasonPeriods();
        $seasonData = $periods[$season];

        $currentYear = Carbon::now()->year;
        $startDate = Carbon::create($currentYear, $seasonData['start_month'], 1);

        // Se la data è già passata quest'anno, calcola per l'anno prossimo
        if ($startDate->isPast()) {
            $startDate->addYear();
        }

        return $startDate->format('M Y');
    }
}
