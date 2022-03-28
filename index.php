<?php
session_start();

require_once "config.php";

$username = "";
$password = "";
$err = "";
$hashed_password = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
    $err = "Please enter username + password";
    echo $err;
  } else {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  }

  if (empty($err)) {
    $sql = "SELECT name, password FROM users WHERE name = ? ";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    // mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Try to execute this statement
    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_store_result($stmt);
      if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $username, $password);
        if (mysqli_stmt_fetch($stmt)) {
          if (password_verify($password, $hashed_password)) {
            // session_start();
            $_SESSION["name"] = $username;
            $_SESSION["loggedin"] = true;
            header("location: homepage.php");
          }
        }
      } 
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Login</title>
  <style>
    body {
      background-color: #0d0d0d;
    }

    #bg {
      background-image: url("https://t4.ftcdn.net/jpg/03/45/88/07/360_F_345880772_zIT2mkdCzTthplO7xqaGGrMspN0jw0ll.jpg");
      width: 1100px;
      height: 600px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      /* height: fit-content; */
      margin-left: 230px;
      /* margin-top: 10px; */
      font-weight: 700;
    }

    .container {
      color: gold;
      margin-left: 300px;
      padding-top: 50px;
    }

    input[type='text'],
    input[type='password'] {
      width: 50%;
    }

    label,
    p {
      font-size: 24px;
      width: fit-content;
    }

    h1 {
      text-align: center;
      color: whitesmoke;
      /* padding-top: 10px; */
      font-size: 3rem;
      margin-left: -50px;
    }
  </style>
</head>

<body>

  <div id="bg">
    <h1>QUIZVILLA</h1>
    <div class="container mt-4">
      <h2>Please Login Here:</h2>
      <!-- <hr> -->
      <br>
      <form action="" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
        <br><br>
        <p>New to the Site, <a href="register.php">Click Here</a> to Register</p>
      </form>



    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>