<?php 
if(isset($_POST['search'])) {
     $foods = $_POST['foods'];

curl_setopt_array($curl, array(
     CURLOPT_URL => 'https://api.edamam.com/api/food-database/v2/parser?app_id=827074f0&app_key=d8e6343e9f8fa160fe7f1771f955072e&ingr=' . $food,
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'GET',
     CURLOPT_HTTPHEADER => array(
       'Cookie: route=4ebff1d2ae8df64bdc65f1e53a63331e'
     ),
   ));
   
   $response = curl_exec($curl);
   
   curl_close($curl);
   $data = json_decode($response);
   
   }

?>

<div class="container">
     <div class="row text-center mb-5 mt-5">
          <div class="col-md-12 text-capitalize">
               <h1>menu foods</h1>
               <form method="POST">
                    <div class="input-group"></div>
               </form>
          </div>
     </div>
</div>