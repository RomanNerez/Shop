<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\ArbitraryLinks;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function create(MenuRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $menus = [];
        foreach ($validated as $value) {
            $lastOrder = Menu::where([
                'parent_id' => null,
                'area_visibility_id' => $value['area_visibility_id']
            ])->max('order') ?? 0;
            $value['order'] = $lastOrder + 1;
            $menu = Menu::create($value);
            $menu->save();
            $menus[] = $menu->find($menu->id);
        }

        return response()->json($menus);
    }

    public function update(Request $request): JsonResponse
    {
        $data = $request->input();
        $deleteMenus = [];
        $deleteMenusArbitraryLinks = [];
        foreach ($data as $value) {
            if ( isset($value['deleted']) ) {
                $deleteMenus[] = $value['id'];
                if ($value['instance_type'] === ArbitraryLinks::TABLE_NAME) {
                    $deleteMenusArbitraryLinks[] = $value['instance']['id'];
                }
                continue;
            }
            Menu::where('id', $value['id'])->update([
                'instance_id' => $value['instance_id'],
                'instance_type' => $value['instance_type'],
                'parent_id' => $value['parent_id'],
                'area_visibility_id' => $value['area_visibility_id'],
                'order' => $value['order']
            ]);
        }

        $this->deleteMenus($deleteMenus);
        $this->deleteArbitraryLinks($deleteMenusArbitraryLinks);

        return response()->json([true]);
    }

    public function deleteMenus(array $ids): bool
    {
        if ( !empty($ids) ) {
            Menu::whereIn('id', $ids)->delete();
        }

        return true;
    }

    public function deleteArbitraryLinks(array $ids): bool
    {
        if ( !empty($ids) ) {
            ArbitraryLinks::whereIn('id', $ids)->delete();
        }

        return true;
    }
}
