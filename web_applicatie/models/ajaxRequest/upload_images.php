<?php

    //require "../pdo_connection.php";

    function uploadImages($file_name, $image_path, $imageSize, $update_query, $data, $displayImg_query, $display_data)
    {

        $pdo = pdo();

        if(!empty($_FILES[$file_name]))
          {

               $image_name = $_FILES[$file_name]['name'];
               $image_tmp = $_FILES[$file_name]['tmp_name'];
               $image_size = $_FILES[$file_name]['size'];

               $path = $image_path.'/'.$image_name;

               $valide_extention = array('.png','.jpg','.jpeg', '.JPG', '.JPEG', '.PNG');
               $upload_extention = strrchr($image_name,'.');

               if(in_array($upload_extention , $valide_extention))
               {

                 if($image_size <= $imageSize)
                 {

                   if(move_uploaded_file($image_tmp, $path))
                   {

                     $update = $pdo->prepare($update_query);

                      $update->execute($data);

                      $select = $pdo->prepare($displayImg_query);
                      $select->execute($display_data);
                      $display = $select->fetch();

                      return $display;


                   }else{

                      echo "An error has occurred, your image has not been uploaded, Retry please...";

                   }

                 }else{

                     echo "The size of your image should not exceed " .$imageSize. " octets...";

                 }

               }else{

                   echo "This extension is not allowed, the only permissions are png, jpg and jpeg...";

               }

          }else {

             echo "No picture has been selected, please choose one...";

          }

    }



 ?>
