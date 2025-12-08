<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\SeasonHelper;

class CheckSeasonAvailability
{
    public function handle(Request $request, Closure $next, $season)
    {
        if (!SeasonHelper::isSeasonActive($season)) {
            $seasonData = SeasonHelper::getSeasonPeriods()[$season] ?? null;
            $seasonName = $seasonData ? $seasonData['name'] : 'Collezione';

            return redirect()->route('collection')->with([
                'error' => "La collezione {$seasonName} non è attualmente disponibile."
            ]);
        }

        return $next($request);
    }
}
