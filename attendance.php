<div class="tab-pane fade" id="nav-Attendance" role="tabpanel" aria-labelledby="nav-Attendance-tab">
<div class="page-header">
    <br>
    <h1>Attendance Report Table</h1>  
  </div>
<div class= "px-5 py-1">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Check-in</th>
      <th scope="col">Check-out</th>
    </tr>
  </thead>
  <tbody>
  <?php
foreach ($data as $k => $v){
$style = null;
    if (isset( $v["attendance"])){
        foreach ( $v["attendance"] as $g => $h){
            $checkIn =  explode( ' ', $h["check_in"]);
            $checkIn = explode (':', $checkIn[3]);
            $checkOut =  explode( ' ',  $h["check_out"]);
            $checkOut = explode (':', $checkOut[3]);
            if ( ($checkOut [0]  - $checkIn [0] )< 8 ){
                   $style = "table-danger";}     
            elseif (($checkOut [0] - $checkIn [0]) == 8 ){
                if ($checkOut [1] < $checkIn [1] ){
                        $style = "table-danger";}
                        else { $style = "table-success";}  }

            else { $style = "table-success";}
            echo ' <tr class="'.$style.'">
            <th scope="row">'.$v["id"].'</th>
            <td>'.$v["name"].'</td>
            <td>'.$h["check_in"].'</td>
            <td>'.$h["check_out"].'</td> </tr>';}}}
?>
</tbody>
</table>
</div>
</div>