<!doctype html>
<?php
  session_start();
  $username="admin";
  $password="root123";

   if (isset($_POST['username']) && isset($_POST['password']))
  {
    if ($_POST['username'] == $username && $_POST['password'] == $password)
    {
      $_SESSION['loggedin'] = true;
      header("Location:home.php");
    }
    else
    {
      $message = "wrong username and password";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
     <form class="form-signin" action="index.php" method="POST">
      <img class="mb-4" src="icon.png" alt="" width="200" height="200">
      <h1 class="h3 mb-3 font-weight-normal">Please Log In</h1>
      <label for="inputName" class="sr-only"></label>
      <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
         <br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
    </form>
  </body>
</html>
