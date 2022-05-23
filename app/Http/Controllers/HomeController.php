<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Restaurant::get();
        $restaurants = Restaurant::withCount('favorite')->orderBy('id', 'desc')->paginate(10);
        $param = [
            'restaurants' => $restaurants,
        ];
        return view('home',compact('items','restaurants'));
    }

    public function detail(Request $request)
    {
        $items = Restaurant::find($request->id);
        return view('restaurant', compact('items'));
    }

    public function serch(Request $request){
        $keyword_area = $request->input('area');
        $keyword_genre = $request->input('genre');
        $keyword_text = $request->input('serch_text');
        $query = Restaurant::query();

        switch($keyword_area){
            case "all":
                $items = Restaurant::all();
                break;
            case 1:
                $items = $query->where('area_id',1)->get();
                break;
            case 2:
                $items = $query->where('area_id',2)->get();
                break;
            case 3:
                $items = $query->where('area_id',3)->get();
                break;
        }
        switch($keyword_genre){
            case "all":
                $items = Restaurant::all();
                break;
            case 1:
                $items = $query->where('genre_id',1)->get();
                break;
            case 2:
                $items = $query->where('genre_id', 2)->get();
                break;
            case 3:
                $items = $query->where('genre_id', 3)->get();
                break;
            case 4:
                $items = $query->where('genre_id', 4)->get();
                break;
            case 5:
                $items = $query->where('genre_id', 5)->get();
                break;
        }
        if (!empty($keyword_text)) {
            $items = $query->where('name', 'LIKE', "%{$keyword_text}%")
            ->orWhere('description', 'LIKE', "%{$keyword_text}%")->get();
        }

        $items = $query->get();

        return view('home',compact('items'));
    }
}
