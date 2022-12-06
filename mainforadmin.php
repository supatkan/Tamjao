<?php
include 'connect_server.php';
include('sessionforadmin.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php include 'menu_for_admin.php'; ?>
    <br>
    <div>
        <h2><b>ForAdmin</b></h2>
        user คือ <?php echo "$set_user_login"; ?><br>
        <br>
    </div>
</body>
<?php include 'footer_for_admin.php'; ?>
</html>