<?php
  session_start();

if(!isset($_SESSION['loggedin']))
{
   header('Location:index.php');
   exit();
}
?>
<?php
$conn=new PDO('mysql:host=localhost; dbname=qpds', 'root', '') or die(mysql_error());
if(isset($_POST['submit'])!=""){
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  //$caption1=$_POST['caption'];
  //$link=$_POST['link'];
  
  move_uploaded_file($temp,"files/".$name);
$query=$conn->query("insert into upload(name)values('$name')");
if($query){
header("location:fileupload.php");

}
else{
die(mysql_error());
}
}
?>
<html>
<head>
<title>Upload and Download Files</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
</head>

	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<style>
</style>
<body style="background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);">
	    <div class="row-fluid">
	        <div class="span12">
	            <div class="container">
		<br />
		<h1><p>Upload  And  Download Files</p></h1>	
		<br />
		<br />
			<form enctype="multipart/form-data" action="fileupload.php" name="form" method="post">
				Select File
					<input type="file" name="photo" id="photo" require/></td>
					<input type="submit" name="submit" id="submit" value="Submit" />
			</form>
		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th align="center">ID</th>	
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
			$query=$conn->query("select * from upload order by id desc");
			while($row=$query->fetch()){
				$name=$row['name'];
				$id=$row['id'];
			?>
			<tr>
			<td>
					&nbsp;<?php echo $id ;?>
				</td>
			
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
				
					<a href="/sandy3/files/<?php echo $name;?>">Download</a>
				</td>
			</tr>
			<?php }?>
		</table>
		
	</div>
	</div>
	</div>
</body>
</html>
