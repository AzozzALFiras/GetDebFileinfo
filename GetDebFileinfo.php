<?php
/*
*
* Programming : Azozz ALFiras
* thx Saif Mohammed
* https://github.com/AzozzALFiras/GetDebFileinfo
* https://twitter.com/AzozzALFiras
* First you need to upload the file to the server
*
*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// GetInfoDeb.php?Filename=co.azozzalfiras.speedads_1.6_iphoneos-arm.deb

// this for get path deb
$filename = $_GET['Filename'];

// for check if the file deb or not deb
$path_parts = pathinfo($filename);
$deb =  $path_parts['extension'];
if($deb == "deb"){

//  unzip deb for get info from control file'
if(shell_exec('ar -x '.$filename.' && echo true || echo false') == true){
    shell_exec('ar -x '.$filename.' && tar xvzf control.tar.gz');



$md5file = md5_file($filename);
$sha1file = sha1_file($filename);
$sha256 = hash_file("sha256", $filename);
$sha512 = hash_file("SHA512", $filename);
$fileSize = filesize($filename);
$control = file_get_contents("control");
echo $control;
echo  "Size : $fileSize";
echo "\n";
echo "MD5sum: $md5file";
echo "\n";
echo "SHA1: $sha1file";
echo "\n";
echo "SHA256: $sha256";
echo "\n";
echo "SHA512: $sha512";




}

} else {
    echo "pls upload file deb's";
}


?>
