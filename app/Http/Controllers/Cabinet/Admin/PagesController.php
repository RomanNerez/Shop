<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyListRequest;
use App\Http\Requests\ProductRequest;
use App\Models\AttrCollection;
use App\Models\AttrInProduct;
use App\Models\CurrencyList;
use App\Models\CurrencyValue;
use App\Models\Page;
use App\Models\Product;
use App\Models\RelatedProduct;
use App\Models\SubsInProducts;
use App\Models\TransAttrProduct;
use App\Models\TransCurrency;
use App\Models\TransPage;
use App\Models\TransProduct;
use App\Repositories\SearchActionRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function edit(Request $request)
    {
        sleep(1);
        $data = $request->input('data');

        return DB::transaction(function () use ($data) {
            $page = Page::find($data['id']);
            $page->update([
                'image' => $data['image'],
                'data'  => $data['data']
            ]);

            foreach ($data['content'] as $key => $value) {
                TransPage::find($value['id'])->update([
                    'title'     => $value['title'],
                    'data'      => $value['data'],
                    'metaTitle' => $value['metaTitle'],
                    'metaDesc'  => $value['metaDesc']
                ]);
            }

            $page->save();
            return $page;
        });
    }
}
