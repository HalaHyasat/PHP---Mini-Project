 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>Document</title>

  <style>
  <?php include 'style.css'; ?> 
  </style>

</head>
<body>
<?php include 'data.php';?>

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-Trainees-tab" data-bs-toggle="tab" href="#nav-Trainees" role="tab" aria-controls="nav-Trainees" aria-selected="true">Trainees</a>
    <a class="nav-link" id="nav-Attendance-tab" data-bs-toggle="tab" href="#nav-Attendance" role="tab" aria-controls="nav-Attendance" aria-selected="false">Attendance Report</a>
    <a class="nav-link" id="nav-Dashboard-tab" data-bs-toggle="tab" href="#nav-Dashboard" role="tab" aria-controls="nav-Dashboard" aria-selected="false">Dashboard</a>
    <a class="nav-link" id="nav-Gallery-tab" data-bs-toggle="tab" href="#nav-Gallery" role="tab" aria-controls="nav-Gallery" aria-selected="false">Academy Gallery</a>
  </div>
</nav>


<div class="tab-content" id="nav-tabContent">

<!-- Trainees page -->
<?php include 'trainees.php'; ?> 


<!-- Attendance page -->
<?php include 'attendance.php'; ?> 


<!-- Dashboard page -->
<?php include 'dashboard.php'; ?> 


<!-- Academy Gallery -->
<?php include 'gallery.php'; ?> 


</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg></script>
</body>
</html>