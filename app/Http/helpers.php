<?php

use App\Models\ColorCombination;

if (!function_exists('checkColorCombinationDefault')) {
    function checkColorCombinationDefault()
    {
        return ColorCombination::query()->where('default', true)->first();
    }
}

if (!function_exists('checkColorCombinationCount')) {
    function checkColorCombinationCount()
    {
        return ColorCombination::query()->count();
    }
}
