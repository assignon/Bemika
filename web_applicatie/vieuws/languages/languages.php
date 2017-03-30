
  <link rel="stylesheet" href="languages.css"/>
  <script src="languages.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="iconsMoons/style.css"/>

  <?php

    require "language_model.php";
    $languages = new languages();
    $languages->addLanguage();

  ?>


<div id="langsGlobalcontainer">

      <div id="languageContainer">

          <img src="iconsMoons/IcoMoon-Free-master/PNG/64px/202-sphere.png" alt="" id="defaultLanguague">
          <span class="icon-cross" id="closeLanguage"></span>
          <span class="icon-plus" id="addLanguage"></span>
          <span class="icon-arrow-down2" id="langDropDown"></span>

      </div>


      <div id="langForm">

          <form id="addLangsForm" action="" method="" enctype="multipart/form-data">

              <span class="icon-cross" id="newLangsClose"></span>
              <p id="addLanguagesError">Add new language...</p>
              <input type="text" name="" placeholder="Language Name" class="addLangVal">
              <input type="file" name="langIcon" id="langIcon">
              <input type="submit" name="" value="Add" id="langAdded">

          </form>

          <div id="langs">

            <span class="icon-cross" id="chooseLangsClose"></span>
            <div id="langsReceiver">

            </div>

          </div>

      </div>

      <form action="" method="" class="essai">

        <input type="text" name="" placeholder="titel" id="titel_id">
        <textarea name="" rows="8" cols="80" id="content_id"></textarea>
        <input type="submit" name="" value="Add content" id="addContent">

      </form>

</div>
