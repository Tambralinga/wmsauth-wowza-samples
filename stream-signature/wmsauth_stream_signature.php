<?php
$today = gmdate("n/j/Y g:i:s A");
$initial_url = "http://video.wmspanel.com/live/stream/playlist.m3u8";
$signed_stream = "live/stream";

$ip = $_SERVER['REMOTE_ADDR'];
$key = "defaultpassword";
$validminutes = 20;
$str2hash = $ip . $key . $today . $validminutes . $signed_stream;
$md5raw = md5($str2hash, true);
$base64hash = base64_encode($md5raw);
$urlsignature = "server_time=" . $today ."&hash_value=" . $base64hash. "&validminutes=$validminutes" . "&strm_len=" . strlen($signed_stream);
$base64urlsignature = base64_encode($urlsignature);
$signedurlwithvalidinterval = $initial_url . "?wmsAuthSign=$base64urlsignature"; 
?>
