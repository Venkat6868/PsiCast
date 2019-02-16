<?php include './init.php'; ?>
<?php if(!isset($_SESSION['user_id'])): ?>

<?php header("location:login.php"); ?>
<?php endif; ?>
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

<?php if(isset($_SESSION['password_updated'])): ?>
<div class="flash success-flash">
    <span class="remove">&times;</span>
    <div class="flash-heading">
    <h3> <span class="checked">&#10004;</span> Success: You Have Done! </h3>
    </div><!-- close of flash heading-->
    <div class="flash-body">
    <p>You have successfully changed your password.! </p>
    </div><!--close of Flash Body -->
</div><!-- Close of Flash -->
<?php endif; ?>
<?php unset($_SESSION['password_updated']); ?>

<?php if(isset($_SESSION['username_updated'])): ?>
<div class="flash success-flash">
    <span class="remove">&times;</span>
    <div class="flash-heading">
    <h3> <span class="checked">&#10004;</span> Success: You Have Done! </h3>
    </div><!-- close of flash heading-->
    <div class="flash-body">
    <p>You have successfully changed your UserName.! </p>
    </div><!--close of Flash Body -->
</div><!-- Close of Flash -->
<?php endif; ?>
<?php unset($_SESSION['username_updated']); ?>


<!-- == Image Update == -->
<?php if(isset($_SESSION['image_updated'])): ?>
<div class="flash success-flash">
    <span class="remove">&times;</span>
    <div class="flash-heading">
    <h3> <span class="checked">&#10004;</span> Success: You Have Done! </h3>
    </div><!-- close of flash heading-->
    <div class="flash-body">
    <p><?php echo $_SESSION['image_updated']; ?></p>
    </div><!--close of Flash Body -->
</div><!-- Close of Flash -->
<?php endif; ?>
<?php unset($_SESSION['image_updated']); ?>

<!-- <div class="flash error-flash">
    <span class="remove">&times;</span>
    <div class="flash-heading">
    <h3> <span class="cross">&#x2715;</span> Success: You Have Done! </h3>
    </div>

    <div class="flash-body">
    <p>You have successfully changed your password.! </p>
    </div> -->

</div><!-- Close of Flash -->

<?php include './components/nav.php'; ?>
<div class="chat-container">
<?php include './components/sidebar.php'; ?>      
    <section id="right-area">
    <?php include './components/index_populate.php'; ?>
    </section><!-- Close of right-area -->
</div>
  <?php include './components/js.php'; ?>
</body>
</html>
