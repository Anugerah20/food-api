<?php 
if(isset($_POST['search'])) {
     $receipes = $_POST['receipes'];
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.edamam.com/api/recipes/v2?q='. $receipes .'&app_id=32ea5a75&app_key=4d43df82339606836da155153e699b1a&type=public',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response);

?>

<!-- START: Container -->
<div class="container">
     <div class="row mb-5 mt-5">
          <div class="col-md-12 text-center text-capitalize"></div>
     </div>
</div>