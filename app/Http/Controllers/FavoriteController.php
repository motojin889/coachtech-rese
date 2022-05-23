<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function favorite(Request $request)
    {
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $restaurant_id = $request->restaurant_id; //2.投稿idの取得
        $already_liked = Favorite::where('user_id', $user_id)->where('restaurant_id', $restaurant_id)->first(); //3.

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $favorite = new Favorite; //4.Likeクラスのインスタンスを作成
            $favorite->restaurant_id = $restaurant_id; //Likeインスタンスにrestaurant_id,user_idをセット
            $favorite->user_id = $user_id;
            $favorite->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Favorite::where('restaurant_id', $restaurant_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $review_likes_count = Restaurant::withCount('likes')->findOrFail($restaurant_id)->likes_count;
        $param = [
            'review_likes_count' => $review_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
    }
}
