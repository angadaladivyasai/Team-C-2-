<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: loginindex.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login | ChatSpace</title>
    <link rel="stylesheet" href="css\register.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>

  <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert'>Email does not match</div>";
            }
        }
        ?>

    <div class="login-box">
      <h1>Login</h1>
      <form action="login.php" method="post">
        <label>Email</label>
        <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        <label>Password</label>
        <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        <input type="submit" value="Login" name="login" class="btn btn-primary">
      
       
        <closeform></closeform>
    </form>
    </div>
    <p class="para-2">
      Not have an account? <a href="register.php">Sign Up Here</a>
    </p>
  </body>
</html>

