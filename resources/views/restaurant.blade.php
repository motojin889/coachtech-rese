<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/restaurant.css">
</head>

<body>
  <div class="body">
    <div class="contents">
      <div class="left-contents">
        <div class="header">
          <div id="nav-wrapper" class="nav-wrapper">
            <div class="hamburger" id="js-hamburger">
              <span class="hamburger__line hamburger__line--1"></span>
              <span class="hamburger__line hamburger__line--2"></span>
              <span class="hamburger__line hamburger__line--3"></span>
            </div>
            <nav class="sp-nav">
              <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/register">Registration</a></li>
                <li><a href="/login">login</a></li>
              </ul>
            </nav>
            <div class="black-bg" id="js-black-bg"></div>
          </div>
          <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
          </a>
        </div>

        <div class="restaurant--detail">
          <a href="/" class="back-btn">
            <</a>
              <h1 class="restaurant-name">{{$items->name}}</h1>
              <img src="{{$items->image_url}}" alt="" class="restaurant-img">
              <h3 class="restaurant-genre-area">#{{$items->area->name}}#{{$items->genre->name}}</h3>
              <p class="restaurant-description">{{$items->description}}</p>
        </div>
      </div>

      <div class="reserve">
        <h2 class="reserve-ttl">予約</h2>
        <form action="/reserve" class="reserve-form" method="POST">
          @csrf
          <input type="hidden" name="restaurant_id" value={{$items->id}}>
          <div class="flex-between">
            <div class="flex-column">
              <input type="date" name="date" id="" class="reserve-date">
              <input type="time" name="time" id="" class="reserve-time">
              <select name="number_of_people" id="" class="reserve-number">
                <option value="1">1人</option>
                <option value="2">2人</option>
                <option value="3">3人</option>
                <option value="4">4人</option>
                <option value="5">5人</option>
                <option value="6">6人</option>
                <option value="7">7人</option>
                <option value="8">8人</option>
                <option value="9">9人</option>
                <option value="10">10人</option>
              </select>
            </div>
            <input type="submit" value="予約する" class="reserve-submit">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="js/restaurant.js"></script>
</body>

</html>