<?php

// Check for a completed configuration php file
  $manychecks = True;

  if(strcmp("",$servername)==0) {
    $manychecks = False;
  } elseif(strcmp("",$dbusername)==0) {
    $manychecks = False;
  } elseif(strcmp("",$dbpassword)==0) {
    $manychecks = False;
  } elseif(strcmp("",$dbname)==0) {
    $manychecks = False;
  } elseif(strcmp("",$sqlport)==0) {
    $manychecks = False;
  } elseif(strcmp("",$pwddbname)==0) {
    $manychecks = False;
  }
  
  if(!$manychecks){
    //uh oh - some configs are blank and we aren't in local testing mode
    die("Configuration file is incomplete!! Please contact the site administrator!");
  }

?>