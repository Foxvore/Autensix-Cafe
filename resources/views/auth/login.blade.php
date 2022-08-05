<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autensix Coffee</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <div class="overlay"></div>
   <form action="{{ route('login') }}" method="post" class="box" autocomplete="off">
   @csrf
       <div class="header">
           <h4></h4>
           <p></p>
       </div>
       <div class="login-area">
           <input name="email" type="text" class="username" placeholder="Email">
           <input name="password" type="password" class="password" placeholder="Password">
           <input name="submit" type="submit" value="Login" class="submit">
       </div>
   </form> 
</body>
</html>