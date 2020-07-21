<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\RestoCategoryValidator;
use App\Models\Menu;
use App\Models\Category;

class MenuController extends Controller
{
    public function index($id){
    $restoId=1;
   $menus =Menu::where('resto_id',$restoId)->get()->groupBy('category.name');
    return view('menu-index',compact('menus','restoId'));

    }
    public function saveMenuItem(Request $request)
    {
      $postData = $this->validate($request,[
        'category' => ['required',new RestoCategoryValidator(request('restoId'))],
        'restoId' =>'required|numeric',
        'price' => 'required | numeric',
         'description' =>'required|min:3',
        'item' => 'required'

        ]);

        $category=Category::where('resto_id',$postData['restoId'])->where('name',$postData['category'])->first();

        $menu = Menu::create([
        'name'=> $postData['item'],
        'price' =>$postData['price'],
        'resto_id' =>$postData['restoId'],
        'description' => $postData['description'],
        'category_id' =>$category->id


        ]);
        $menu->save();
    }
}
