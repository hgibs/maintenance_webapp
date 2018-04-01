<?php

function get_hash($pwd){
//   $options = [
//     'cost' => 11,
//     'salt' => $salt,
//   ];
  
//   $pwdcode = password_hash($pwd, PASSWORD_DEFAULT, $options);
  $pwdcode = password_hash($pwd, PASSWORD_DEFAULT);
  //salt is auto generated and stored in returned hash now (php7.0)
  return $pwdcode;
}

function gen_user($username, $password, $mysqli, $msg) {
  // $password = $_POST['password'];
  if(strlen($password) < 8){
    $msg = "given password was too short";
    return false;
  }

  //create new user to admin someone's maintenance plan
  $secure_test = false;
  $bytes = openssl_random_pseudo_bytes(32, $secure_test);

  if(!$secure_test){
    $msg = "Crypto function could not securely create a salt!";
    return false;
  }

  $hex = bin2hex($bytes);
  
  $pwdcode = get_hash($pwd, $msg);
// 
//   $options = [
//     'cost' => 11,
//     'salt' => $bytes,
//   ];
// 
//   $pwdcode = password_hash($password, PASSWORD_DEFAULT, $options);
//   return $pwdcode
}

function login($username, $password, $mysqli){
  if($stmt = $mysqli->prepare("SELECT pwd, unit
                                FROM userpass WHERE username = ? LIMIT 1;")){
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    
    $stmt->bind_result($db_password, $unitid);
    $stmt->fetch();
    
//     $ck_var = array('hashpwd'=>$db_password, 'unitid'=>$unitid);
    
    if(password_verify($password, $db_password)) {
      return array('unitid'=>$unitid);
    } else {
      return false;
    }
    
  } else {
    return false;
  }
}

//debug section
if(false){
//   $bytes = openssl_random_pseudo_bytes(32, $secure_test);
//   echo bin2hex($bytes);
//   echo "<br />";
  $newpwd = "password";

  echo $newpwd . " = ";
  echo get_hash($newpwd);
  
  echo "<br><br>";
  
  echo password_verify("password","$2y$10$8J4QRamIR9MqX.TZyJRNV.bQaC50dTVDMRdq88NvxenJ69aDMiBWe");
  
  echo "<br><br>";
  
  include("config.php");
  $pwdconn = new mysqli($servername, $username, $password, $pwddbname);
  print_r(login("testuser","password",$pwdconn));
}
?>