<?php include './init.php'; ?>
<?php include './security.php'; ?>
<?php 
$obj = new base_class;
if(isset($_POST['change_name'])){
    $user_name = $obj->security($_POST['user_name']);
    $name_status = 1;
    
    if(empty($user_name)){
        $user_error = "Please Enter UserName";
        $name_status = 0;
    }

    if(!empty($name_status)){
        $user_id = $_SESSION['user_id'];
        if($obj->Normal_Query("UPDATE users SET name = ? WHERE id= ?",[$user_name,$user_id])){
            $obj->Create_Session("user_name",$user_name);
            $obj->Create_Session("username_updated","Your Username is updated Successfully!");
            header("location:index.php");
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
    <?php include './components/css.php' ?>
</head>
<body>
<?php include './components/nav.php'; ?>

<div class="chat-container">
<?php include './components/sidebar.php'; ?>
    <section id="right-area">

    <?php include './components/change_username_form.php'; ?>
       

    </section><!-- Close of right-area -->


</div>
<?php include './components/js.php'; ?>
</body>

</html>
