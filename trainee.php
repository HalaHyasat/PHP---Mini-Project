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

    
<?php
include 'data.php';
$url = $_SERVER['REQUEST_URI'];    
$url = explode("=", $url);
$id = $url[1];

foreach ($data as $key => $value){
    if ($value["id"] == $id){
        echo '
        <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="http://localhost/weekend">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Trainee page</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="'.$value["image"].'" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>'.$value["name"].'</h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-secondary mb-1">ID: '.$value["id"].'</p>
                      <p class="text-muted font-size-sm">Birthday: '.$value["birthday"].'</p>

                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="mb-0"><a href="'.$value["linkedin"].'"><i class="fab fa-linkedin-in"></i></a></h4>
                    <span class="text-secondary">'.$value["linkedin"].'</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h4 class="mb-0"><a href="'.$value["github account"].'"><i class="fab fa-github"></i></a></h4>
                  <span class="text-secondary">'.$value["github account"].'</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
             
              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                  <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Projects Status</i></h6>';
                  
                  if (isset( $value["projects"])){
                      foreach ( $value["projects"] as $g => $h){
                          if ($h["is_compleated"] == "yes") {
                              $progress = 100;
                          }
                          else {
                              $progress = 0;
                          }

                          echo '
                          <small>'.$h["project_name"].'</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: '.$progress.'%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>';

                      }}
                 
                  echo '</div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">individual attendance report</i></h6>
                      <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Check-in</th>
                      <th scope="col">Check-out</th>
                    </tr>
                  </thead>
                  <tbody>';
                      if (isset( $value["projects"])){
                        foreach ( $value["attendance"] as $g => $h){
                            echo '<tr>
                             <td>'.$h["check_in"].'</td>
                            <td>'.$h["check_out"].'</td>
                    </tr>' ;
                         }}                      
                    echo '</tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>';
                 
        
    }
}
?> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg></script>
</body>
</html>
