<div class="tab-pane fade show active" id="nav-Trainees" role="tabpanel" aria-labelledby="nav-Trainees-tab">
    <br>
<div class="page-header">
    <h1>Our Trainees</h1>  
  </div>
<div class="row">
<?php
foreach ($data as $key => $value){
echo '<div class="col-sm-3 ">
<div class="card shadow mb-5 bg-white rounded">
<img src="'.$value["image"].'" class="card-img-top" alt="images"/>
<div class="card-body">
<h4 class="card-title">'.$value["name"].'</h4>
<p class="card-text">Trainee ID: '.$value["id"].'</p>
<p class="card-text">Date of birth: '.$value["birthday"].'</p>
<div>
<a href="'.$value["linkedin"].'"><i class="fab fa-linkedin icon"></i></a>
<a href="'.$value["github account"].'"><i class="fab fa-github-square icon"></i></a>
</div>
<a href="http://localhost/weekend/trainee.php/?id='.$value["id"].'" class="ext-decoration-none">Read more</a>
</div>
</div>
</div>';}
?>

</div>
  </div>