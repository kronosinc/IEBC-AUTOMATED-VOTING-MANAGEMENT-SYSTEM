<?php
 $password = 'annsa';
 echo $password;
$sha1hash = sha1($password);
echo $sha1hash.'\n';

$crypthash=crypt($sha1hash,'st');
echo $crypthash;
// $expensiveHash = password_hash($password, PASSWORD_DEFAULT, array('cost' => 20));
// echo $expensiveHash;
// password_verify('anna', $hash); //Returns true
// password_verify('anna', $expensiveHash); //Also returns true
// password_verify('elsa', $hash); //Returns false

?>