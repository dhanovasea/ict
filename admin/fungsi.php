<?php
$textToEncrypt = "My super secret information.";
$encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
$secretHash = "d8578edf8458ce06fbc5bb76a58c5ca4";

//To encrypt
//function encrypt2($s) {
//	$qEncoded = openssl_encrypt($s, $encryptionMethod, $secretHash);
// 	return($qEncoded);
//}

//To Decrypt
//function decrypt2($s) {
//	$qDecoded = openssl_decrypt($s, $encryptionMethod, $secretHash);
//	return($qDecoded);
//}




//    function encrypt($s) {
//        $cryptKey    ='d8578edf8458ce06fbc5bb76a58c5ca4';
//        $qEncoded    =base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5( $cryptKey), $s, MCRYPT_MODE_CBC, md5(md5//($cryptKey))));
//        return($qEncoded);
 //   }
//    function decrypt($s) {
//        $cryptKey    ='d8578edf8458ce06fbc5bb76a58c5ca4';
//        $qDecoded    =rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($s), MCRYPT_MODE_CBC, md5(md5//($cryptKey))), "\0");
//        return($qDecoded);
//    }


//$parameter  = $_GET['param']; //dapatkan nilai parameter
//$hash = $_GET['hash']; //dapatkan nilai hash
//$salt = "cV0puOlx";
//$hashed = md5($salt.$parameter);
//lalu coba cek dan bandingkan, jika nilai get dirubah atau diganti maka akan terjadi failed
//if ($hash == $hashed){ //bandingkan hash yang dikirim dengan parameter yang dienkripsi
//   echo "enkrip sukses";
//}else{
// echo "enkrip failed";
//}



//

//$link = urlencode(base64_encode("root93"));
//header("Location: http://localhost/enkrip/decode.php?param=$link");


//foreach($_GET as $loc=>$link)
//$_GET[$loc] = base64_decode(urldecode($link));
//$banding="root93";
//$vari=$_GET[$loc];
//if($banding == $vari){
// echo "Sukses Decode";
//}else{
// echo "failed";
//}





?>