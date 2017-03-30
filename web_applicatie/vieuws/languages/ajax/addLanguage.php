<?php

    require "bd_connection.php";

    function addLanguage()
    {

       $pdo = pdo();

       $lang_name = htmlspecialchars($_GET['langName']);
       $file_name = 'langIcon';



       if(!empty($_FILES['langIcon']))
         {

              $image_name = $_FILES['langIcon']['name'];
              $image_tmp = $_FILES['langIcon']['tmp_name'];
              $image_size = $_FILES['langIcon']['size'];

              $path = 'lang_icons/'.$image_name;

              $valide_extention = array('.png','.jpg','.jpeg', '.JPG', '.JPEG', '.PNG');
              $upload_extention = strrchr($image_name,'.');

              if(in_array($upload_extention , $valide_extention))
              {

                if($image_size <= 100000)
                {

                  if(move_uploaded_file($image_tmp, $path))
                  {

                       $selectLang = $pdo->prepare("SELECT*FROM languages WHERE languages_name=?");
                       $selectLang->execute(array($lang_name));
                       $langCount = $selectLang->rowCount();



                       if($langCount == 0)
                       {

                           $selectLangImg = $pdo->prepare("SELECT*FROM languages WHERE languages_icon=?");
                           $selectLangImg->execute(array($image_name));
                           $langCountImg = $selectLangImg->rowCount();

                           if($langCountImg == 0)
                           {

                             $insert = $pdo->prepare("INSERT INTO languages(languages_name, languages_icon) VALUES(?,?)");

                              $insert->execute(array($lang_name, $image_name));

                              echo "Languages is added";

                           }else{

                              echo "This language icon already exist";

                           }


                       }else{

                          echo "This language already exist..."  ;

                       }


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

    addLanguage();

 ?>
