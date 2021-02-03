<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Categories::class, 6)->create();
        //factory(App\SubCategories::class, 48)->create();
        // $this->call(SubCategoriesSeeder::class);

        DB::table('lang')->insert([
            [
                'title'  => 'Русский',
                'local'  => 'ru',
                'abbrev' => 'рус'
            ],[
                'title'  => 'УкраЇнська',
                'local'  => 'ua',
                'abbrev' => 'укр'
            ]
        ]);
        
        //factory(App\Products::class, 480)->create();
        factory(App\User::class, 1)->create();
        $pages = [
            [
                'base' => [
                    'key'  => 'home',
                    'link' => '/',
                    'data' => []
                ],
                'locales' => [
                    [
                        'title'     => 'Головна',
                        'local'     => 'ru',
                        'metaTitle' => 'Головна',
                        'metaDesc'  => 'Головна',
                        'data'      => []
                    ],[
                        'title'     => 'Головна',
                        'local'     => 'ua',
                        'metaTitle' => 'Головна',
                        'metaDesc'  => 'Головна',
                        'data'      => []
                    ]
                ]
            ],[
                'base' => [
                    'key'  => 'services',
                    'link' => '/services',
                    'data' => []
                ],
                'locales' => [
                    [
                        'title'     => 'Услуги',
                        'local'     => 'ru',
                        'metaTitle' => 'Услуги',
                        'metaDesc'  => 'Услуги',
                        'data'      => []
                    ],[
                        'title'     => 'Послуги',
                        'local'     => 'ua',
                        'metaTitle' => 'Послуги',
                        'metaDesc'  => 'Послуги',
                        'data'      => []
                    ]
                ]
            ],[
                'base' => [
                    'key'  => 'standing',
                    'link' => '/services/standing',
                    'data' => []
                ],
                'locales' => [
                    [
                        'title'     => 'Изготовление постоянных магнитов на заказ',
                        'local'     => 'ru',
                        'metaTitle' => 'Изготовление постоянных магнитов на заказ',
                        'metaDesc'  => 'Изготовление постоянных магнитов на заказ',
                        'data'      => ['desc' => '']
                    ],[
                        'title'     => 'Изготовление постоянных магнитов на заказ',
                        'local'     => 'ua',
                        'metaTitle' => 'Изготовление постоянных магнитов на заказ',
                        'metaDesc'  => 'Изготовление постоянных магнитов на заказ',
                        'data'      => ['desc' => '']
                    ]
                ]
            ],[
                'base' => [
                    'key'  => 'vinyls',
                    'link' => '/services/vinyls',
                    'data' => []
                ],
                'locales' => [
                    [
                        'title'     => 'Изготовление виниловых магнитов',
                        'local'     => 'ru',
                        'metaTitle' => 'Изготовление виниловых магнитов',
                        'metaDesc'  => 'Изготовление виниловых магнитов',
                        'data'      => ['shape' => [], 'depth' => []]
                    ],[
                        'title'     => 'Изготовление виниловых магнитов',
                        'local'     => 'ua',
                        'metaTitle' => 'Изготовление виниловых магнитов',
                        'metaDesc'  => 'Изготовление виниловых магнитов',
                        'data'      => ['shape' => [], 'depth' => []]
                    ]
                ]
            ],[
                'base' => [
                    'key'  => 'delivery',
                    'link' => '/delivery',
                    'data' => []
                ],
                'locales' => [
                    [
                        'title'     => 'Доставка и оплата',
                        'local'     => 'ru',
                        'metaTitle' => 'Доставка и оплата',
                        'metaDesc'  => 'Доставка и оплата',
                        'data'      => []
                    ],[
                        'title'     => 'Доставка и оплата',
                        'local'     => 'ua',
                        'metaTitle' => 'Доставка и оплата',
                        'metaDesc'  => 'Доставка и оплата',
                        'data'      => []
                    ]
                ]
            ],[
                'base' => [
                    'key'  => 'contacts',
                    'link' => '/contacts',
                    'data' => []
                ],
                'locales' => [
                    [
                        'title'     => 'Контакты',
                        'local'     => 'ru',
                        'metaTitle' => 'Контакты',
                        'metaDesc'  => 'Контакты',
                        'data'      => []
                    ],[
                        'title'     => 'Контакты',
                        'local'     => 'ua',
                        'metaTitle' => 'Контакты',
                        'metaDesc'  => 'Контакты',
                        'data'      => []
                    ]
                ]
            ],[
                'base' => [
                    'key'  => 'calculator',
                    'link' => '/calculator',
                    'data' => []
                ],
                'locales' => [
                    [
                        'title'     => 'Магнитный калькулятор',
                        'local'     => 'ru',
                        'metaTitle' => 'Магнитный калькулятор',
                        'metaDesc'  => 'Магнитный калькулятор',
                        'data'      => []
                    ],[
                        'title'     => 'Магнитный калькулятор',
                        'local'     => 'ua',
                        'metaTitle' => 'Магнитный калькулятор',
                        'metaDesc'  => 'Магнитный калькулятор',
                        'data'      => []
                    ]
                ]
            ],[
                'base' => [
                    'key'  => 'units',
                    'link' => '/units',
                    'data' => []
                ],
                'locales' => [
                    [
                        'title'     => 'Единицы измерения',
                        'local'     => 'ru',
                        'metaTitle' => 'Единицы измерения',
                        'metaDesc'  => 'Единицы измерения',
                        'data'      => []
                    ],[
                        'title'     => 'Единицы измерения',
                        'local'     => 'ua',
                        'metaTitle' => 'Единицы измерения',
                        'metaDesc'  => 'Единицы измерения',
                        'data'      => []
                    ]
                ]
            ],[
                'base' => [
                    'key'  => 'returns',
                    'link' => '/returns',
                    'data' => []
                ],
                'locales' => [
                    [
                        'title'     => 'Возврат',
                        'local'     => 'ru',
                        'metaTitle' => 'Возврат',
                        'metaDesc'  => 'Возврат',
                        'data'      => []
                    ],[
                        'title'     => 'Возврат',
                        'local'     => 'ua',
                        'metaTitle' => 'Возврат',
                        'metaDesc'  => 'Возврат',
                        'data'      => []
                    ]
                ]
            ],[
                'base' => [
                    'key'  => 'certificates',
                    'link' => '/certificates',
                    'data' => []
                ],
                'locales' => [
                    [
                        'title'     => 'Сертификаты',
                        'local'     => 'ru',
                        'metaTitle' => 'Сертификаты',
                        'metaDesc'  => 'Сертификаты',
                        'data'      => []
                    ],[
                        'title'     => 'Сертификаты',
                        'local'     => 'ua',
                        'metaTitle' => 'Сертификаты',
                        'metaDesc'  => 'Сертификаты',
                        'data'      => []
                    ]
                ]
            ],[
                'base' => [
                    'key'  => 'partnership',
                    'link' => '/partnership',
                    'data' => []
                ],
                'locales' => [
                    [
                        'title'     => 'Сотрудничество',
                        'local'     => 'ru',
                        'metaTitle' => 'Сотрудничество',
                        'metaDesc'  => 'Сотрудничество',
                        'data'      => []
                    ],[
                        'title'     => 'Сотрудничество',
                        'local'     => 'ua',
                        'metaTitle' => 'Сотрудничество',
                        'metaDesc'  => 'Сотрудничество',
                        'data'      => []
                    ]
                ]
            ]
        ];

        foreach ($pages as $page) {
            $model = Page::create($page['base']);

            foreach ($page['locales'] as $locale) {
                $locale['page_id'] = $model->id;
                TransPage::create($locale);
            }
        }
    }

}
