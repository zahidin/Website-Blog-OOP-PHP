<?php
require_once 'core/init.php';

$statik = new Statik();
$ip = $statik->ip_user();
$browser = $statik->browser_user();
$os = $statik->os_user();
$page = basename($_SERVER['REQUEST_URI']);


if(! isset($_COOKIE['VISITOR']) ){

  $duration = time()+60*60*24;

  setcookie('VISITOR',$browser,$duration);

  $dateTime = date('Y-m-d/l H:i:s');

  $statik->insert_statik(array(
    'id' => '',
    'ip' => $ip,
    'os' => $os,
    'browser' => $browser,
    'page' => $page,
    'tgl_pengunjung' => $dateTime,
  ));
}
?>
