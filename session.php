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

   $sql = "SELECT * from `user` WHERE user_username='$user_check'";
   $result = $conn->query($sql);
   $row_for_eho = mysqli_fetch_array($result);
   $set_user_login = $row_for_eho['user_username'];

?>