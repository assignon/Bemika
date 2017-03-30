<?php



    function change_bgImage()
    {


      require "../upload_images.php";
      require "../pdo_connection.php";

          $pdo = pdo();

          //$file_name = 'updateBg';
          //$image_name = $_FILES['updateBg']['name'];
          $password = sha1($_GET['pass']);

          $select = $pdo->prepare("SELECT*FROM super_user WHERE password=?");
          $select->execute(array($password));
          $display = $select->fetch();

          if($password == $display['password'])
          {

             $uploadImage = uploadImages(

                   'updateBg',

                   "../../../../../bemika_cms/public/media/login_uploaded_images",

                    "30000000",

                    "UPDATE super_user SET background=? WHERE password=?",

                     array($_FILES['updateBg']['name'], $password),

                    "SELECT background FROM super_user WHERE password=?",

                    array($password)

                  );




                    echo "Image Uploaded...";

          }else{

              echo "Wrong password, try it again...";

          }

    }

    change_bgImage();

 ?>
