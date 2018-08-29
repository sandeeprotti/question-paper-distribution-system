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
    <title>student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body style="height:1500px; background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">QPDS</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
      <li class="active"><a href="student.php">Student</a></li>
      <li><a href="faculty.php">Faculty</a></li>
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
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-md-12">
            <h1>STUDENT DETAILS</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Record</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Records:</h3>

            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- /Content Section -->


<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="usn">Student USN</label>
                    <input type="text" id="usn" placeholder="Student USN" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="stud_name">Student Name</label>
                    <input type="text" id="stud_name" placeholder="Student Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="dept_id">Department ID</label>
                    <input type="text" id="dept_id" placeholder="Department ID" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="sem_id">Semester ID</label>
                    <input type="text" id="sem_id" placeholder="Semester ID" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="room_id">BLOCK ID</label>
                    <input type="text" id="room_id" placeholder="BLOCK ID" class="form-control"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
                    <label for="update_usn">Student USN</label>
                    <input type="text" id="update_usn" placeholder="Student USN" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_stud_name">Student Name</label>
                    <input type="text" id="update_stud_name" placeholder="Student Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_dept_id">Department ID</label>
                    <input type="text" id="update_dept_id" placeholder="Department ID" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_sem_id">Semester ID</label>
                    <input type="text" id="update_sem_id" placeholder="Semester ID" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="update_room_id">BLOCK ID</label>
                    <input type="text" id="update_room_id" placeholder="BLOCK ID" class="form-control"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Jquery JS file -->
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="js/student.js"></script>

</body>
</html>
