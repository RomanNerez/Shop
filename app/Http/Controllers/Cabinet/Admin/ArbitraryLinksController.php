<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use App\Models\ArbitraryLinks;
use App\Models\TransArbitraryLinks;
use App\Http\Requests\ArbitraryLinksRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ArbitraryLinksController extends Controller
{
    public function create(ArbitraryLinksRequest $request): JsonResponse
    {
        $validated = $request->validated();

        return response()->json(
            $this->insert($validated)
        );
    }

    public function insert(array $data): Menu
    {
        sleep(1);
        return DB::transaction(function () use (&$data) {
            $arbitraryLink = new ArbitraryLinks();
            $arbitraryLink->link = $data['link'];
            $arbitraryLink->save();

            foreach ($data['content'] as $key => $value) {
                $transArbitraryLinks = new TransArbitraryLinks();
                $transArbitraryLinks->arbitrary_links_id = $arbitraryLink->id;
                $transArbitraryLinks->title = $value['title'];
                $transArbitraryLinks->local = $key;
                $transArbitraryLinks->save();
            }
            $lastOrder = Menu::where([
                'parent_id' => null,
                'area_visibility_id' => $data['area_visibility_id']
            ])->max('order') ?? 0;
            $menu = Menu::create([
                'instance_type' => ArbitraryLinks::TABLE_NAME,
                'instance_id' => $arbitraryLink->id,
                'area_visibility_id' => $data['area_visibility_id'],
                'order' => $lastOrder + 1
            ]);
            $menu->save();

            return $menu->find($menu->id);
        });
    }

    public function edit(ArbitraryLinksRequest $request)
    {
        $validated = $request->validated();

        ArbitraryLinks::where('id', $validated['id'])->update([
           'link' => $validated['link'],
        ]);

        foreach ($validated['content'] as $key => $value) {
            TransArbitraryLinks::where('id', $value['id'])->update([
                'arbitrary_links_id' => $value['arbitrary_links_id'],
                'title' => $value['title'],
                'local' => $key
            ]);
        }

        return response()->json(
            $validated
        );
    }
}
