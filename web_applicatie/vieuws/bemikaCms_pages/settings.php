<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8" />
            <meta name="keywords" content=""/>
            <meta name="description" content=""/>
            <meta name="author" content="Team avengers"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../public/iconsMoons/style.css"/>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
            <link rel="stylesheet" href="../bemika_cms/public/style/settings.css"/>
            <link rel="stylesheet" href="../bemika_cms/public/media/iconsMoons/style.css"/>
            <link rel="stylesheet" href="../bemika_cms/public/style/cms_sideBar.css"/>
            <link rel="stylesheet" href="../bemika_cms/public/style/topBar.css"/>
            <script src="../bemika_cms/public/javascript/settings.js"></script>
            <script src="../bemika_cms/public/javascript/cms_sideBar.js"></script>
            <script src="../bemika_cms/public/javascript/topBar.js"></script>
            <title>Bemika Cms</title>
        </head>

        <body>

              <header>

                  <?php   require "../bemika_cms/web_applicatie/vieuws/templates/topBar.php";?>

                  <div id="settingsContainer">


                       <?php require "../bemika_cms/web_applicatie/vieuws/templates/cms_sideBar.php";?>

                      <div id="settingsRightSideBar">

                           <div id="personalDataContainer">

                              <img src="" alt="" id="guestAvatar">

                              <div id="personalData">

                                  <p class="data">Name:</p>
                                  <p class="data">Email:</p>
                                  <p class="data">Department:</p>

                              </div>

                           </div>

                           <p id="userUpdateError">Update your personal data...</p>


                           <div id="editContainer">


                             <div class="inputsContainer">

                                 <p>Avatar</p>
                                 <input type="file" name="usersAvatar" id="usersAvatar">

                             </div>

                               <div class="inputsContainer">

                                   <p>Username</p>
                                   <input type="text" name="" class="inputValues">

                               </div>

                              
                               <div class="inputsContainer">

                                   <p>Email</p>
                                   <input type="email" name="" class="inputValues">

                               </div>

                               <div class="inputsContainer">

                                   <p>Password</p>
                                   <input type="password" name="" class="inputValues">

                               </div>

                               <div class="inputsContainer">

                                   <p>Enter current Password</p>
                                   <input type="password" name="" id="currentPass">

                               </div>

                               <input type="submit" name="" value="Update" id="updateUserData">

                           </div>

                      </div>

                  </div>

            </header>

            <footer>



            </footer>

      </body>

  </html>
