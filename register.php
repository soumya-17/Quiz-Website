<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Username cannot be blank";
    echo " error " . $username_err;
  } else {
    $sql = "SELECT id FROM users WHERE name = ?";
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set the value of param username
      $param_username = trim($_POST['username']);

      // Try to execute this statement
      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "This username is already taken";
          echo " error " . $username_err;
        } else {
          $username = trim($_POST['username']);
        }
      } else {
        echo "Something went wrong";
      }
    }
  }

  // mysqli_stmt_close($stmt);


  // Check for password
  if (empty(trim($_POST['password']))) {
    $password_err = "Password cannot be blank";
    echo " error " . $password_err;
  } elseif (strlen(trim($_POST['password'])) < 5) {
    $password_err = "Password cannot be less than 5 characters";
    echo " error " . $password_err;
  } else {
    $password = trim($_POST['password']);
  }

  // Check for confirm password field
  if (trim($_POST['password']) !=  trim($_POST['confirm_password'])) {
    $password_err = "Passwords should match";
    echo " error " . $password_err;
  }


  // If there were no errors, go ahead and insert into the database
  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
    $sql = "INSERT INTO users (name, password) VALUES (? , ?)";
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
      echo "<script>alert('Record Added Successfully');</script>";
    }

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "ss", $username, $password);

      // Set these parameters
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT);

      // Try to execute the query
      if (mysqli_stmt_execute($stmt)) {
        header("location: index.php");
      } else {
        echo "Something went wrong... cannot redirect!";
      }
    }
    // mysqli_stmt_close($stmt);
  }
  mysqli_close($db);
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
  <title>Register</title>
  <style>
    body {
      background-color: #0d0d0d;
    }

    #bg {
      background-image: url("https://t4.ftcdn.net/jpg/02/24/03/21/360_F_224032170_7PfrDJYWjCw4Rs1WFvhPkiSPuD02sw1q.jpg");
      width: 90%;
      height: 600px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      /* height: fit-content; */
      margin-left: 70px;
      font-weight: 700;
    }

    .container {
      color: greenyellow;
      margin-left: 350px;
      padding-top: 10px;
      width: fit-content;
    }

    input[type='text'],
    input[type='password'],
    input[name="confirm_password"] {
      width: 250px;
    }

    input[id="inputPassword4"],
    label[for="inputPassword4"] {
      margin-left: 20px;
    }

    label,
    p {
      font-size: 24px;
    }

    h1 {
      text-align: center;
      color: whitesmoke;
      padding-top: 60px;
      font-size: 3rem;
      margin-left: 12rem;
    }
  </style>

</head>

<body>
  <div id="bg">
    <h1>QUIZVILLA</h1>
    <div class="container mt-4">
      <h3>Please Register Here:</h3>
      <br>
      <form action="" method="post" onsubmit="alert('Record Added Successfully')">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Username</label>
            <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Username">
          </div>
          <br><br><br>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword">Confirm Password</label>
          <input type="password" class="form-control" name="confirm_password" id="inputPassword" placeholder="Confirm Password">
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>
        <br><br>
        <p>Already a User, <a href="index.php">Click Here</a> to Login</p>
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