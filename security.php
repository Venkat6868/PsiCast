<?php if(!isset($_SESSION['user_id'])): ?>
<?php $obj = new base_class;
$obj->Create_Session("security","Sorry First You need to Login"); ?>
<?php header("location:login.php") ?>
<?php endif; ?>