<?php
namespace App\Traits;

trait GetUrlTrait
{
    public function urlLocal($locale, $path) {
        if ($locale) {
            $base = env('APP_LOCALE_BASE', 'ru');

            if ($locale !== $base) {
                $path = $locale .'/'. $path;
            }
        }

        return url($path);
    }
}
