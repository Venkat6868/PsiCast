<div class="form-area">
    <form method = "POST" action ="" enctype = "multipart/form-data">
        <div class="group">
        <h2 class="form-heading">CREATE AN ACCOUNT ON PsiCast</h2>
        </div><!--Close Group -->
       

        <div class="group">
            <input type="text" name = "fullname" class ="control" placeholder="Enter Your FullName.!" value="<?php if(isset($full_name)):echo $full_name; endif; ?>">
        <div class = "name-error error">
            <?php if(isset($name_error)):     ?>

            <?php echo $name_error; ?>

            <?php endif; ?>

        </div> <!-- close of name-error -->
        
        </div><!--Close Group -->
        <div class="group">
            <input type="email" name = "email" class ="control" placeholder="Enter Your Email ID .!" value="<?php if(isset($email)):echo $email; endif; ?>" >
            <div class = "name-error error">
            <?php if(isset($email_error)):     ?>

            <?php echo $email_error; ?>

            <?php endif; ?>

        </div> <!-- close of name-error -->

        </div><!--Close Group -->
        <div class="group">
            <input type="password" name = "password" class ="control" placeholder="Enter Password..!" value="<?php if(isset($password)):echo $password; endif; ?>">
            <div class = "name-error error">
            <?php if(isset($password_error)):     ?>

            <?php echo $password_error; ?>

            <?php endif; ?>

        </div> <!-- close of name-error -->
        </div><!--Close Group -->
     
        <div class="group">
            <input type="number" name = "mobile" class ="control" placeholder="+91" value="<?php if(isset($mobile)):echo $mobile; endif; ?>">
            <div class = "name-error error">
            <?php if(isset($mobile_error)):     ?>

            <?php echo $mobile_error; ?>

            <?php endif; ?>

        </div> <!-- close of name-error -->
        </div><!--Close Group -->
     
        <div class="group">
            <input type="submit" name = "signup" value="Create Account" class ="btn account-btn">
        </div><!--Close Group -->

        <div class="group">
            <a href="login.php" class="link" >Already Have an Account?</a>
        </div><!--cose of group-->

    </form> 

    </div> <!-- Close of Form Area-->