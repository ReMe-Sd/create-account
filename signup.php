<?php
// session_start();
if(@$_COOKIE['login']=='yes'){
    echo '<meta http-equiv="refresh" content="3 , url=index.php"/>';
}
require "connect.php";
global $connect;
mysqli_set_charset($connect,'utf8');

@$post01 = $_POST['get01'];
@$post02 = $_POST['get02'];
@$post03 = $_POST['get03'];
@$post04 = $_POST['get04'];
@$post05 = $_POST['get05'];

$token = date('ymdhms');
$rand = rand(100,500);
$new_token = $token.$rand;


if(isset($post05)){
     $reem = "INSERT INTO user (user_token , user_name , user_password , user_email , user_phone)VALUES('$new_token' , '$post01' , '$post02' , '$post03' , '$post04')";
     if(mysqli_query($connect,$reem)){

       // $_SESSION['Token'] = $NewToken;
       // $_SESSION['login'] = 'yes';

       setcookie('Token', $NewToken ,time()+(86400),'/');  // 60 s * 60 m * 24 h = session the whole day for 24hr so we must caculate it in the seconds 
       setcookie('login','yes',time()+(86400),'/');


        echo '
        <link href="/Web--Course/style.css" rel="stylesheet"/>
        <div class = "style11">
        <img src="https://imgs.search.brave.com/JDeIxY8BGYXhEbjxpNOuK4J7rKVDjel00hQdFxBZoN8/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMudmV4ZWxzLmNv/bS9tZWRpYS91c2Vy/cy8zLzE1NzkzMi9p/c29sYXRlZC9wcmV2/aWV3Lzk1MWE2MTcy/NzI1NTNmNDllNzU1/NDhlMjEyZWQ5NDdm/LWN1cnZlZC1jaGVj/ay1tYXJrLWljb24u/cG5n">
        <p>ThankYou Created Account Successfly!</p>
        </div>
        <meta http-equiv="refresh" content="3 , url=index.php"/>
';
        exit();
        
     }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="/Web--Course/style.css" rel="stylesheet"/>
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="fontawesome/css/brands.css" rel="stylesheet" />
    <link href="fontawesome/css/solid.css" rel="stylesheet" />
    <link href="fontawesome/css/sharp-thin.css" rel="stylesheet" />
    <link href="fontawesome/css/duotone-thin.css" rel="stylesheet" />
    <link href="fontawesome/css/sharp-duotone-thin.css" rel="stylesheet" />
    <link rel= "shorcut icon" href = "333.jpg" />
</head>
<body>
    <form method = "post" action = "">
         <div class="style01">
            <input name = "get01" class="style02" type = "text" placeholder = 'Username'/><i class="fa-solid fa-user style07"></i>
            <input name = "get02" class="style02" type = "password" placeholder = 'Password'/><i class="fa-solid fa-lock style08"></i>
            <input name = "get03" class="style02" type = "text" placeholder = 'Phone Number'/><i class="fa-solid fa-phone style07"></i>
            <input name = "get04" class="style02" type = "text" placeholder = 'Email'/><i class="fa-solid fa-envelope style07"></i>
         </div>
        <div class="style03">
            <div class="top" ><input name = "get05" class="style04" type = "submit" value ='Create account'/></div>
            <div class="left" ><a class="style06" href='#'>Forger Password</a></div>
            <div class="right" ><a class="style05" href='signin.php'>Sign In</a></div>
        </div>
    </form>
</body>
</html> 