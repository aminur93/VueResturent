<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Rules\RestoCategoryValidate;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function saveMenuItem(Request $request)
    {
       $postData = $this->validate($request, [
            'restoId' => 'required|numeric',
            'price' => 'required|numeric',
            'item' => 'required',
            'description' => 'required',
            'category' => ['required', new RestoCategoryValidate(request('restoId'))],
        ]);
       
       $category = Category::where('resto_id',$postData['restoId'])->where('name',$postData['category'])->first();
       
       $menu = Menu::create([
           'name' => $postData['item'],
           'price' => $postData['price'],
           'resto_id' => $postData['restoId'],
           'category_id' => $category->id,
           'description' => $postData['description']
       ]);
       
       return response()->json($menu,200);
    }
}
