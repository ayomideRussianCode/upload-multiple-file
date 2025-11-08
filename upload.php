<?php

if($_SERVER ['REQUEST_METHOD'] == 'POST'){

       $upload_dir = "uploads/";

       // creates uploads directory
       if(!is_dir ($upload_dir)){
        mkdir($upload_dir, 0777, true);
       }

foreach($_FILES['files']['name'] as $key => $file_name){
        $file_tmp = $_FILES['files']['tmp_name'][$key];
        $file_size= $_FILES['files']['size'][$key];
        $file_error = $_FILES['files']['error'][$key];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $target_file = $upload_dir. basename($file_name);

        //upload-err-ok instead of 0
        if($file_error === UPLOAD_ERR_OK){
                // checks for size

                if($file_size > 5 * 1024 * 1024){
                        echo "Error too big";
                }
                 //checks for file type
                elseif(!in_array($file_type, ['jpg', 'jpeg', 'png', 'gif', 'pdf'])){
                        echo "Error file type  $file_name is not allowed";
                }
                //checks for upload
                else{
                        if(move_uploaded_file($file_tmp, $target_file)){
                                echo "File:  {$file_name} uploaded successfully <br> <br>";
                        } else{
                                echo "Error: There was a time issue uploading $file_name <br>";
                        }
                }
                //checking for errors
        }else{
                echo "Error : File $file_name failed to upload due to error $file_error <br> <br>";
        }
}

// for loop
}else {
        echo "No files were uploaded";
}