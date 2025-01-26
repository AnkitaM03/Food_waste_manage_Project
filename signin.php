<?php
session_start();
include 'connection.php';
// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
$msg=0;
if (isset($_POST['sign'])) {
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  $sql = "select * from login where email='$email'";
  $result = mysqli_query($connection, $sql);
  $num = mysqli_num_rows($result);

  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['gender'] = $row['gender'];
        header("location:home.html");
      } else {
        $msg = 1;
      }
    }
  } else {
    echo "<h1><center>Account does not exist</center></h1>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        body {
            background-image: url('11.png'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .regform {
            width: 300px; /* Width of the form */
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.7); /* Transparent background */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .logo {
            font-size: 22px;
            color: black;
        }

        #heading {
            font-size: 20px;
            color: black;
            padding-left: 1px;
        }

        .input input, .password input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #63707E;
        }

        .password {
            position: relative;
        }

        .password input {
            font-size: 18px;
        }

        .showHidePw {
            position: absolute;
            top: 50%;
            right: 5%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #595757;
            font-size: 18px;
        }

        .btn button {
            width: 100%;
            padding: 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .signin-up {
            font-size: 14px;
            color: black;
        }

        .signin-up a {
            color: #06C167;
            text-decoration: none;
        }

        .signin-up a:hover {
            text-decoration: underline;
        }

        .error {
            color: rgb(242, 18, 18);
            font-size: 16px;
            margin-top: 5px;
        }

        .error-icon {
            color: rgb(242, 18, 18);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="regform">
            <form action=" " method="post">
                <p class="logo">Food <b style="color:#06C167;">Donate</b></p>
                <p id="heading">Welcome back!</p>

                <div class="input">
                    <input type="email" placeholder="Email address" name="email" value="" required />
                </div>

                <div class="password">
                    <input type="password" placeholder="Password" name="password" id="password" required />
                    <i class="uil uil-eye-slash showHidePw"></i>

                    <?php
                    if ($msg == 1) {
                        echo '<i class="bx bx-error-circle error-icon"></i>';
                        echo '<p class="error">Password not match.</p>';
                    }
                    ?>
                </div>

                <div class="btn">
                    <button type="submit" name="sign">Sign in</button>
                </div>

                <div class="signin-up">
                    <p>Don't have an account? <a href="signup.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="login.js"></script>
    <script src="admin/login.js"></script>
</body>

</html>
