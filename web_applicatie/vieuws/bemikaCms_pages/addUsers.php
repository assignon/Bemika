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
            <link rel="stylesheet" href="../bemika_cms/public/style/addUsers.css"/>
            <link rel="stylesheet" href="../bemika_cms/public/media/iconsMoons/style.css"/>
            <link rel="stylesheet" href="../bemika_cms/public/style/cms_sideBar.css"/>
            <link rel="stylesheet" href="../bemika_cms/public/style/topBar.css"/>
            <script src="../bemika_cms/public/javascript/addUsers.js"></script>
            <script src="../bemika_cms/public/javascript/cms_sideBar.js"></script>
            <script src="../bemika_cms/public/javascript/topBar.js"></script>
            <title>Bemika Cms</title>
        </head>

        <body>

              <header>

                  <?php   require "../bemika_cms/web_applicatie/vieuws/templates/topBar.php";?>

                  <div id="addUserContainer">


                       <?php require "../bemika_cms/web_applicatie/vieuws/templates/cms_sideBar.php";?>

                      <div id="rightSideBar">

                        <div id="boxes">

                            <form id="deleteCheck" action="" method="">

                                <span class="icon-cancel-circle"></span>
                                <p id="deleteCheck_error">are you sure you want to delete this user? Gives the password to delete it</p>
                                <input type="password" name="" placeholder="Password" id="deletePass">
                                <input type="submit" name="" value="Delete" id="delete_user">
                                <input type="submit" name="" value="" id="de_activate_user">

                            </form>




                            <div id="userRights">

                              <span class="icon-cancel-circle" id="rightsFormCancel"></span>

                              <p id="rightsError">Change the rights by clicking on the icons</p>

                               <div id="changeUser_right">

                               </div>


                               <form class="" action="" method="">

                                   <input type="password" name="" placeholder="Password" id="changeRights_pass">
                                   <input type="submit" name="" value="Change rights" id="change_rights_sub">

                               </form>


                            </div>

                        </div>


                        <div id="guestAllData">

                            <span class="icon-cancel-circle" id="userHistoryCloser"></span>

                            <div id="guestDataRights">

                              <div class="guestDataContainer">

                                  <p class="guestPersonal">Name:</p>
                                  <p class="guestPersonal">Username:</p>
                                  <p class="guestPersonal">Email:</p>
                                  <p class="guestPersonal">Department:</p>
                                  <p class="guestPersonal">Status:</p>

                              </div>

                              <div class="guestRightsContainer">

                                  <p class="guestRights">Can Update:</p>
                                  <p class="guestRights">Can Upload:</p>
                                  <p class="guestRights">Can Delete:</p>
                                  <p class="guestRights">Need Permission:</p>

                              </div>

                            </div>

                            <div class="dataRecovery">

                                <div class="recoveries">

                                    <p><span class="icon-spinner11"></span> Restore Username </p>
                                    <p id="recoverUsername"></p>

                                </div>

                                <div class="recoveries">

                                  <p><span class="icon-spinner11"></span> Restore Password </p>
                                  <p id="recoverPassword"></p>

                                </div>

                                <div class="recoveries">

                                  <p><span class="icon-spinner11"></span> Restore Username & Password </p>
                                  <p class="recoverUsername_Password">qwet4t</p>
                                  <p class="recoverUsername_Password">qy5356 6</p>

                                </div>

                            </div>

                        </div>


                        <div id="usersOption">

                            <p id="currentGuestName">Guest Name:</p>

                             <div class="optionsIcons" id="deleteCont">

                                 <span class="icon-bin"></span>
                                 <p>Delete</p>

                             </div>


                             <div class="optionsIcons" id="inactiveCont">

                                 <span class="icon-switch"></span>
                                 <p id="activeStatus"></p>

                             </div>


                             <div class="optionsIcons" id="historyCont">

                                 <span class="icon-history" id="userHistoryCaller"></span>
                                 <p>User History</p>

                             </div>


                             <div class="optionsIcons" id="rightsCont">

                                 <span class="icon-hammer"></span>
                                 <p>Change Rights</p>

                             </div>


                             <span class="icon-cancel-circle" id="cancelUsersOption"></span>

                        </div>


                        <div id="addUserForm">

                             <form action="" method="">

                                  <span class="icon-cancel-circle" id="addUserFormBack"></span>
                                  <!--<p id="addUserError">Add new users.</p>-->
                                  <input type="text" name="name" placeholder="Name" class="newUserData">
                                  <input type="email" name="email" placeholder="email" class="newUserData">
                                  <!--<input type="number" name="telnr" placeholder="Tel.nr">-->
                                  <select id="catagory" name="" required class="newUserData">

                                      <option value="">Choose a catagory</option>
                                      <option value="marketing">Marketing</option>

                                  </select>
                                  <div id="newCategoriesContainer">

                                      <input type="text" name="" placeholder="Add a category if it doesn't exist" id="categoryValue">
                                      <input type="submit" name="" value="Add" id="newCategory">

                                  </div>

                                  <p id="rules">Bepaal de rechten van de huidig gast gebruiker....</p>

                                  <div id="rigthContainer">

                                       <div class="rightsButt"> <span class="icon-spinner11"></span> <p class="rulesType">Update</p> <p class="status">(No)</p> </div>

                                       <div class="rightsButt"> <span class="icon-bin"></span> <p class="rulesType">Delete</p> <p class="status">(No)</p> </div>

                                       <div class="rightsButt"> <span class="icon-upload"></span> <p class="rulesType">Upload</p> <p class="status">(No)</p> </div>

                                       <div class="rightsButt"> <span class="icon-key2"></span> <p class="rulesType">Need permission</p> <p class="status" id="permis">(Yes)</p> </div>

                                  </div>

                                  <input type="submit" name="" value="Add Guest User" id="addNewUser">

                             </form>

                             <div id="explainBox">

                                 <p id="displayExplain">explaining</p>

                             </div>

                        </div>


                        <div id="superUser">

                             <div id="avatarName">

                                  <img src="../bemika_cms/public/media/<?php echo $userData['avatar'];?>" alt="" id="superUserAvatar">
                                  <p id="superUserName">Super user name</p>

                             </div>

                             <span class="icon-plus" id="addUserFormCaller"></span>

                        </div>


                        <div id="guestUserContainer">



                        </div>

                      </div>


                  </div>

              </header>



              <footer>



              </footer>

        </body>
  </html>
