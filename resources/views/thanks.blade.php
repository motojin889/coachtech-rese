<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanks</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/thanks.css">
</head>

<body>
  <div class="body">
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

    <div class="contents">
      <div class="contents-item">
        <h2 class="contents-txt">ご予約ありがとうございます</h2>
        <a href="/" class="contents-back">戻る</a>
      </div>
    </div>

  </div>
  <script src="js/layout.js"></script>
</body>

</html>