<div class="form-section">
            <div class="form-grid">
            <form method = "POST" action ="" enctype="multipart/form-data">
        <div class="group">
        <h2 class="form-heading">CHANGE PHOTO</h2>
        </div><!--Close Group -->

        
        <div class="group">
           <label for="change-image" id="change-image-label"></label>
           <input type="file" name="change_img" id="change-image" class="change-img">
           <div class = "name-error error">
            <?php if(isset($img_error)):     ?>

            <?php echo $img_error; ?>

            <?php endif; ?>

        </div> <!-- close of name-error -->
        </div><!--Close Group -->
        
      
        

        
        <div class="group">
            <input type="submit" name = "change_img" value="SAVE CHANGES" class ="btn account-btn">
        </div><!--Close Group -->

        

        </form> 
            
            </div><!-- Close of Form- Grid-->

        </div><!--Close of For Grid -->
