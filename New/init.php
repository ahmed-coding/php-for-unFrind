<?php

include 'connect.php';
//routes

$tpl  ='include/templates/';
$lang ='include/languages/';
$func ='include/functions/';
$css  ='layout/css/';
$js   ='layout/js/';



//include the important fils
 include $lang.'english.php';
 include $func.'functions.php';
 include $tpl.'header.php';
 
  
 //include navbar on all expect the one with $nonavbar varible
 if(!isset($nonavbar)){ include $tpl.'navbar.php';}
 
 
 
 
 
 
 