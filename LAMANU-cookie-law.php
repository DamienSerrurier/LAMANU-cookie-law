<?php
/*
Plugin Name: LAMANU-cookie-law
Version: 0.1
Plugin URI: https://www.lamanu.fr
Description: WordPress Plugin for european cookie law.
Author: LA MANU
TotoAuthor URI: https://www.lamanu.fr
*/

// Ajout du menu Configuration dans la partie Admin dans le Back-office.
add_action('admin_init', 'register_settings');
add_action('admin_menu', 'LAMANU_admin');
// On charge dans la balise head la fonction LAMANU_scripts
add_action('wp_head', 'LAMANU_scripts');


function LAMANU_scripts()
{
  $dirUrl = plugin_dir_url(__FILE__) . "js/tarteaucitron.js-1.8.3/tarteaucitron.js";


  echo '<script type="text/javascript" src="'.$dirUrl.'"></script>

   <script type="text/javascript">
   tarteaucitron.init({
     "privacyUrl": "", /* Privacy policy url */

     "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
     "cookieName": "tarteaucitron", /* Cookie name */

     "orientation": "bottom", /* Banner position (top - bottom) */
                      
     "showAlertSmall": false, /* Show the small banner on bottom right */
     "cookieslist": true, /* Show the cookie list */
                      
     "showIcon": true, /* Show cookie icon to manage cookies */
     "iconPosition": "BottomRight", /* BottomRight, BottomLeft, TopRight and TopLeft */

     "adblocker": false, /* Show a Warning if an adblocker is detected */
                      
     "DenyAllCta" : true, /* Show the deny all button */
     "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
     "highPrivacy": true, /* HIGHLY RECOMMANDED Disable auto consent */
                      
     "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

    "removeCredit": false, /* Remove credit link */
     "moreInfoLink": true, /* Show more info link */

     "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */
     "useExternalJs": false, /* If false, the tarteaucitron.js file will be loaded */

     //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */
                     
     "readmoreLink": "", /* Change the default readmore link */

     "mandatory": true, /* Show a message about mandatory cookies */
   });
   </script>';

  echo '<script type="text/javascript" src="' . plugin_dir_url(__FILE__) . 'js/googleAnalytics.js"></script>';
}

function LAMANU_configuration()
{
  $dirPath = plugin_dir_path(__FILE__) . 'view/option.php';

  require_once($dirPath);
}

function LAMANU_admin()
{
  $pageTitle = 'Page gestions cookies';
  $menuTitle = 'Plugin gestions cookies';

  add_menu_page($pageTitle, $menuTitle, 'manage_options', 'Configuration', 'LAMANU_configuration');
}

function register_settings()
{
  register_setting('LAMANU_GoogleAnalytics', 'google_analytics');
}
