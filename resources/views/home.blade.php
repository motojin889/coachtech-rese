@extends('layouts.app')

<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    @section('content')
    <div class="restaurants">
        @foreach ($items as $item)
        @if(isset($item))
        <div class="restaurant-card">
            <img src={{$item['image_url']}} alt="" class="card-img">
            <h2 class="card-ttl">{{$item->name}}</h2>
            <div class="card-option">
                <p class="card-area">#{{$item->area->name}}</p>
                <p class="card-genre">#{{$item->genre->name}}</p>
            </div>
            <form action="/detail">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <input type="submit" value="詳しく見る" class="card-detail">
            </form>

            @auth
            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
            @if (!$restaurants->App/Models/isLikedBy(Auth::user()))
            <span class="likes">
                <i class="fas fa-music like-toggle" data-review-id="{{ $item->id }}"></i>
                <span class="like-counter">{{$item->likes_count}}</span>
            </span><!-- /.likes -->
            @else
            <span class="likes">
                <i class="fas fa-music heart like-toggle liked" data-review-id="{{ $item->id }}"></i>
                <span class="like-counter">{{$item->likes_count}}</span>
            </span><!-- /.likes -->
            @endif
            @endauth
            @guest
            <span class="likes">
                <i class="fas fa-music heart"></i>
                <span class="like-counter">{{$item->likes_count}}</span>
            </span><!-- /.likes -->
            @endguest

        </div>
        @endif
        @endforeach
    </div>
    @endsection
    <script src="js/favorite.js"></script>
</body>

</html>