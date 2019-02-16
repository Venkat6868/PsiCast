<?php include './init.php'; ?>
<?php include './security.php'; ?>
<?php 
$obj = new base_class;
if(isset($_POST['change_img'])){
    $img_name = $_FILES['change_img']['name'];
    $img_tmp = $_FILES['change_img']['tmp_name'];
    $img_path = "./assets/img";
    $extensions = ['jpg','jpeg','png'];
    $img_ext = explode(".",$img_name);
    $img_extensions = end($img_ext);

    if(empty($img_name)){
        $img_error = "Please Choose an Image";
    }else if(!in_array($img_extensions,$extensions)){
        $image_error = "Invalid Image";
       }else{
           $user_id = $_SESSION['user_id'];
           move_uploaded_file($img_tmp, "$img_path/$img_name");
           if($obj->Normal_Query("UPDATE users SET image =? WHERE id =?",[$img_name, $user_id])){
               $obj->Create_Session("image_updated","Your Photo is Updated Successfully..!");
               $obj->Create_Session("image_name",$img_name);
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

    <?php include './components/change_image_form.php'; ?>
       

    </section><!-- Close of right-area -->


</div>
<?php include './components/js.php'; ?>
</body>

</html>