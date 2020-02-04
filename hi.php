<?php require_once("incz/functions.php"); ?>
<?php
//    session_start();
//    $_SESSION['tempSess'] = 'tempSess';
//
//    if(isset($_SESSION['done']) && ($_SESSION['done'] === 'done'))
//    {
//        // if the user has already visited through SESSION, redirect to home
//        redirect("/i");
//    }
//?><!-- -->
 
<html>
<head>
    <?php include('incz/metas.php'); ?>
    <meta name="description" content="Under Your Hood is a free service for anyone around the world. Under Your Hood give you the information of your real ip. To know your real ip is so important. Under Your Hood will also give your proxy ip and your webhost ip. The UYH website will also give you your browser's name; your OS version; your platform name; and the locations of your ISP (internet service provider) location and name. If you want to know what your real IP is, Under Your Hood is the place to go." />

    <title>Under Your Hood | Real IP, ISP, OS and Browser Informaton</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/hi.css">
    <link rel="icon" href="img/favicon-32x32.png?" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script src="https://use.edgefonts.net/six-caps:n4:all.js"></script>
    <script src="https://use.edgefonts.net/lekton:n7,i4,n4:all.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            //App Intro then redirects to Greetings
            setTimeout(function() {
            window.location.href = "/i"
            }, 3800);

            //disable right click momentarily
            window.oncontextmenu = function () {
               return false;
            }
        }); 
    </script>
   
</head>

<body>
    <section class="introFadeIn introTime" id="splash">
      
       <div class="intro-lead">
           APP DEVELOPED BY
       </div>
       
        <div class="intro-img">
            <a href="https://www.hughcaluscusin.com" target="_blank">
                <img src="img/hc_logo.png" alt="Melodic Crypter Logo - Hugh Caluscusin">
            </a>
        </div>
        
    </section>
    
</body>
</html>