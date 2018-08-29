<!DOCTYPE html>
<?php
  session_start();

if(!isset($_SESSION['loggedin']))
{
   header('Location:index.php');
   exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QPDS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body style="height:1500px; background-image: url('newback.jpg')";
">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">QPDS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li><a href="student.php">Student</a></li>
      <li ><a href="faculty.php">Faculty</a></li>
      <li><a href="fileupload.php">FileUpload</a></li>
      <li><a href="schedule.php">Schedule</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Other<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="department.php">Departments</a></li>
          <li><a href="semester.php">Semesters</a></li>
          <li><a href="subject.php">Subjects</a></li>
          <li><a href="blocks.php">Blocks</a></li>
        </ul>
    </li>
  
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<!-- Content Section -->
<div class="container" style="margin-top:55px">
    <div class="row">
    <img src="icon.png" width="150" height="150"/>
        <div class="col-md-12">
            <h1>Question Paper Distribution System</h1>
            <h4>The Question Paper Distribution System involves distribution of paper by providing authenticity.<br> This uses secured uploading and downloading question papers from the server and QR code scanning mechanism is used for authentication.</h4>
        </div>
    </div>
</div>

<!-- Jquery JS file -->
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

<!-- Custom JS file
<script type="text/javascript" src="js/script.js"></script>
-->

</body>
</html>
