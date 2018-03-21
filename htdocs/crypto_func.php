<?php

function get_hash($pwd, $salt){
  $options = [
    'cost' => 11,
    'salt' => $salt,
  ];
  
  $pwdcode = password_hash($password, PASSWORD_DEFAULT, $options);
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
  if($stmt = $mysqli->prepare("SELECT email, password, salt 
                                FROM Member WHERE username = ? LIMIT 1;")){
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();
    
    $stmt->bind_result($email, $db_password, $salt);
    $stmt->fetch();
    
    
    
    $ret_var = array('email'=>$email, 
    
  } else {
    return false;
  }
}

//debug section
if(true){
  $bytes = openssl_random_pseudo_bytes(32, $secure_test);
  echo bin2hex($bytes);
  echo "<br />";

  echo get_hash("password123",$bytes);
}
?>