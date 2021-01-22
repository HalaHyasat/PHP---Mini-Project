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


<!-- Trainees page -->
<div class="tab-content" id="nav-tabContent">
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




<!-- Attendance page -->
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



<!-- Dashboard page -->
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



<!-- Academy Gallery -->
<div class="tab-pane fade" id="nav-Gallery" role="tabpanel" aria-labelledby="nav-Gallery-tab">
<div class="lightbox-gallery">
    <div class="container">
    <div class="page-header">
    <br>
    <h1>Gallery of Orange Coding Academy events</h1>  
  </div>
        <div class="row photos py-3">
            <div class="col-lg-4 item "><a href="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/119570983_375355260518814_4180199557928596141_o.jpg?_nc_cat=106&ccb=2&_nc_sid=730e14&_nc_eui2=AeG38YPP3zHpA77AMiSYgbCQb6vXXx9PXWBvq9dfH09dYHbShdEHk4xCuMhAAjWDtDTPHpsYWQgDuMT1FfweFMPj&_nc_ohc=Hu_ohyDp5ykAX_xU78c&_nc_ht=scontent.famm9-1.fna&oh=9f1fbdf14246f7349fbe438759554f1e&oe=60300928" data-lightbox="photos"><img class="img-fluid shadow mb-5 bg-white rounded"  src="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/119570983_375355260518814_4180199557928596141_o.jpg?_nc_cat=106&ccb=2&_nc_sid=730e14&_nc_eui2=AeG38YPP3zHpA77AMiSYgbCQb6vXXx9PXWBvq9dfH09dYHbShdEHk4xCuMhAAjWDtDTPHpsYWQgDuMT1FfweFMPj&_nc_ohc=Hu_ohyDp5ykAX_xU78c&_nc_ht=scontent.famm9-1.fna&oh=9f1fbdf14246f7349fbe438759554f1e&oe=60300928"></a></div>
            <div class="col-lg-4 item "><a href="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/73142791_146766913377651_6049845939068207104_o.jpg?_nc_cat=108&ccb=2&_nc_sid=730e14&_nc_eui2=AeEHXlDKjVN2h2yF8We6aXBriI3BMcLKooOIjcExwsqig1VjrVcDmxwnNxHWfh7_-hjXp91zwQ7zfI8yNoBnt4yM&_nc_ohc=_36cjgZUrEYAX8DGNDK&_nc_ht=scontent.famm9-1.fna&oh=c3e9d81176203a4349c1b5f068871c85&oe=6030E929" data-lightbox="photos"><img class="img-fluid shadow mb-5 bg-white rounded" src="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/73142791_146766913377651_6049845939068207104_o.jpg?_nc_cat=108&ccb=2&_nc_sid=730e14&_nc_eui2=AeEHXlDKjVN2h2yF8We6aXBriI3BMcLKooOIjcExwsqig1VjrVcDmxwnNxHWfh7_-hjXp91zwQ7zfI8yNoBnt4yM&_nc_ohc=_36cjgZUrEYAX8DGNDK&_nc_ht=scontent.famm9-1.fna&oh=c3e9d81176203a4349c1b5f068871c85&oe=6030E929"></a></div>
            <div class="col-lg-4 item "><a href="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/78927308_158589935528682_744047747673358336_o.jpg?_nc_cat=107&ccb=2&_nc_sid=730e14&_nc_eui2=AeH02D5HQEH0ymC-jeAiEdN71nDvWzJRpWrWcO9bMlGlanrvPYhG-0B7xb8happJjdiv4YVUxx6sN2q-XxG8kjMh&_nc_ohc=ctdz0ELyfgIAX_tMTlh&_nc_ht=scontent.famm9-1.fna&oh=66654a764529fc1f294a0401ade4d1bd&oe=6030DD2F" data-lightbox="photos"><img class="img-fluid shadow mb-5 bg-white rounded" src="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/78927308_158589935528682_744047747673358336_o.jpg?_nc_cat=107&ccb=2&_nc_sid=730e14&_nc_eui2=AeH02D5HQEH0ymC-jeAiEdN71nDvWzJRpWrWcO9bMlGlanrvPYhG-0B7xb8happJjdiv4YVUxx6sN2q-XxG8kjMh&_nc_ohc=ctdz0ELyfgIAX_tMTlh&_nc_ht=scontent.famm9-1.fna&oh=66654a764529fc1f294a0401ade4d1bd&oe=6030DD2F"></a></div>
            <div class="col-lg-4 item "><a href="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/81186268_175902807130728_8948236303023996928_o.jpg?_nc_cat=107&ccb=2&_nc_sid=730e14&_nc_eui2=AeG34vy7sORIZwUE22Sltn9y5BGlx7CJVFDkEaXHsIlUUFyu75Oa8dmDvC3R0vtYI5fuIcWYc9oGux1WyXHLYR7U&_nc_ohc=72YUP1-z7E4AX8GVBTl&_nc_ht=scontent.famm9-1.fna&oh=2e84e5e73a9e48b71a8f169214017855&oe=60305920" data-lightbox="photos"><img class="img-fluid shadow mb-5 bg-white rounded" src="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/81186268_175902807130728_8948236303023996928_o.jpg?_nc_cat=107&ccb=2&_nc_sid=730e14&_nc_eui2=AeG34vy7sORIZwUE22Sltn9y5BGlx7CJVFDkEaXHsIlUUFyu75Oa8dmDvC3R0vtYI5fuIcWYc9oGux1WyXHLYR7U&_nc_ohc=72YUP1-z7E4AX8GVBTl&_nc_ht=scontent.famm9-1.fna&oh=2e84e5e73a9e48b71a8f169214017855&oe=60305920"></a></div>
            <div class="col-lg-4 item "><a href="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/75419121_158589925528683_3344845875003260928_o.jpg?_nc_cat=103&ccb=2&_nc_sid=730e14&_nc_eui2=AeFBSewhnVMHRkpOmv5RlDokoXXO_2ULZ4Ohdc7_ZQtngyMETdpQgkRrd9xYAfXV2H1-Y-DXb9oShCaiObsTGrxr&_nc_ohc=DwTLP1bWDiAAX-GjZLL&_nc_ht=scontent.famm9-1.fna&oh=f76ceb4b56932a2e44129d2770a3798c&oe=602DA98D" data-lightbox="photos"><img class="img-fluid shadow mb-5 bg-white rounded" src="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/75419121_158589925528683_3344845875003260928_o.jpg?_nc_cat=103&ccb=2&_nc_sid=730e14&_nc_eui2=AeFBSewhnVMHRkpOmv5RlDokoXXO_2ULZ4Ohdc7_ZQtngyMETdpQgkRrd9xYAfXV2H1-Y-DXb9oShCaiObsTGrxr&_nc_ohc=DwTLP1bWDiAAX-GjZLL&_nc_ht=scontent.famm9-1.fna&oh=f76ceb4b56932a2e44129d2770a3798c&oe=602DA98D"></a></div>
            <div class="col-lg-4 item "><a href="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/72557279_139066714147671_1379343904049987584_o.jpg?_nc_cat=105&ccb=2&_nc_sid=730e14&_nc_eui2=AeFUmqomPxpT78AOpSgWakUDX0E19rvSDuVfQTX2u9IO5QknrKgQcijLWPq36uQmHAnXf2GE4n69Lv1m-QEHhhO1&_nc_ohc=pZor5W4Pk4sAX86KO1q&_nc_ht=scontent.famm9-1.fna&oh=d971c29733259e781f24df27aa558575&oe=60318DA9" data-lightbox="photos"><img class="img-fluid shadow mb-5 bg-white rounded" src="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/72557279_139066714147671_1379343904049987584_o.jpg?_nc_cat=105&ccb=2&_nc_sid=730e14&_nc_eui2=AeFUmqomPxpT78AOpSgWakUDX0E19rvSDuVfQTX2u9IO5QknrKgQcijLWPq36uQmHAnXf2GE4n69Lv1m-QEHhhO1&_nc_ohc=pZor5W4Pk4sAX86KO1q&_nc_ht=scontent.famm9-1.fna&oh=d971c29733259e781f24df27aa558575&oe=60318DA9"></a></div>
            <div class="col-lg-4 item "><a href="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/75552917_153677396019936_3502849681644322816_o.jpg?_nc_cat=111&ccb=2&_nc_sid=730e14&_nc_eui2=AeEXIZJWNE7zSLrZ_bD0MQoTQkA5VpsItkxCQDlWmwi2TElg4BAOmASg_vziE5-bSMlQCos1XIddcnuCZ5K9dAYK&_nc_ohc=n37qQsruQB0AX_IvpiT&_nc_ht=scontent.famm9-1.fna&oh=e06033ac7e193b0cf50c494c60933556&oe=602F4733" data-lightbox="photos"><img class="img-fluid shadow mb-5 bg-white rounded" src="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/75552917_153677396019936_3502849681644322816_o.jpg?_nc_cat=111&ccb=2&_nc_sid=730e14&_nc_eui2=AeEXIZJWNE7zSLrZ_bD0MQoTQkA5VpsItkxCQDlWmwi2TElg4BAOmASg_vziE5-bSMlQCos1XIddcnuCZ5K9dAYK&_nc_ohc=n37qQsruQB0AX_IvpiT&_nc_ht=scontent.famm9-1.fna&oh=e06033ac7e193b0cf50c494c60933556&oe=602F4733"></a></div>
            <div class="col-lg-4 item "><a href="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/73227665_146766006711075_5411987173274550272_o.jpg?_nc_cat=110&ccb=2&_nc_sid=730e14&_nc_eui2=AeHimGpLemUSsNCHVva-_gIeBondgI_G4RMGid2Aj8bhExA0ZMKHj5ZUGX58cqFF9WWoPCB8q1YSUr0Ti4fpGezW&_nc_ohc=abr5eaDL7z0AX8EvxVG&_nc_ht=scontent.famm9-1.fna&oh=cf2b8e508f21d11eacfe6ea92357c75c&oe=602EFC64" data-lightbox="photos"><img class="img-fluid shadow mb-5 bg-white rounded" src="https://scontent.famm9-1.fna.fbcdn.net/v/t1.0-9/73227665_146766006711075_5411987173274550272_o.jpg?_nc_cat=110&ccb=2&_nc_sid=730e14&_nc_eui2=AeHimGpLemUSsNCHVva-_gIeBondgI_G4RMGid2Aj8bhExA0ZMKHj5ZUGX58cqFF9WWoPCB8q1YSUr0Ti4fpGezW&_nc_ohc=abr5eaDL7z0AX8EvxVG&_nc_ht=scontent.famm9-1.fna&oh=cf2b8e508f21d11eacfe6ea92357c75c&oe=602EFC64"></a></div>
        </div>
    </div>
</div>
</div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg></script>
</body>
</html>