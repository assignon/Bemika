<div id="sideBarcontainer">

      <!--<form action="" method="" id="searchForm">

          <input type="search" name="" placeholder="Search..." id="search">
          <span class="icon-search"></span>

      </form>-->

      <!--<div id="avatarContainer">

          <img src="" alt="" id="superUserAvatar">
          <p id="superUserName">Milos Despovotic</p>

      </div>-->


      <div id="menuContainer">

           <a href=""><p id="dash"><img src="../bemika_cms/public/media/dashboard.png" class="icon-meter">DashBoard</p></a>
           <a href=""><p class="menus">Home</p></a>
           <a href=""><p class="menus">Notifications</p></a>
           <a href=""><p class="menus">Taks</p></a>
           <a href=""><p class="menus">Statistcs</p></a>

      </div>

           <a href="" id="pageLink"><p id="page"><img src="../bemika_cms/public/media/article.png" class="icon-files-empty">Pages</p></a>

           <!--<div id="pages">

             <a href=""><p class="bemikaPage"><span class="icon-files-empty"></span>Bemika Movie</p></a>
             <a href=""><p class="bemikaPage"><span class="icon-files-empty"></span>Bemika Software</p></a>
             <a href=""><p class="bemikaPage"><span class="icon-files-empty"></span>Bemika Music</p></a>
             <a href=""><p class="bemikaPage"><span class="icon-files-empty"></span>Bemika Sport</p></a>

           </div>-->



      <div id="parameters">

           <div id="admins">

                <img src="../bemika_cms/public/media/guestAvatar.png" alt="" id="adminsAvatar">
                <p id="adminsName">Super User</p>

           </div>

           <a href="../bemika_cms/bemika.php?bemika=settings&id=<?php echo $_SESSION['id'];?>&user=<?php echo $_GET['user'];?>"><p id="settings"><img src="../bemika_cms/public/media/settings.png" class="icon-cog">Settings</p></a>

      </div>

</div>
