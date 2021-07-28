<?php
date_default_timezone_set('America/Los_Angeles');

/* 
  If the p "parameter" is missing, print "The pixel is live"
  else log the value in the p parameter in pixel.log.
  ie. https://myserver.com/path/to/pixel.php?p=mypixel

  Make sure to only use https for the pixel:
  https://proofjump.com/blog/chrome-update-blocks-non-https-images-in-email/
*/

$p = @$_REQUEST['p'];
if(!$p){
  die("The pixel is live!");
}

log_request();

// https://stackoverflow.com/questions/3203354/php-script-to-render-a-single-transparent-pixel-png-or-gif/3203394
header('Content-type: image/gif');
header('Cache-Control: no-cache, no-store, must-revalidate');
die(hex2bin('47494638396101000100900000ff000000000021f90405100000002c00000000010001000002020401003b'));

// Log the request if p is set
function log_request(){
  // You may need to pre-create pixel.log and set writable permissions
  $logfile = "pixel.log";

  $p = @$_REQUEST['p'];
  $date = new DateTime();
  $dateval =  $date->format('Y-m-d H:i:s');
  $ip = @$_SERVER['REMOTE_ADDR']; // Remove IP address
  $agent = @$_SERVER['HTTP_USER_AGENT']; // User Agent
  $referer = @$_SERVER['HTTP_REFERER']; // Referer

  $list = [$dateval, $p, $ip, $agent, $referer];

  $file = fopen($logfile,"a");
  fputcsv($file,$list);
  fclose($file);
}

?>
