<?php

     require "../pdo_connection.php";

     function addNewCatagory()
     {

         $pdo = pdo();

         $category_name = htmlspecialchars($_GET['categoryVal']);

         $select_category = $pdo->prepare("SELECT department_name FROM departments WHERE department_name=?");
         $select_category->execute(array($category_name));

         $countCategory = $select_category->rowCount();

         if($countCategory == 0)
         {

              $insert_category = $pdo->prepare("INSERT INTO departments(department_name) VALUES(?)");
              $insert_category->execute(array($category_name));
              echo "The new category is succesful added...";

         }else{

            echo "This category is already existe";

         }


     }

     addNewCatagory();

 ?>
