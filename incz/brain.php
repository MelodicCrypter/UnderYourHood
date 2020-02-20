  <?php
    // MIT - HUGH CALUSCUSIN 2017-2020
    // GETTING ALL THE RIGHT IPs and OTHER STUFF by just using plain PHP:
    // I know there are libraries and tools that can be used but we
    // want to use plain method first and at least use 1 or 2 APIs/libraries
    // if we can.


    // Host's IP
    $webHostIP = gethostbyname(gethostname());

    // Proxy
    $proxyPublicIP = filter_var(getenv('REMOTE_ADDR'), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);

    // "Real" IP
    $visitorRealIP;
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $visitorRealIP = filter_var(getenv('HTTP_CLIENT_IP'), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $visitorRealIP = filter_var(getenv('HTTP_X_FORWARDED_FOR'), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    } elseif (!empty($_SERVER['HTTP_ORIGINAL_IP'])) {
        $visitorRealIP = filter_var(getenv('HTTP_ORIGINAL_IP'), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    } elseif (!empty($_SERVER['HTTP_X_REAL_IP'])) {
        $visitorRealIP = filter_var(getenv('HTTP_X_REAL_IP'), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }

    // Defaults
    if(!$visitorRealIP) {
        $visitorRealIP = "NA";
    }

    if(!$proxyPublicIP) {
        $proxyPublicIP = "NA";
    }

    if(!$webHostIP) {
        $webHostIP = "NA";
    }

    // GeoPlugin
    $geo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$visitorRealIP));
    // IP-API API variables
    $query = unserialize(file_get_contents('http://ip-api.com/php/'.$visitorRealIP));
    // GET the User String Agent
    $agent = $_SERVER['HTTP_USER_AGENT'];

    //PLATFORM or OS ------------------------------------------
    $platform = "";
    $palatformImg = "";
    $linuxPlat = preg_match('/Linux/',$agent);
    $linuxPlat2 = preg_match('/Android/',$agent);
    $windowsPlat = preg_match('/Windows/',$agent);
    if((isset($linuxPlat) && $linuxPlat == true) || (isset($linuxPlat2) && $linuxPlat2 == true)) 
    {
        $platform = 'Linux';
        $palatformImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/linux-logo.png"></div>' . "<br>";
    }
    elseif(isset($windowsPlat) && $windowsPlat == true) 
    {
        $platform = 'Windows';
        $palatformImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/windows-logo.png"></div>' . "<br>";
    }
    else{
        $platform = '<script type="text/javascript"> document.write(navigator.platform) </script>';
        $palatformImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/apple-logo.png"></div>' . "<br>";
    }
    
    //PLATFORM VERSION ---------------------------------------
    $version = "";
    $versionImg = "";

    //PLATFORM VERSION for LINUX and ANDROID
    $ubuntu = preg_match('/Ubuntu/',$agent);
    $linuxMint = preg_match('/Mint/',$agent);
    $debian = preg_match('/Debian/',$agent);
    $fedora = preg_match('/Fedora/',$agent);
    $redHat = preg_match('/Red Hat/',$agent);
    $suse = preg_match('/SUSE/',$agent);
    $mandriva = preg_match('/Mandriva/',$agent);
    $arch = preg_match('/Arch/',$agent);
    /*$eclair = preg_match('/Android 2.0/',$agent); // FROM ECLAIR TO JELLYBEAN SUPPORT IS DISCONTINUED
    $eclair2 = preg_match('/Android 2.1/',$agent);
    $froyo = preg_match('/Android 2.2/',$agent);
    $gingerbread = preg_match('/Android 2.3/',$agent);
    $honeycomb = preg_match('/Android 3.0/',$agent);
    $honeycomb2 = preg_match('/Android 3.1/',$agent)
    $honeycomb3 = preg_match('/Android 3.2/',$agent)
    $icecream = preg_match('/Android 4.0/',$agent);
    $jellybean = preg_match('/Android 4.1/',$agent);
    $jellybean2 = preg_match('/Android 4.2/',$agent);
    $jellybean3 = preg_match('/Android 4.3/',$agent);*/ //SUPPORT - DISCONTINUED
    $kitkat = preg_match('/Android 4.4/',$agent);
    $lollipop = preg_match('/Android 5.0/',$agent);
    $lollipop2 = preg_match('/Android 5.1/',$agent);
    $marshmallow = preg_match('/Android 6.0/',$agent);
    $nougat = preg_match('/Android 7.0/',$agent);
    $nougat2 = preg_match('/Android 7.1/',$agent);

    //PLATFORM VERSION for WINDOWS
    $windows10 = preg_match('/Windows NT 10/',$agent);
    $windows81 = preg_match('/Windows NT 6.3/',$agent);
    $windows8 = preg_match('/Windows NT 6.2/',$agent);
    $windows7 = preg_match('/Windows NT 6.1/',$agent);
    $windowsVista = preg_match('/Windows NT 6.0/',$agent);
    $windowsXPPro = preg_match('/Windows NT 5.2/',$agent);
    $windowsXP = preg_match('/Windows NT 5.1/',$agent);
    $windowsME = preg_match('/Windows 4.90/',$agent);
    $windows2000 = preg_match('/Windows NT 5.0/',$agent);
    $windows98 = preg_match('/Windows 4.10/',$agent);

    //PLATFORM VERSION for APPLE - MAC OS and iOS
    if(isset($agent))
    {
          // this statement is for firefox format instead of using _ firefox is using .
           if(preg_match('/Mac OS X 10.15/',$agent) ||
           preg_match('/Mac OS X 10.14/',$agent) ||
           preg_match('/Mac OS X 10.13/',$agent) ||
           preg_match('/Mac OS X 10.12/',$agent) ||
           preg_match('/Mac OS X 10.11/',$agent) ||
           preg_match('/Mac OS X 10.10/',$agent) ||
           preg_match('/Mac OS X 10.9/',$agent) ||
           preg_match('/Mac OS X 10.8/',$agent) ||
           preg_match('/Mac OS X 10.7/',$agent) ||
           preg_match('/Mac OS X 10.6/',$agent) ||
           preg_match('/Mac OS X 10.5/',$agent)
          )
        {
            // for Firefox  
           $catalina = preg_match('/Mac OS X 10.15/',$agent);
           $mojave = preg_match('/Mac OS X 10.14/',$agent);
           $highSierra = preg_match('/Mac OS X 10.13/',$agent);
           $sierra = preg_match('/Mac OS X 10.12/',$agent);
           $elCapitan = preg_match('/Mac OS X 10.11/',$agent);
           $yosemite = preg_match('/Mac OS X 10.10/',$agent);
           $mavericks = preg_match('/Mac OS X 10.9/',$agent);
           $mountainLion = preg_match('/Mac OS X 10.8/',$agent);
           $lion = preg_match('/Mac OS X 10.7/',$agent);
           $snowLeopard = preg_match('/Mac OS X 10.6/',$agent);
           $leopard = preg_match('/Mac OS X 10.5/',$agent);
        }
        elseif(preg_match('/Mac OS X 10_15/',$agent) ||
           preg_match('/Mac OS X 10_14/',$agent) ||
           preg_match('/Mac OS X 10_13/',$agent) ||
           preg_match('/Mac OS X 10_12/',$agent) ||
           preg_match('/Mac OS X 10_11/',$agent) ||
           preg_match('/Mac OS X 10_10/',$agent) ||
           preg_match('/Mac OS X 10_9/',$agent) ||
           preg_match('/Mac OS X 10_8/',$agent) ||
           preg_match('/Mac OS X 10_7/',$agent) ||
           preg_match('/Mac OS X 10_6/',$agent) ||
           preg_match('/Mac OS X 10_5/',$agent)
          )
        {
            // for Other browsers
            $catalina = preg_match('/Mac OS X 10_15/',$agent);
            $mojave = preg_match('/Mac OS X 10_14/',$agent);
            $highSierra = preg_match('/Mac OS X 10_13/',$agent);
           $sierra = preg_match('/Mac OS X 10_12/',$agent);
           $elCapitan = preg_match('/Mac OS X 10_11/',$agent);
           $yosemite = preg_match('/Mac OS X 10_10/',$agent);
           $mavericks = preg_match('/Mac OS X 10_9/',$agent);
           $mountainLion = preg_match('/Mac OS X 10_8/',$agent);
           $lion = preg_match('/Mac OS X 10_7/',$agent);
           $snowLeopard = preg_match('/Mac OS X 10_6/',$agent);
           $leopard = preg_match('/Mac OS X 10_5/',$agent);
        }
        else
        {
            // for iOS
            $iOS13 = preg_match('/OS 13/',$agent);
            $iOS12 = preg_match('/OS 12/',$agent);
            $iOS11 = preg_match('/OS 11/',$agent);
            $iOS10 = preg_match('/OS 10/',$agent);
            $iOS9 = preg_match('/OS 9/',$agent);
            $iOS8 = preg_match('/OS 8/',$agent);
            $iOS7 = preg_match('/OS 7/',$agent);
            $iOS6 = preg_match('/OS 6/',$agent);
            $iOS5 = preg_match('/OS 5/',$agent);
        }
    }

    // Process
    if(isset($ubuntu) && $ubuntu == true) 
    {
        $version = 'Ubuntu';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/ubuntu-logo.png"></div>' . "<br>";
    }
    elseif(isset($linuxMint) && $linuxMint == true) 
    {
        $version = 'Linux Mint';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/mint-logo.png"></div>' . "<br>";
    }
    elseif(isset($debian) && $debian == true) 
    {
        $version = 'Debian';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/debian-logo.png"></div>' . "<br>";
    }
    elseif(isset($fedora) && $fedora == true) 
    {
        $version = 'Fedora';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/fedora-logo.png"></div>' . "<br>";
    }
    elseif(isset($redHat) && $redHat == true) 
    {
        $version = 'Red Hat';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/redhat-logo.png"></div>' . "<br>";
    }
    elseif(isset($suse) && $suse == true) 
    {
        $version = 'Suse';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/suse-logo.png"></div>' . "<br>";
    }
    elseif(isset($mandriva) && $mandriva == true) 
    {
        $version = 'Mandriva';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/mandriva-logo.png"></div>' . "<br>";
    } 
    elseif(isset($arch) && $arch == true) 
    {
        $version = 'Arch';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/arch-logo.png"></div>' . "<br>";
    }
    elseif(isset($slackware) && $slackware == true) 
    {
        $version = 'Slackware';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/slackware-logo.png"></div>' . "<br>";
    }
    elseif(isset($windows10) && $windows10 == true) 
    {
        $version = 'Windows 10';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/windows10-logo.png"></div>' . "<br>";
    }
    elseif(isset($windows81) && $windows81 == true) 
    {
        $version = 'Windows 8.1';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/windows-logo.png"></div>' . "<br>";
    }
    elseif(isset($windows8) && $windows8 == true) 
    {
        $version = 'Windows 8';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/windows-logo.png"></div>' . "<br>";
    }
    elseif(isset($windows7) && $windows7 == true) 
    {
        $version = 'Windows 7';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/windows-logo.png"></div>' . "<br>";
    }
    elseif(isset($windowsVista) && $windowsVista == true) 
    {
        $version = 'Win Vista';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/windows-logo.png"></div>' . "<br>";
    }
    elseif(isset($windowsXPPro) && $windowsXPPro == true) 
    {
        $version = 'XP Pro';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/windows-logo.png"></div>' . "<br>";
    }
    elseif(isset($windowsXP) && $windowsXP == true) 
    {
        $version = 'Windows XP';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/windows-logo.png"></div>' . "<br>";
    }   
    elseif(isset($windowsME) && $windowsME == true) 
    {
        $version = 'Windows ME';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/windows-logo.png"></div>' . "<br>";
    }
    elseif(isset($windows2000) && $windows2000 == true) 
    {
        $version = 'Win 2000';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/windows-logo.png"></div>' . "<br>";
    }
    elseif(isset($windows98) && $windows98 == true) 
    {
        $version = 'Windows 98';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/windows-logo.png"></div>' . "<br>";
    }
    elseif(isset($catalina) && $catalina == true)
    {
        $version = 'Catalina';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/catalina-logo.png"></div>' . "<br>";
    }

    elseif(isset($mojave) && $mojave == true)
    {
        $version = 'Mojave';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/mojave-logo.png"></div>' . "<br>";
    }
    elseif(isset($highSierra) && $highSierra == true)
    {
        $version = 'High Sierra';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/highsierra-logo.png"></div>' . "<br>";
    }
    elseif(isset($sierra) && $sierra == true)
    {
        $version = 'Sierra';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/sierra-logo.png"></div>' . "<br>";
    }
    elseif(isset($elCapitan) && $elCapitan == true) 
    {
        $version = 'El Capitan';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/elcapitan-logo.png"></div>' . "<br>";
    }
    elseif(isset($yosemite) && $yosemite == true) 
    {
        $version = 'Yosemite';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/yosemite-logo.png"></div>' . "<br>";
    }
    elseif(isset($mavericks) && $mavericks == true) 
    {
        $version = 'Mavericks';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/mavericks-logo.png"></div>' . "<br>";
    }
    elseif(isset($mountainLion) && $mountainLion == true) 
    {
        $version = 'Mountain Lion';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/mountain-lion-logo.png"></div>' . "<br>";
    }
    elseif(isset($lion) && $lion == true) 
    {
        $version = 'Lion';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/lion-logo.png"></div>' . "<br>";
    }
    elseif(isset($snowLeopard) && $snowLeopard == true) 
    {
        $version = 'Snow Leopard';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/snowLeopard-logo.png"></div>' . "<br>";
    }
    elseif(isset($leopard) && $leopard == true) 
    {
        $version = 'Leopard';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/leopard-logo.png"></div>' . "<br>";
    }
    elseif(isset($iOS13) && $iOS13 == true)
    {
        $version = 'iOS 13';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/ios13-logo.png"></div>' . "<br>";
    }
    elseif(isset($iOS12) && $iOS12 == true)
    {
        $version = 'iOS 12';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/ios12-logo.png"></div>' . "<br>";
    }
    elseif(isset($iOS11) && $iOS11 == true)
    {
        $version = 'iOS 11';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/ios11-logo.png"></div>' . "<br>";
    }
    elseif(isset($iOS10) && $iOS10 == true) 
    {
        $version = 'iOS 10';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/ios10-logo.png"></div>' . "<br>";
    }
    elseif(isset($iOS9) && $iOS9 == true) 
    {
        $version = 'iOS 9';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/ios9-logo.png"></div>' . "<br>";
    }
    elseif(isset($iOS8) && $iOS8 == true) 
    {
        $version = 'iOS 8';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/ios8-logo.png"></div>' . "<br>";
    }
    elseif(isset($iOS7) && $iOS7 == true) 
    {
        $version = 'iOS 7';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/ios7-logo.png"></div>' . "<br>";
    }
    elseif(isset($iOS6) && $iOS6 == true) 
    {
        $version = 'iOS 6';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/ios6-logo.png"></div>' . "<br>";
    }
    elseif(isset($iOS5) && $iOS5 == true) 
    {
        $version = 'iOS 5';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/ios5-logo.png"></div>' . "<br>";
    }
    elseif(isset($kitkat) && $kitkat == true) 
    {
        $version = 'KitKat';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/android-logo.png"></div>' . "<br>";
    }
    elseif((isset($lollipop) && $lollipop == true) || (isset($lollipop2) && $lollipop2 == true)) 
    {
        $version = 'Lollipop';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/android-logo.png"></div>' . "<br>";
    }
    elseif(isset($marshmallow) && $marshmallow == true) 
    {
        $version = 'Marshmallow';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/android-logo.png"></div>' . "<br>";
    }
    elseif((isset($nougat) && $nougat == true) || (isset($nougat2) && $nougat2 == true)) 
    {
        $version = 'Nougat';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/android-logo.png"></div>' . "<br>";
    }
    else
    {
        $version = ' Unknown ';
        $versionImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/not-available.png"></div>' . "<br>";
    }

    // BROWSERS ------------------------------------------------
    $userBrowser = "";
    $userBrowserImg = "";
    $otherBrowser = "";
    $agentLength = strlen($agent);
    $firefoxBrowser = preg_match('/Firefox/',$agent);
    $firefoxMobBrowser = preg_match('/FxiOS/',$agent);
    $safariBrowser = preg_match('/Safari/',$agent);
    $chromeBrowser = preg_match('/Chrome/',$agent);
    $criOSChrome = preg_match('/CriOS/',$agent);
    $edgeBrowser = preg_match('/Edge/',$agent);
    $operaMobBrowser = preg_match('/OPiOS/',$agent);
    $operaBrowser = preg_match('/OPR/',$agent);
    $ieBrowser = preg_match('/Trident/',$agent);
    $ieBrowser2 = preg_match('/MSIE/',$agent);
    $ieBrowser3 = preg_match('/Internet Explorer/',$agent); 
    if(isset($edgeBrowser) && $edgeBrowser == true) 
    {
        $userBrowser = 'Edge';
        $userBrowserImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/edge-logo.png"></div>' . "<br>";
    }
    elseif((isset($chromeBrowser) && $chromeBrowser == true) || (isset($criOSChrome) && $criOSChrome == true)) 
    {
        $userBrowser = 'Chrome';
        $userBrowserImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/chrome-logo.png"></div>' . "<br>";
    }
    elseif((isset($firefoxBrowser) && $firefoxBrowser == true) || (isset($firefoxMobBrowser) && $firefoxMobBrowser == true)) 
    {
        $userBrowser = 'Firefox';
        $userBrowserImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/firefox-logo.png"></div>' . "<br>";
    }
    elseif((isset($operaBrowser) && $operaBrowser == true) || (isset($operaMobBrowser) && $operaMobBrowser == true)) 
    {
        $userBrowser = 'Opera';
        $userBrowserImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/opera-logo.png"></div>' . "<br>";
    }
    elseif((isset($ieBrowser) && $ieBrowser == true) || (isset($ieBrowser2) && $ieBrowser2 == true) || (isset($ieBrowser3) && $ieBrowser3 == true)) 
    {
        $userBrowser = 'IE';
        $userBrowserImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/ie-logo.png"></div>' . "<br>";
    }
    elseif(isset($safariBrowser) && $safariBrowser == true) 
    {
        $userBrowser = 'Safari';
        $userBrowserImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/safari-logo.png"></div>' . "<br>";
    }
    else
    {
        $userBrowser = '<script type="text/javascript"> document.write(navigator.appCodeName) </script>';
        $userBrowserImg = '<div class="boxImagesContainer"><img class="boxImages" id="box1bImg" src="img/browser.png"></div>' . "<br>";
    }

    // OTHER QUERIES FROM API's ------------------------------------------------
     if(isset($geo))
     {
       // $currencyCode = $geo["geoplugin_currencyCode"];       // CURRENCY
        $currencySymbol = $geo["geoplugin_currencySymbol"] ;    // CURRENCY SYMBOL
     }
     else
     {
         $currencySymbol = "?";
     }

     // OTHER: Was planning to put a flag at the top-right corner
    // but haven't implemented it yet...
    // Anyway, $query is the result of IP-API
    if($query && $query['status'] == 'success') 
    {
        if(isset($query['country']))
        {
            $finalCountry = "";
            $queryCountry = $query['country'];         // COUNTRY -- used for the Flag class
            
            if($queryCountry === "United Kingdom")
            {
                $finalCountry = '<img src="img/flags/gb.svg">';
            }
            elseif($queryCountry === "Philippines")
            {
                $finalCountry = '<img src="img/flags/ph.svg">';
            }
            elseif($queryCountry === "United States")
            {
                $finalCountry = '<img src="img/flags/us.svg">';
            }
            else{
                $finalCountry = '<img src="img/flags/generic.png">';
            }
        }
        else
        {
            $queryCountry = "Unknown";
        }

        // City
        if(isset($query['city']))
        {
            $queryCity = $query['city'] . "<br>";               // CITY
        }
        else
        {
            $queryCity = "Unknown";
        }

        // Region
        if(isset($query['regionName']))
        {
            $queryRegion = $query['regionName'] . "<br>";       // REGION NAME
        }
        else
        {
            $queryRegion = "Unknown";
        }
        
        if(isset($query['isp']))
        {
            $queryISP = $query['isp'] . "<br>";                 // ISP
        }
        else
        {
            $queryISP = "Unknown";
        }
        
        if(isset($query['timezone']))
        {
            $queryTimezone = $query['timezone'] . "<br>";       // TIMEZONE
            $testssss = $queryTimezone;
        }
        else
        {
            $queryTimezone = "Unknown";
        }
    } 
    else 
    {
      $query = 'Unknown';
    }

    //END

