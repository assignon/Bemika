window.addEventListener("load", function(){


   var User_Name = document.getElementById("User_Name");
   var topBarOptionContainer = document.getElementById("topBarOptionContainer");
   var closeUserOption = document.getElementById("closeUserOption");


   User_Name.addEventListener("click", function(){

       $(function(){

            $(topBarOptionContainer).animate({

               bottom: -55,

            },{

                duration: 700,
                easing: "easeOutBack",

            })

       })

   })


   closeUserOption.addEventListener("click", function(){

       $(function(){

            $(topBarOptionContainer).animate({

               bottom: 100,

            },{

                duration: 700,
                easing: "easeInOutBack",

            })

       })

   })

})
