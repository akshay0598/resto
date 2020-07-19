<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Services\RestoService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(RestoService $restoService)
    {
      $restoId=1;
     

      $categories =Menu::where('resto_id',$restoId)->get()->groupBy('category.name');

      $restos=$restoService->userRestoAndTables();
        return view('home',compact('categories','restoId','restos'));
    }
}
