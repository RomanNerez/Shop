<?php
namespace App\Repositories\Publicly;


use App\Models\Categories;
use App\Models\CurrencyList;
use App\Models\Lang;
use App\Repositories\Repository;

class HeaderRepository extends Repository
{
    public function data($request) {
        $langModel = Lang::all();
        $segments  = $request->segments();

        if ( count($segments) && in_array($segments[0], $langModel->pluck('local')->toArray()) ) {
            array_shift($segments);
        }

        $path  = implode('/', $segments);
        $query = $request->get('query');
        $lang  = [
            'selected' => null,
            'base'     => env('APP_LOCALE_BASE', 'ru'),
            'items'    => []
        ];
        $currency = [
            'selected' => null,
            'items'    => []
        ];

        if ($query) {
            $path .= '?query='. $query;
        }

        foreach ($langModel as $item) {
            $item->url = url($item->local .'/'. $path);

            if ($item->local === $request->input('locale')) {
                $lang['selected'] = $item;
            }else{
                $lang['items'][] = $item;
            }
        }

        foreach (CurrencyList::all() as $item) {
            $item->url = url('action/currency/'. $item->code);

            if ($item->code === $request->input('currency')) {
                $currency['selected'] = $item;
            }else{
                $currency['items'][] = $item;
            }
        }

        return [
            'locale'    => $request->input('locale'),
            'lang'      => $lang,
            'currency'  => $currency,
            'menu'      => self::getMenu(),
            'content'   => self::getContent(),
            'cart'      => $request->session()->get('cart'),
            'compare'   => $request->session()->get('compare'),
            'favorites' => $request->session()->get('favorites')
        ];
    }

    public function getContent() {
        $script = [
            'Org'   => [
                "@context"          => "https://schema.org",
                "@type"             => "Organization",
                "name"              => "MAGNiTON",
                "alternateName"     => "magniton.org.ua",
                "url"               => url('/'), // главная страница
                "logo"              => "https://magniton.ab-vector.org.ua/library/img/logo.svg", // логотип
                "image"             => "Главное изображение", // изображение, можно фасад магазина или т.п.
                "description"       => "asd", // Описание организации/магазина
                "address"           => [
                    "@type"                 => "PostalAddress",
                    "streetAddress"         => "ул. Богдана Хмельницкого 12",
                    "addressLocality"       => "Запорожье",
                    "postalCode"            => "69000",
                    "addressCountry"        => "UA"
                ],
                "location"         => [
                    "@type"                 => "Place",
                    "geo"                   => [
                        "@type"                 => "GeoCoordinates",
                        "latitude"              => "47.85764437400032",
                        "longitude"             => "35.09829592794644"
                    ],
                ],
                "contactPoint"     => [[
                    "@type"                 => "ContactPoint",
                    "telephone"             => "+38 095 768-82-29",
                    "contactType"           => "customer service",
                    "areaServed"            => "UA",
                    "availableLanguage"     => ["Russian","Ukrainian"]
                ],[
                    "@type"                 => "ContactPoint",
                    "telephone"             => "+38 097 785-90-45",
                    "contactType"           => "customer service",
                    "areaServed"            => "UA",
                    "availableLanguage"     => ["Russian","Ukrainian"]
                ],[
                    "@type"                 => "ContactPoint",
                    "telephone"             => "+38 063 973-73-04",
                    "contactType"           => "customer service",
                    "areaServed"            => "UA",
                    "availableLanguage"     => ["Russian","Ukrainian"]
                ]],
                "contactPoint"     => [
                    "@type"                 => "ContactPoint",
                    "telephone"             => "+38 095 768-82-29",
                    "contactType"           => "customer service"
                ],
                "sameAs"           => [ // ссылка на соц. сети
                    "https://www.facebook.com/magniton_ukraine-1317303611756392",
                    "https://www.instagram.com/magniton_ukraine",
                    "https://www.youtube.com/channel/UC5UifHZ91-1tzjM9nhuMJQw",
                    "https://magniton.org.ua",
                    "https://t.me/magniton_ukraine"
                ]
            ],
            'Web'   => [
                "@context"         => "https://schema.org/",
                "@type"            => "WebSite",
                "name"             => "MAGNiTON",
                "url"              => url('/'), // главная страница
            ],
            'Serch' => [
                "@context"         => "https://schema.org/",
                "@type"	           => "Action",
                "potentialAction"  => [
                    "@type"             => "SearchAction",
                    "target"            => url('/search/?text={search_term_string}'), // серч ссылка
                    "query-input"       => "required name=search_term_string"
                ]
            ],
            'Brc'   => [
                "@context"         => "https://schema.org/",
                "@type"            => "BreadcrumbList",
                "itemListElement"  => [
                    "@type"                 => "ListItem",
                    "position"              => 1,
                    "name"                  => "MAGNiTON",
                    "item"                  => url('/') // ccылка на главную в крогках
                ]
            ]
        ];

        return [
            'meta' => [
                'script' => $script
            ]
        ];
    }

    public function getMenu() {
        return [
            'base' => Categories::with('collection')
                ->where([
                    ['is_root', 0],
                    ['related', 'store']
                ])
                ->get()
        ];
    }
}