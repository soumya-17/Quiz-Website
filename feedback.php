<?php
$servername = "sql12.freemysqlhosting.net";
$username = "sql12387426";
$password = "Kgysz8h12M";
$dbname = "sql12387426";
$db = new mysqli($servername, $username, $password, $dbname);

// if($db->connect_error)
// {
//     die("connection failed" . $db->connect_error);
// }
// echo " connected successfully";

$name = $category = $feed = "";
$name_err = $category_err = $feed_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST")  //$_SERVER ..super global variable which holds information about headers, paths, and script locations.
{

    $sql = "SELECT * FROM users WHERE name = ?";
    $stmt = mysqli_prepare($db, $sql);

    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $feed = trim($_POST['feed']);   //$_POST= super global variable which is used to collect form data after submitting an HTML form with method="post"


    if (empty($name_err) && empty($category_err) && empty($feed_err)) {
        $sql = "INSERT INTO feeds (name, cat , fb) VALUES (? , ? , ?)"; // table name = feeds .....columns = name , cat , fb
        $stmt = mysqli_prepare($db, $sql); //mysqli_prepare() function prepares an SQL statement for execution,
        // if ($stmt) {
        //     echo " DONE " . " ";
        // }
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $name, $category, $feed); // mysqli_stmt_bind_param() function is used to bind variables to the parameter markers of a prepared statement.
            // i.e ) values of(?) are here
            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) //query is executed
            {
                //   echo "FEEDBACK RECORDED"; //if it is successfully executed this will be displayed
                header("location: homepage.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        }
    }
    mysqli_close($db); // close the db connection
}
