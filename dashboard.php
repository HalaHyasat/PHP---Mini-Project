<div class="tab-pane fade" id="nav-Dashboard" role="tabpanel" aria-labelledby="nav-Dashboard-tab">
<div class="page-header">
    <br>
    <h1>Dashboard</h1>  
  </div>
<div class= "px-5 py-1">

<?php
$i = 0;
$j = 0;
foreach ($data as $k => $v){
$i++;
    if (isset( $v["projects"])){
        foreach ( $v["projects"] as $g => $h){
            if ($h["is_compleated"] == "yes") {
                $j++;
            };
        }}}
            ?>
            <p>The total number of trainees is: <?php echo $i ?></p>
            <p>The total number of completed projects is: <?php echo $j ?></p>

  <table class="table table-striped table-hover">
      <h5>Trainees informaion</h5>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
  <?php
$i = 0;
$j = 0;
foreach ($data as $k => $v){
       echo '<tr>
                <td>'.$v["id"].'</td>
                <td>'.$v["name"].'</td>
        </tr>';}
            ?>
   
</tbody>
</table>
</div>
</div>