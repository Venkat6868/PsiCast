<?php 
include "../init.php";
$obj = new base_class;
if(isset($_GET['message'])){
    $user_id = $_SESSION['user_id'];
    if($obj->Normal_Query("SELECT clean_message_id FROM clean WHERE clean_user_id = ?",[$user_id])){
        $last_msg_row = $obj->Single_Result();
        $last_msg_id = $last_msg_row->clean_message_id;

        $obj->Normal_Query("SELECT msg_id FROM messages ORDER BY msg_id DESC LIMIT 1");
        $msg_row = $obj->Single_Result();
        $msg_table_id = $msg_row->msg_id;

        $obj->Normal_Query("SELECT * FROM messages INNER JOIN users ON messages.user_id = users.id WHERE messages.msg_id BETWEEN $last_msg_id AND $msg_table_id ORDER BY messages.msg_id ASC");
        
        if($obj->Count_Rows() == 0){
            echo "Lets Start Conversation to your Friends !";
        }else{

            $messages_row = $obj->fetch_all();

            foreach($messages_row as $informations):
                $full_name =  ucwords($informations->name);
                $user_image = $informations->image;
                $user_status = $informations->status;

                $message = $informations->message;
                $msg_type = $informations->msg_type;
                $db_user_id = $informations ->user_id;
                $msg_time = $obj->time_ago($informations->msg_time);

                if($user_status == 0){
                    $user_online_status = '<span class="offline-icon"></span>'; 
                }else{
                    $user_online_status = '<span class="online-icon"></span>';
                }

                if($db_user_id == $user_id){
                    // RIGHT USER

                    if($msg_type == "text"){

                        echo '<div class="right-messages common-margin">
                        <div class="right-msg-area">
                        <span class="date-time right-time">
                        <span class="send-msg">&#10004;</span> '.$msg_time.'
                            </span><!-- close of date time-->
                            <div class="right-msg">
                                <p> '.$message.' </p>
        
                            </div><!-- close of right-msg -->
        
        
                        </div><!--close right-smg-area-->
        
                    </div><!-- Close of Right messages-->';

                    }else if($msg_type == "jpg" || $msg_type == "JPG" || $msg_type == "JPEG" || $msg_type == "jpeg"){

                        echo '<div class="right-messages common-margin">
                        <div class="right-msg-area">
                        <span class="date-time right-time right-message-time">
                        '.$msg_time.'
                            </span><!-- close of date time-->
                            <div class="right-files">
                            <img src = "assets/files/'.$message.'" class="common-images">      
                        
                            </div><!-- close of right-msg -->
        
        
                        </div><!--close right-smg-area-->
        
                    </div><!-- Close of Right messages-->';

                    } else if($msg_type == "PNG" || $msg_type == "png"){

                        echo '<div class="right-messages common-margin">
                        <div class="right-msg-area">
                        <span class="date-time right-time right-message-time">
                        '.$msg_time.'
                            </span><!-- close of date time-->
                            <div class="right-files">
                            <img src = "assets/files/'.$message.'" class="common-images" >      
                        
                            </div><!-- close of right-msg -->
        
        
                        </div><!--close right-smg-area-->
        
                    </div><!-- Close of Right messages-->';

                    }else if($msg_type == "zip" || $msg_type == "ZIP"){

                        echo '<div class="right-messages common-margin">
                        <div class="right-msg-area">
                        <span class="date-time right-time right-message-time">
                        '.$msg_time.'
                            </span><!-- close of date time-->
                            <div class="right-files">
                           <a href="assets/files/'.$message.'" class = "all-files"><i class= "fas fa-arrow-circle-down files-common"></i>'.$message.'</a>  
                        
                            </div><!-- close of right-msg -->
        
        
                        </div><!--close right-smg-area-->
        
                    </div><!-- Close of Right messages-->';

                    }else if($msg_type == "PDF" || $msg_type == "pdf"){

                        echo '<div class="right-messages common-margin">
                        <div class="right-msg-area">
                        <span class="date-time right-time right-message-time">
                        '.$msg_time.'
                            </span><!-- close of date time-->
                            <div class="right-files">
                           <a href="assets/files/'.$message.'" class = "all-files"><i class= "far fa-file-pdf pdf files-common"></i>'.$message.'</a>  
                        
                            </div><!-- close of right-msg -->
        
        
                        </div><!--close right-smg-area-->
        
                    </div><!-- Close of Right messages-->';                       

                    }else if($msg_type == "emoji"){

                        echo '<div class="right-messages common-margin">
                        <div class="right-msg-area">
                        <span class="date-time right-time right-message-time">
                        '.$msg_time.'
                            </span><!-- close of date time-->
                            <div class="right-files">
                            <img src = "'.$message.'" class="animated-emoji" >      
                        
                            </div><!-- close of right-msg -->
        
        
                        </div><!--close right-smg-area-->
        
                    </div><!-- Close of Right messages-->';

                    }else if($msg_type == "docx"){

                        echo '<div class="right-messages common-margin">
                        <div class="right-msg-area">
                        <span class="date-time right-time right-message-time">
                        '.$msg_time.'
                            </span><!-- close of date time-->
                            <div class="right-files">
                           <a href="assets/files/'.$message.'" class = "all-files"><i class= "far fa-file-word word files-common"></i>'.$message.'</a>  
                        
                            </div><!-- close of right-msg -->
        
        
                        </div><!--close right-smg-area-->
        
                    </div><!-- Close of Right messages-->';      

                    }else if($msg_type == "xlsx"){

                        echo '<div class="right-messages common-margin">
                        <div class="right-msg-area">
                        <span class="date-time right-time right-message-time">
                        '.$msg_time.'
                            </span><!-- close of date time-->
                            <div class="right-files">
                           <a href="assets/files/'.$message.'" class = "all-files"><i class= "far fa-file-excel word files-common"></i>'.$message.'</a>  
                        
                            </div><!-- close of right-msg -->
        
        
                        </div><!--close right-smg-area-->
        
                    </div><!-- Close of Right messages-->';      

                    }

                }else{

                    // LEFT USER

                    if($msg_type == "text"){

                  echo '<div class="left-message">
                        <div class="sender-img-block">
                           <img src="assets/img/'.$user_image.'" class="sender-img" >
                        '.$user_online_status.'                            
                        </div> <!--close of sender-img-block -->
                        <div class="left-msg-area common-margin">
                            <div class="user-name-date">
                            <span class="sender-name">
                              '.$full_name.'
                            </span> <!-- close of sender-name-->
                            <span class="date-time">
                            '.$msg_time.'
                            </span><!-- close of date time-->
                            
                            </div><!-- user name date-->
                        <div class="left-msg">
                                <p> '.$message.' </p>
        
                        </div><!--close left msg -->
                        </div><!-- left msg area-->
        
                    </div><!-- Close of LEFT-MESSAGE--> ';
                    }else if($msg_type == "jpg" || $msg_type == "JPG" || $msg_type == "JPEG" || $msg_type == "jpeg"){

                        echo '<div class="left-message">
                        <div class="sender-img-block">
                           <img src="assets/img/'.$user_image.'" class="sender-img" >
                        '.$user_online_status.'                            
                        </div> <!--close of sender-img-block -->
                        <div class="left-msg-area common-margin">
                            <div class="user-name-date">
                            <span class="sender-name">
                              '.$full_name.'
                            </span> <!-- close of sender-name-->
                            <span class="date-time">
                            '.$msg_time.'
                            </span><!-- close of date time-->
                            
                            </div><!-- user name date-->
                        <div class="left-files">
                        <img src = "assets/files/'.$message.'" class="common-images">
        
                        </div><!--close left msg -->
                        </div><!-- left msg area-->
        
                    </div><!-- Close of LEFT-MESSAGE--> ';

                    } else if($msg_type == "PNG" || $msg_type == "png"){

                        
                        echo '<div class="left-message">
                        <div class="sender-img-block">
                           <img src="assets/img/'.$user_image.'" class="sender-img" >
                        '.$user_online_status.'                            
                        </div> <!--close of sender-img-block -->
                        <div class="left-msg-area common-margin">
                            <div class="user-name-date">
                            <span class="sender-name">
                              '.$full_name.'
                            </span> <!-- close of sender-name-->
                            <span class="date-time">
                            '.$msg_time.'
                            </span><!-- close of date time-->
                            
                            </div><!-- user name date-->
                        <div class="left-files">
                        <img src = "assets/files/'.$message.'" class="common-images">
        
                        </div><!--close left msg -->
                        </div><!-- left msg area-->
        
                    </div><!-- Close of LEFT-MESSAGE--> ';

                    }else if($msg_type == "zip" || $msg_type == "ZIP"){

                        
                        echo '<div class="left-message">
                        <div class="sender-img-block">
                           <img src="assets/img/'.$user_image.'" class="sender-img" >
                        '.$user_online_status.'                            
                        </div> <!--close of sender-img-block -->
                        <div class="left-msg-area common-margin">
                            <div class="user-name-date">
                            <span class="sender-name">
                              '.$full_name.'
                            </span> <!-- close of sender-name-->
                            <span class="date-time">
                            '.$msg_time.'
                            </span><!-- close of date time-->
                            
                            </div><!-- user name date-->
                        <div class="left-files">
                        <a href="assets/files/'.$message.'" class = "all-files"><i class= "fas fa-arrow-circle-down files-common"></i>'.$message.'</a>  
                        
        
                        </div><!--close left msg -->
                        </div><!-- left msg area-->
        
                    </div><!-- Close of LEFT-MESSAGE--> ';

                    }else if($msg_type == "PDF" || $msg_type == "pdf"){

                        echo '<div class="left-message">
                        <div class="sender-img-block">
                           <img src="assets/img/'.$user_image.'" class="sender-img" >
                        '.$user_online_status.'                            
                        </div> <!--close of sender-img-block -->
                        <div class="left-msg-area common-margin">
                            <div class="user-name-date">
                            <span class="sender-name">
                              '.$full_name.'
                            </span> <!-- close of sender-name-->
                            <span class="date-time">
                            '.$msg_time.'
                            </span><!-- close of date time-->
                            
                            </div><!-- user name date-->
                        <div class="left-files">
                        <a href="assets/files/'.$message.'" class = "all-files"><i class= "far fa-file-pdf pdf files-common"></i>'.$message.'</a>  
                        
        
                        </div><!--close left msg -->
                        </div><!-- left msg area-->
        
                    </div><!-- Close of LEFT-MESSAGE--> ';

                    }else if($msg_type == "emoji"){
                        echo '<div class="left-message">
                        <div class="sender-img-block">
                           <img src="assets/img/'.$user_image.'" class="sender-img" >
                        '.$user_online_status.'                            
                        </div> <!--close of sender-img-block -->
                        <div class="left-msg-area common-margin">
                            <div class="user-name-date">
                            <span class="sender-name">
                              '.$full_name.'
                            </span> <!-- close of sender-name-->
                            <span class="date-time">
                            '.$msg_time.'
                            </span><!-- close of date time-->
                            
                            </div><!-- user name date-->
                        <div class="left-files">
                        <img src = "'.$message.'" class="animated-emoji" >     
        
                        </div><!--close left msg -->
                        </div><!-- left msg area-->
        
                    </div><!-- Close of LEFT-MESSAGE--> ';

                    }else if($msg_type == "docx"){

                        echo '<div class="left-message">
                        <div class="sender-img-block">
                           <img src="assets/img/'.$user_image.'" class="sender-img" >
                        '.$user_online_status.'                            
                        </div> <!--close of sender-img-block -->
                        <div class="left-msg-area common-margin">
                            <div class="user-name-date">
                            <span class="sender-name">
                              '.$full_name.'
                            </span> <!-- close of sender-name-->
                            <span class="date-time">
                            '.$msg_time.'
                            </span><!-- close of date time-->
                            
                            </div><!-- user name date-->
                        <div class="left-files">
                        <a href="assets/files/'.$message.'" class = "all-files"><i class= class= "far fa-file-word word files-common"></i>'.$message.'</a>  
                        
        
                        </div><!--close left msg -->
                        </div><!-- left msg area-->
        
                    </div><!-- Close of LEFT-MESSAGE--> ';

                    }else if($msg_type == "xlsx"){

                        echo '<div class="left-message">
                        <div class="sender-img-block">
                           <img src="assets/img/'.$user_image.'" class="sender-img" >
                        '.$user_online_status.'                            
                        </div> <!--close of sender-img-block -->
                        <div class="left-msg-area common-margin">
                            <div class="user-name-date">
                            <span class="sender-name">
                              '.$full_name.'
                            </span> <!-- close of sender-name-->
                            <span class="date-time">
                            '.$msg_time.'
                            </span><!-- close of date time-->
                            
                            </div><!-- user name date-->
                        <div class="left-files">
                        <a href="assets/files/'.$message.'" class = "all-files"><i class= "far fa-file-excel word files-common"></i>'.$message.'</a>  
                        
        
                        </div><!--close left msg -->
                        </div><!-- left msg area-->
        
                    </div><!-- Close of LEFT-MESSAGE--> ';

                    }


                     
                }
            
            endforeach;

        }
       
       

    }
}

?>