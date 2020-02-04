<?php require_once("incz/functions.php"); ?>
<?php
// FOR SOME REASON THAT I DON'T UNDERSTAND
// HAVING HARD TIME IMPLEMENTING SESSIONS IN ZEIT NOW
//    session_start();
//    if(isset($_SESSION['tempSess']) && ($_SESSION['tempSess'] === "tempSess"))
//    {
//        $_SESSION['done'] = "done";
//    }
//    else
//    {
//        redirect("/hi");
//    }
//?><!-- -->
<?php require("incz/brain.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('incz/metas.php'); ?>
    <meta name="description" content="Under Your Hood is a free service for anyone around the world. Under Your Hood gives you the information of your real ip. To know your real ip is so important. Under Your Hood will also give your proxy ip and your webhost ip. The UYH website will also give you your browser's name; your OS version; your platform name; and the locations of your ISP (internet service provider) location and name. If you want to know what your real IP is, Under Your Hood is the place to go." />

    <title>Under Your Hood | Real IP, ISP, OS and Browser Informaton</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/eff.css">
    <link rel="stylesheet" type="text/css" href="css/hi2.css">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/img/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script src="https://use.edgefonts.net/fredericka-the-great:n4:all;league-gothic:n4:all;six-caps:n4:all.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</head> 

<body>
   <?php include_once("incz/analyticstracking.php") ?> 
    <div id="opacityBackground"></div>
    <div id="opacityBackgroundAnnouncement"></div>
    <div id="developerBackground"></div>
    <div id="bodyContainer">
       <nav>
           <div id="navImg">
               <img src="img/uyh-logo.png" alt="Under Your Hood logo www.underyourhood.info">
           </div>
           <h1 style="font-size: 0px; color: transparent;">Under Your Hood - Your Real IP</h1>
       </nav>
    
       <div id="navExtension"></div>
       <div id="navExtension2"></div>
        <section id="finalOutputDiv">
           <div id="realIpTextDiv"></div>
           <div id="proxyIpTextDiv"></div>
           <div id="webHostIpTextDiv"></div>
            <p>
            <?php
                //All IPs
                echo '<span id="realIPText">' . $visitorRealIP . "</span>" . "<br><br>" . 
                     '<span id="proxyIPText">' . $proxyPublicIP . "</span>" . "<br><br>" .
                     '<span id="webHostIPText">' . $webHostIP . "</span>" . "<br><br>"; 
            ?>
            </p>
      </section>
      <section id="finalOutputDivLarge">
           <div class="realIpTextDivInline" id="realIpTextDiv"></div>
           <div class="realIpTextDivInline" id="proxyIpTextDiv"></div>
           <div class="realIpTextDivInline" id="webHostIpTextDiv"></div>
      </section>
      <section id="finalOutputDivLargeIPtexts">
          <p>
            <?php
                //All IPs
                echo '<span id="realIPText">' . $visitorRealIP . "</span>" . "<br><br>" . 
                     '<span id="proxyIPText">' . $proxyPublicIP . "</span>" . "<br><br>" .
                     '<span id="webHostIPText">' . $webHostIP . "</span>" . "<br><br>"; 
            ?>
            </p>
      </section>
      <ul id="IPtitles">
            <li><p id="Iptitles1">REAL IP</p></li>
            <li><p id="Iptitles2">PROXY IP</p></li>
            <li><p id="Iptitles3">HOST IP</p></li>
      </ul>
      <section id="firstBlock">
           <div class="firstBlockBox" id="box1a">
               <div id="box1aText">
                   <?php
                        echo $palatformImg;
                        echo '<p>' . $platform . '</p>'; 
                   ?>
                </div>
           </div>
           <div class="firstBlockBox" id="box1b">
               <div id="box1bText">
                   <?php
                        echo $versionImg;
                        echo '<p>' . $version . '</p>'; 
                   ?>
               </div>
           </div>
           <div class="firstBlockBox" id="box1c">
               <div id="box1cText">
                   <?php
                        echo $userBrowserImg;
                        echo '<p>' . $userBrowser . '</p>'; 
                   ?>
               </div>
           </div>
       </section>
       <section id="secondBlockMobile">
           <div class="secondBlockBoxMobile" id="boxMoba"> 
               <div id="boxMobaText">
                   <?php
                        echo '<div class="secondBlockMobileImageDiv"><img src="img/orig-isp-logo1.png"></div>';
                        // Let's limit characters in mobile view, let CSS handle the if condition through breakpoints
                        $mobileISPText = substr($queryISP,0,14);
                        $largeISPText = $queryISP;
                        echo '<p class="showOnMobile">' . $mobileISPText . '</p>';
                        echo '<p class="hideOnMobile">' . $largeISPText . '</p>';
                   ?>
                </div>
           </div>
           <div class="secondBlockBoxMobile" id="boxMobb">
               <div id="boxMobbText">
                   <?php
                        echo '<div class="secondBlockMobileImageDiv"><img id="regionImg" src="img/orig-region-logo.png"></div>';
                         // Let's limit characters in mobile view, let CSS handle the if condition through breakpoints
                        $mobileRegionText = substr($queryRegion,0,14);
                        $largeRegionText = $queryRegion;
                        echo '<p class="showOnMobile">' . $mobileRegionText . '</p>';
                        echo '<p class="hideOnMobile">' . $largeRegionText . '</p>';
                   ?>
               </div>
           </div>
           <div class="secondBlockBoxMobile" id="boxMobc">
               <div id="boxMobcText">
                   <?php
                        echo '<div class="secondBlockMobileImageDiv"><img id="timezoneImg" src="img/orig-timezone-logo1.png"></div>';
                         // Let's limit characters in mobile view, let CSS handle the if condition through breakpoints
                        $mobileTimezoneText = substr($queryTimezone,0,14);
                        $largeTimezoneText = $queryTimezone;
                        echo '<p class="showOnMobile">' . $mobileTimezoneText . '</p>';
                        echo '<p class="hideOnMobile">' . $largeTimezoneText . '</p>';
                   ?>
               </div>
           </div>
       </section>
      <section id="secondBlock">
           <div class="secondBlockBox" id="box2a">
               <div id="box2aText">
                   <?php
                        echo '<p>' . $queryISP . '</p>'; 
                   ?>
                </div>
           </div>
           <div class="secondBlockBox" id="box2b">
               <div id="box2bText">
                   <?php
                        echo '<p>' . $queryRegion . '</p>'; 
                   ?>
               </div>
           </div>
           <div class="secondBlockBox" id="box2c">
               <div id="box2cText">
                   <?php
                        echo '<p>' . $queryTimezone . '</p>'; 
                   ?>
               </div>
           </div>
       </section>
       <section id="thirdBlock">
           <?php
                echo $finalCountry;
                //echo '<span id="currencySymbol">'. $currencySymbol .'</span>';
           ?>
       </section>
     
   </div>
   
   <section id="greenArrow"><img src="img/orange-arrow.png" alt="Melodic Crypter Development"></section>
   <section id="developerInfo">
       <p id="developerClose">X</p>
       <p id="developerTitle">Designed and Developed by</p>
        <div id="developerImgHolder"><a href="http://www.hughcaluscusin.com" target="_blank" title="Melodic Crypter Development"><img class="introFadeIn introTime" id="mc-logo" src="img/melodic-crypter-logo.png" alt="Melodic Crypter - Hugh Caluscusin logo www.hughcaluscusin.com"></a></div>
   </section>

   <section class="" id="splash">
       <div class="intro-lead introFadeIn introTime">
           APP DEVELOPED BY
       </div>

       <div class="intro-img introFadeIn introTime"">
           <a href="https://www.hughcaluscusin.com" target="_blank">
               <img src="img/hc_logo.png" alt="Melodic Crypter Logo - Hugh Caluscusin">
           </a>
       </div>
   </section>
   
   <!--
   <section id="announcement">
      <span id="closeAnnouncement">X</span>
      <br><br><p style="text-align:left;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hello, </p>
      <p>Welcome to Under Your Hood.</p>
      <p>There are 3 IPs here: <br> REAL IP, PROXY IP and the HOST IP. <br><br>  The &nbsp; <em> <u>PROXY IP</u> </em> &nbsp; is the IP you need.</p>
    
   </section>-->
   
</body>
</html>