<?php
$con=mysqli_connect('localhost','root','','db_like_dislike');
$sqlquery="select * from tbl_like_dislike";
$res=mysqli_query($con,$sqlquery);
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP & Ajax Like Dislike Script</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
		.container{width:90%; margin:auto;}
		.container h1{text-align:center;}
		.title h3{margin-top:5px;}
		.main_box{margin-top:8px; font-family:Arial; font-size:12px;  border:1px solid #98A1A4;padding:1%;}
		.mr25{margin-right:25px;}
		.divcolor { background-color:#EAECFD; }
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
 <div class="container">
 <h1>K-TECH ACADAMIC</h1>
  <h1>Like &amp; Dislike click  Ajax  Script</h1>

			<?php while($row=mysqli_fetch_assoc($res)){?>
			<div class="row main_box divcolor">
            <div class="col-sm-1 title">
					<h3><?php echo $row['id']?></h3>
				</div>
				<div class="col-sm-6 title">
					<h3><?php echo $row['name']?></h3>
				</div>
				<div class="col-sm-2 mr25">
<a href="javascript:void(0)" class="btn btn-info btn-lg">
<span class="glyphicon glyphicon-thumbs-up" onclick="like_update('<?php echo $row['id']?>')"> Like (<span id="like_loop_<?php echo $row['id']?>"><?php echo $row['like_count']?></span>)</span>
</a>
</div>
				<div class="col-sm-2">
				<a href="javascript:void(0)" class="btn btn-info btn-lg">
				<span class="glyphicon glyphicon-thumbs-down" onclick="dislike_update('<?php echo $row['id']?>')"> Dislike (<span id="dislike_loop_<?php echo $row['id']?>"><?php echo $row['dislike_count']?></span>)</span>
				</a>
				</div>
			</div>
			<?php } ?>
		</div>
		
		
		<script>
		function like_update(id){
			jQuery.ajax({
				url:'update_count.php',
				type:'post',
				data:'type=like&id='+id,
				success:function(result){
					var current_count=jQuery('#like_loop_'+id).html();
					current_count++;
					jQuery('#like_loop_'+id).html(current_count);
			
				}
			});
		}	
		
		function dislike_update(id){
			jQuery.ajax({
				url:'update_count.php',
				type:'post',
				data:'type=dislike&id='+id,
				success:function(result){
					var current_count=jQuery('#dislike_loop_'+id).html();
					current_count++;
					jQuery('#dislike_loop_'+id).html(current_count);
			
				}
			});
		}	
		</script>
	</body>
</html>