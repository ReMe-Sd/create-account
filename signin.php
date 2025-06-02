<?php

// session_start();
if(@$_COOKIE['login']=='yes'){
  echo'<meta http-equiv="refresh" content="3 , url=index.php"/>';
  exit();
}

require "connect.php";
global $connect;
mysqli_set_charset($connect,'utf8');

@$post01 = $_POST['get01'];
@$post02 = $_POST['get02'];
@$post03 = $_POST['get03'];


  if(isset($post03)){
    $a="SELECT * FROM user WHERE user_name = '$post01'";
    $a_run = mysqli_query($connect,$a);
    if(mysqli_num_rows($a_run)>'0'){
      $a_row = mysqli_fetch_array($a_run);
      $TokenUser = $a_row['user_token'];
      $PassUser = $a_row['user_password'];
      if($PassUser != $post02){
         $error = "<p class='style12'> عذرا كلمة المرور خاطئة </p>";

      }else{

       // $_SESSION['Token'] = $TokenUser;
       // $_SESSION['login'] = 'yes';

       setcookie('Token', $TokenUser ,time()+(86400),'/');  // 60 s * 60 m * 24 h = session the whole day for 24hr so we must caculate it in the seconds 
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
    }else{
      $error = "<p class='style12'> عذرا ليس هناك حساب </p>";
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
          <?php echo @$error; ?>
            <input name = "get01" class="style02" type = "text" placeholder = 'Username'/><i class="fa-solid fa-user style07"></i>
            <input name = "get02" class="style02" type = "password" placeholder = 'Password'/><i class="fa-solid fa-lock style08"></i>
         </div>
        <div class="style03">
            <div class="top" ><input name = "get03" class="style04" type = "submit" value ='Sign In'/></div>
            <div class="left" ><a class="style06" href='#'>Forger Password</a></div>
            <div class="right" ><a class="style05" href='signin.php'>Sign Up</a></div>
        </div>
    </form>
</body>
</html> 