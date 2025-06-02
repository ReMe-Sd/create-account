<?php

  //session_start();
  //unset($_SESSION['Token']);
  //unset($_SESSION['login']);
  //session_destroy();

    setcookie('Token', null ,-1,'/');  
    setcookie('login',null,-1,'/');

    
        echo '
        <link href="/Web--Course/style.css" rel="stylesheet"/>
        <div class = "style11">
        <img src="https://imgs.search.brave.com/JDeIxY8BGYXhEbjxpNOuK4J7rKVDjel00hQdFxBZoN8/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMudmV4ZWxzLmNv/bS9tZWRpYS91c2Vy/cy8zLzE1NzkzMi9p/c29sYXRlZC9wcmV2/aWV3Lzk1MWE2MTcy/NzI1NTNmNDllNzU1/NDhlMjEyZWQ5NDdm/LWN1cnZlZC1jaGVj/ay1tYXJrLWljb24u/cG5n">
        <p>تم تسجيل المغادرة بنجاح</p>
        </div>
        <meta http-equiv="refresh" content="3 , url=signin.php"/>
   ';
        exit();

?>