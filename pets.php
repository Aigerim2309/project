<?php
$content = trim(file_get_contents("php://input"));

$decoded = json_decode($content, true);
if ($decoded['action']=='create'){
	$pp = $decoded['pet'];
	$pp2 = $decoded['age'];
	$pp3 = $decoded['url'];

	

   $link = mysqli_connect('localhost','root','','webka');

   $sql="INSERT INTO `pets` (`pet`, `age`, `url`) VALUES('".$pp."', '".$pp2."', '".$pp3."')";
   $query=mysqli_query($link,$sql);
   echo $pp.$pp2.$pp3;
}
elseif ($decoded['action']=='update') {
	$pp = $decoded['pet'];
	$pp2 = $decoded['age'];
	$pp3 = $decoded['url'];

	

   $link = mysqli_connect('localhost','root','','webka');

   $sql = "SELECT *  FROM `pets` WHERE `pet` = '".$pp."' AND `age` LIKE '".$pp2."' AND `url` LIKE '".$pp3."'";
   $sql = "UPDATE `pets` SET `pet` = 'dog' AND `age` LIKE '2' AND `url` LIKE 'https://i.ytimg.com/vi/MPV2METPeJU/maxresdefault.jpg' WHERE `pet` = '".$pp."' AND `age` LIKE '".$pp2."' AND `url` LIKE '".$pp3."'";



   $query=mysqli_query($link,$sql);
   $id=mysqli_fetch_assoc($query)['id'];
   echo $id;

}

elseif ($decoded['action']=='delete') {
	$pp = $decoded['pet'];
	$pp2 = $decoded['age'];
	$pp3 = $decoded['url'];

	

   $link = mysqli_connect('localhost','root','','webka');

   $sql = "DELETE  FROM `pets` WHERE `pet` = '".$pp."' AND `age` LIKE '".$pp2."' AND `url` LIKE '".$pp3."'";


   $query=mysqli_query($link,$sql);
   $id=mysqli_fetch_assoc($query)['id'];
   echo $id;

}

?>