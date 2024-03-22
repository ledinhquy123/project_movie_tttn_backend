<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.bunny.net">
   <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

   <!-- Scripts -->
   @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="min-height: 100vh" class="bg-light d-flex flex-column justify-content-center align-items-center">
  <div class=" container">
    <div class="card p-6 p-lg-10 space-y-4 p-5 m-5">
      <h1 class="h3 fw-700">
        {{ $subject }}
      </h1>
      <p>
        {{ $content }}
      </p>
      <a class="btn btn-primary p-3 fw-700" href="http://localhost:8080">Visit Website</a>
    </div>
    <div class="text-muted text-center my-6">
      <strong class="display-4">CINEAURA</strong> <br/>
      Sent with <3 from Cineaura. <br>
      Tân Bình<br>
      Tp Hồ Chí Minh <br>
    </div>
  </div>
</body>
</html>