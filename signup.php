    <?php
    include "init.php";
    $obj = new base_class;

    if(isset($_POST['signup'])){
        $full_name = $obj->security($_POST['fullname']);
        $email= $obj->security($_POST['email']);
        $password = $obj->security($_POST['password']);
        $mobile   = $obj->security($_POST['mobile']);



        $name_status = $email_status = $password_status = $mobile_status = 1;

        if(empty($full_name)){
            $name_error = "Full Name is Required..!";
            $name_status = "";
        }

        if(empty($email)){
            $email_error = "Email is Required..!";
            $email_status = "";
        } else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $email_error="Invalid Email Format";
                $email_status = "";
            } else{
                if($obj->Normal_Query("SELECT email FROM users WHERE email = ?",array($email))){
                    if($obj->Count_Rows()==0){

                    }else{
                        $email_error="Emaild Already Exists";
                        $email_status = "";
                    }
                }
            }
        }

        if(empty($password)){
            $password_error = "Password is Required";
            $password_status = "";
        }elseif(strlen($password)<5){
            $password_error = "Password is Too Short";
            $password_status = "";
        }

        if(empty($mobile)){
            $mobile_error = "Mobile is Required..!";
            $mobile_status = "";
        } else{
            
                if($obj->Normal_Query("SELECT mobile FROM users WHERE mobile = ?",array($mobile))){
                    if($obj->Count_Rows()==0){

                    }else{
                        $mobile_error="mobile Already Exists";
                        $mobile_status = "";
                    }
                }
            
        }

        if(!empty($name_status) && !empty($email_status) && !empty($password_status) && !empty($mobile_status)){
            $status = 0;
            if($obj->Normal_Query("INSERT INTO users (name,email,password,mobile,status) VALUES (?,?,?,?,?)",[$full_name,$email,$password,$mobile,$status])){
                $obj->Create_session("account_success","Your Account is created Successfully");
                header("location:login.php");
                
            }
        }else{
            echo "error";
        }


    }

    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crate An Account Today..!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include './components/css.php'; ?>
</head>
<body>

<div class = "signup-container">

<div class="account-left">
<div class="account-text">

<img src="./assets/logos/comb.png" />
</div><!-- Close of Account Text-->

<div class="join-psi">
<h1> Join the Largest Student Platform, PsiCast!</h1>
</div><!-- close of Join Psi Cast-->
</div> <!-- Close of Account left -->

<div class="account-right">
<?php include './components/signup_form.php'; ?>
      


</div> <!-- Close of Account Right -->

</div> <!-- Close of SignUp - Container -->

<script src="./assets/js/file-label.js"></script>
<?php include './components/js.php'; ?>
</body>
</html>