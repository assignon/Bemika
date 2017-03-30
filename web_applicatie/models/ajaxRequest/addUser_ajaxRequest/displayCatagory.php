<?php

    require "../pdo_connection.php";

    function displayCatagory()
    {

          $pdo = pdo();

          $category_name = htmlspecialchars($_GET['categoryVal']);

          $select_category = $pdo->prepare("SELECT department_name FROM departments WHERE department_name=?");
          $select_category->execute(array($category_name));

          $display_categories = $select_category->fetch();


             ?>

               <option value="<?php echo $display_categories['department_name'];?>"><?php echo $display_categories['department_name'];?></option>

                

             <?php


    }

    displayCatagory();

 ?>
