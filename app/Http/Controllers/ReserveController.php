<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reserve(Request $request){
        $posts = $request->all();
        $posts['start_at'] = $posts['date'].' '.$posts['time'];
        unset($posts['date']);
        unset($posts['time']);
        Reserve::insert([
        'user_id' => Auth::id(),
        'restaurant_id' => $posts['restaurant_id'],
        'start_at' => $posts['start_at'],
        'number_of_people' => $posts['number_of_people']
        ]);
        return redirect('/thanks');
    }

    public function thanks(){
        return view('thanks');
    }
}
