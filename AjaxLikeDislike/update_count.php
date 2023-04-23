<?php
$con=mysqli_connect('localhost','root','','db_like_dislike');
$type=$_POST['type'];
$id=$_POST['id'];
if($type=='like'){
	$sql="update tbl_like_dislike set like_count=like_count+1 where id=$id";
}else{
	$sql="update tbl_like_dislike set dislike_count=dislike_count+1 where id=$id";
}
$res=mysqli_query($con,$sql);
?>