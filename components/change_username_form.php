<div class="form-section">
            <div class="form-grid">
            <form method = "POST" action ="" >
        <div class="group">
        <h2 class="form-heading">CHANGE USERNAME</h2>
        </div><!--Close Group -->

        
        <div class="group">
            <input type="text" name = "user_name" class ="control" placeholder="Enter New Username" value="<?php echo $_SESSION["user_name"];  ?>" >
            <div class = "name-error error">
            <?php if(isset($user_error)):     ?>

            <?php echo $user_error; ?>

            <?php endif; ?>

        </div> <!-- close of name-error -->
        </div><!--Close Group -->
        
      
        

        
        <div class="group">
            <input type="submit" name = "change_name" value="SAVE CHANGES" class ="btn account-btn">
        </div><!--Close Group -->

        

        </form> 
            
            </div><!-- Close of Form- Grid-->

        </div><!--Close of For Grid -->
