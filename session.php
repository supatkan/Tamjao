<?php
   include('connect_sever.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select 'user_username' from 'user' where 'user_username' = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['user_username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login");
      die();
   }
?>