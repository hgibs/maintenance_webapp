<?php

// Check for a completed configuration php file
  $manychecks = True;

  if(strcmp("",$servername)==0) {
    $manychecks = False;
  } elseif(strcmp("",$username)==0) {
    $manychecks = False;
  } elseif(strcmp("",$password)==0) {
    $manychecks = False;
  } elseif(strcmp("",$dbname)==0) {
    $manychecks = False;
  } elseif(strcmp("",$sqlport)==0) {
    $manychecks = False;
  } elseif(strcmp("",$pwddbname)==0) {
    $manychecks = False;
  }
  
  if((not $manychecks) or $debuglocal){
    //uh oh - some configs are blank and we aren't in local testing mode
    die("Configuration file is incomplete!! Please contact the site administrator!");
  }

?>