<?php
include 'connect_server.php';

?>

<!DOCTYPE html>
<html>

<head>   
    <style>
        
        .box {
            padding: 5px;            
        }

        .img_up {
            position: absolute;
            max-width:100%;
            height:auto;
            top: 0px;
            right: 0px;          
        }

        .anime {
            background-color: #212529;
            animation-name: example;
            animation-duration: 4s;
            animation-iteration-count: infinite;
        }
        
        @keyframes example {
            0%   {background-color: #212529;}
            25%  {background-color: #c0c0c0;}
            50%  {background-color: #c0c0c0;}
            100% {background-color: #212529;}
        }
    </style>
</head>
<body>
<div class="card anime">
    <div class="box">
        <div class="img-fluid">
        <?php if($row['user_Level_costume']<1){ ?>
            <img class="img-fluid" src=image/avatar/BG/bg_1.png>
        <?php }else{ ?>
            <img class="img-fluid" src=image/avatar/BG/bg_<?= $row['user_Level_costume'] ?>.png>
        <?php } ?>
        <?php if($row['user_sex']=='ชาย'){ ?>
            <?php if($row['user_Level_costume']>1){?>
            <img class="img_up" src=image/avatar/aura/ar_man_<?= $row['user_Level_costume'] ?>.png>
            <?php } ?>
            <img class="img_up" src=image/avatar/person/man.png>
            <?php if($row['user_Level_costume']>0){?>
                <img class="img_up" src=image/avatar/costume/ct_man_<?= $row['user_Level_costume'] ?>.png>
            <?php }
                if($row['user_Level_weapon']>0){?>
            <img class="img_up" src=image/avatar/weapon/wp_man_<?= $row['user_Level_weapon'] ?>.png>
            <?php }
                if($row['user_Level_ring']>0){?>
            <img class="img_up" src=image/avatar/ring/r_man_<?= $row['user_Level_ring'] ?>.png>
            <?php } ?>
        <?php } ?>
        <?php if($row['user_sex']=='หญิง'){ ?>
            <?php if($row['user_Level_costume']>1){?>
            <img class="img_up" src=image/avatar/aura/ar_women_<?= $row['user_Level_costume'] ?>.png>
            <?php } ?>
            <img class="img_up" src=image/avatar/person/women.png>
            <img class="img_up" src=image/avatar/costume/ct_women_<?= $row['user_Level_costume'] ?>.png>
            <?php    if($row['user_Level_weapon']>0){?>
                <img class="img_up" src=image/avatar/weapon/wp_women_c<?= $row['user_Level_weapon'] ?>_w<?= $row['LV_weapon'] ?>.png>            
            <?php }
                if($row['user_Level_ring']>0){?>
            <img class="img_up" src=image/avatar/ring/r_women_<?= $row['user_Level_ring'] ?>.png>
            <?php } ?>
        <?php } ?>
        </div>        
    </div>
</div>
</body>

</html>