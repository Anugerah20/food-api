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

<!-- START: Search Foods -->
<div class="container">
     <div class="row text-center mb-5 mt-5 mt-sm-0">
          <div class="col-md-8 mx-auto mt-4 text-capitalize">
               <h1>menu foods</h1>
               <form method="POST">
                    <div class="input-group mt-4">
                         <input type="text" name="foods" class="form-control" placeholder="Cari makanan favoritmu" required>
                         <button type="submit" class="btn btn-primary text-capitalize" name="search">search foods</button>
                    </div>
               </form>
          </div>
     </div>

     <!-- START: NO Search Food -->
     <?php 
          if(empty($data->text)) {
               echo '
               <div class="row">
                  <div class="col-md-8 mx-auto text-center">
                    <div class="alert alert-danger" role="alert">
                    Tidak tersedia
                  </div>
               </div>
               </div>';
          } else {

          }
     ?>

     <?php foreach($data->hints as $foodResult) { ?>
          <div class="col-md-3 mt-5">
               <div class="card shadow-lg">
                    <div class="card-body">
                         <div class="card-title text-center">
                              
                         </div>
                    </div>
               </div>
          </div>
     <?php } ?>
</div>