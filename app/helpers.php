<?php

function settings ($key, $fallback = null) {
$settings = App\Settings::orderBy('id', 'asc')->first();
return $settings ? $settings->{$key} : $fallback;
}

function user () {
    return auth()->user();
}


if (! function_exists('title_case')) {
    /**
     * Convert a value to title case.
     *
     * @param  string  $value
     * @return string
     */
    function title_case($value)
    {
        return Str::title($value);
    }
}