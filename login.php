<?php
include 'connect_server.php';
include 'set_style.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $password = hash('sha1', $_POST['password']);
    $mypassword = mysqli_real_escape_string($db,$password); 
    
    $sql = "SELECT `ID_user` FROM `user` WHERE `user_username` = '$myusername' and `user_password` = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
      
    if($count == 1) {
        session_regenerate_id();
        $_SESSION['login_user'] = $myusername;
       
        header("location: AllPlayyerForAdmin");
    }else {
        echo '<script type ="text/JavaScript">';
        echo 'alert("Username หรือ Password กรอกผิด กรุณากรอกใหม่")';
        echo '</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="background-all text-warning">
    <?php include 'menu_no_user.php'; ?>
    <div class="container">
        <br>
        <br>
        <div align = "center">
            <div class="card" style="background-color: #212529; width: 18rem;">
                <div class="card-body">
                <div class="card-title" style = "padding:3px;"><b>Login</b></div>
                    
                <div style = "margin:30px">
                
                    <form action = "" method = "post">
                        <div class="form-group">
                            <label class="login">UserName  :</label>
                            <input type = "text" name = "username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password  :</label>
                            <input type = "password" name = "password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <br>
                        <button type = "submit" class="btn btn-warning">Submit</button>
                    </form>
                        
                </div>
                    
            </div>
                
            </div>
            <br>
            
        </div>
    </div>
</body>
<?php include 'footer_no_user.php'; ?>

</html>