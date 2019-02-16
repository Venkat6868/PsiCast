<?php include './init.php'; ?>
<?php include './security.php'; ?>
<?php
$obj = new base_class;
if(isset($_POST['change_password'])){
    $current_password = $obj->security($_POST['current_password']);
    $new_password = $obj->security($_POST['new_password']);
    $retype_password = $obj->security($_POST['retype_password']);

    $current_status = $new_status = $retype_status = 1;

    if(empty($current_password)){
        $current_password_error = "Please Enter Current Password";
        $current_status = 0;
    }
    if(empty($new_password)){
        $new_password_error = "Please Enter New Password";
        $new_status = 0;
    }else if(strlen($new_password)<5){
        $new_password_error = "The Entered Password is too short..";
        $new_status = 0;
    }
    if(empty($retype_password)){
        $retype_password_error = "Please Enter Retype Password";
        $retype_status = 0;
    }else if(!($new_password==$retype_password)){
        $retype_password_error = "The passwords dosent Match";
        $retype_status = 0;
    }

    if(!empty($current_status) && !empty($new_status) && !empty($retype_status)){
        $user_id = $_SESSION['user_id'];
        if($obj->Normal_Query("SELECT password FROM users WHERE id=?",[$user_id])){
            $row = $obj->Single_Result();
            $db_password = $row->password;
            if(password_verify($current_password, $db_password)){
                if($obj->Normal_Query("UPDATE users SET password = ? WHERE id= ?",[password_hash($new_password,PASSWORD_DEFAULT),$user_id])){
                    $obj->Create_Session("password_updated","Your Password is updated Successfully!");
                    header("location:index.php");
                }

            }else{
                $current_password_error = "Please Enter Correct Password";
            }
        }
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <?php include './components/css.php'; ?>
</head>
<body>
<?php include './components/nav.php'; ?>

<div class="chat-container">
<?php include './components/sidebar.php'; ?>   
    
    <section id="right-area">

    <?php include './components/watch_live_video.php'; ?>

      
    </section><!-- Close of right-area -->


</div>
<?php include './components/js.php'; ?>
</body>

</html>
