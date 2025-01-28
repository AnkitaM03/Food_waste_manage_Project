<?php
include 'connection.php';
if(isset($_POST['sign']))
{
    $username=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];

    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sql="select * from login where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        echo "<h1><center>Account already exists</center></h1>";
    }
    else{
    $query="insert into login(name,email,password,gender) values('$username','$email','$pass','$gender')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
        header("location:signin.php");
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            background-image: url('p1.jpeg'); /* Replace with your image path */
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
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }

        .container .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .container .logo b {
            color: #e67e00;
        }

        .container .input, .container .password {
            margin-bottom: 15px;
            text-align: left;
        }

        .container .input label, .container .password label {
            font-size: 14px;
            font-weight: 600;
        }

        .container .input input, .container .password input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .container .password {
            position: relative;
        }

        .container .password .showHidePw {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .container .radio {
            text-align: left;
            margin-bottom: 20px;
        }

        .container .radio label {
            margin-right: 15px;
        }

        .container .btn button {
            width: 100%;
            padding: 10px;
            background-color:#e67e00;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
        }

        .container .btn button:hover {
            background-color: #04a356;
        }

        .container .signin-up {
            margin-top: 15px;
        }

        .container .signin-up a {
            color: #e67e00;
            text-decoration: none;
            font-weight: 600;
        }

        .container .signin-up a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="logo">Food <b>Donate</b></p>
        <form action="" method="post">
            <p id="heading">Create your account</p>
            <div class="input">
                <label class="textlabel" for="name">User name</label><br>
                <input type="text" id="name" name="name" required/>
            </div>
            <div class="input">
                <label class="textlabel" for="email">Email</label>
                <input type="email" id="email" name="email" required/>
            </div>
            <div class="password">
                <label class="textlabel" for="password">Password</label>
                <input type="password" name="password" id="password" required/>
                <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>
            </div>
            <div class="radio">
                <input type="radio" name="gender" id="male" value="male" required/>
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female">Female</label>
            </div>
            <div class="btn">
                <button type="submit" name="sign">Continue</button>
            </div>
            <div class="signin-up">
                <p style="font-size: 14px;">Already have an account? <a href="signin.php">Sign in</a></p>
            </div>
        </form>
    </div>
</body>
</html>
