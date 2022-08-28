<?php
if (isset($_POST['search'])) {
     $foods = $_POST['foods'];

     $curl = curl_init();

     curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.edamam.com/api/food-database/v2/parser?app_id=827074f0&app_key=d8e6343e9f8fa160fe7f1771f955072e&ingr=' . $foods,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
               'Cookie: route=efbe768325b9fee6a9b60f0ef9f93150'
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
               <h1 style="font-weight: 700; color: #5f54d1;">menu foods</h1>
               <form method="POST">
                    <div class="input-group mt-4">
                         <input type="text" name="foods" class="form-control" placeholder="Cari makanan favoritmu" required>
                         <button type="submit" class="btn btn-primary text-capitalize" name="search">search foods</button>
                    </div>
               </form>
          </div>
     </div>

     <!-- START: NO Search Food -->
     <div class="row">
          <?php
          if (empty($data->text)) {
               echo '
               <div class="row">
                  <div class="col-md-8 mx-auto text-center">
                    <div class="alert alert-danger" role="alert">
                        ! Anda belum mencari apapun
                  </div>
               </div>
               </div>';
          } else {
          ?>

               <?php foreach ($data->hints as $foodsResult) { ?>
                    <div class="col-md-3 mt-5">
                         <div class="card shadow-lg">
                              <div class="card-body">
                                   <div class="card-title text-center">
                                        <img src="assets/img/burger.jpg" alt="dummy-food" class="img-fluid rounded">
                                   </div>
                                   <div class="text-brand"><?php echo $foodsResult->food->label; ?></div>
                                   <div class="card-text">
                                        <div class="badge-section">
                                             <div class="badge text-bg-danger"><?php echo $foodsResult->food->category ?></div>
                                             <div class="badge text-bg-danger"><?php echo $foodsResult->food->categoryLabel ?></div>
                                        </div>
                                        <div class="mt-3">
                                             <button type="button" class="btn btn-success text-capitalize" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $foodsResult->food->foodId ?>">
                                                  detail
                                             </button>
                                        </div>

                                        <!-- START: Modal -->
                                        <div class="modal fade" id="exampleModal<?php echo $foodsResult->food->foodId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                  <div class="modal-content">
                                                       <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                 <?php echo $foodsResult->food->label ?>
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                       </div>
                                                       <div class="modal-body">
                                                            <div class="text-detail text-capitalize">
                                                                 nutrisi
                                                            </div>
                                                            <!-- START: List Group -->
                                                            <ul class="list-group">
                                                                 <li class="list-group-item">
                                                                      ENERGI : <?php echo(empty($foodsResult->food->nutrients->ENERC_KCAL)) ? 'Data tidak tersedia' : $foodsResult->food->nutrients->ENERC_KCAL ?> 
                                                                 </li>
                                                                 <li class="list-group-item">
                                                                      Protein : <?php echo(empty($foodsResult->food->nutrients->PROCNT)) ? 'Data tidak tersedia' : $foodsResult->food->nutrients->PROCNT ?> 
                                                                 </li>
                                                                 <li class="list-group-item">
                                                                      Fat : <?php echo(empty($foodsResult->food->nutrients->FAT)) ? 'Data tidak tersedia' : $foodsResult->food->nutrients->FAT ?> 
                                                                 </li>
                                                                 <li class="list-group-item">
                                                                      Carbo : <?php echo(empty($foodsResult->food->nutrients->CHOCDF)) ? 'Data tidak tersedia' : $foodsResult->food->nutrients->CHOCDF ?> 
                                                                 </li>
                                                                 <li class="list-group-item">
                                                                      Fiber : <?php echo(empty($foodsResult->food->nutrients->FIBTG)) ? 'Data tidak tersedia' : $foodsResult->food->nutrients->FIBTG ?> 
                                                                 </li>
                                                            </ul>

                                                            <!-- START: Category -->
                                                            <ul class="list-group mt-4">
                                                                 <li class="list-group-item">
                                                                      Food Contents Label : <?php echo (empty($foodResult->food->foodContentsLabel)) ? 'Data tidak tersedia' : $foodResult->food->foodContentsLabel ?>
                                                                 </li>
                                                                 <li class="list-group-item">
                                                                      Category : <?php echo (empty($foodsResult->food->category)) ? 'Data tidak tersedia' : $foodsResult->food->category ?>
                                                                 </li>
                                                                 <li class="list-group-item">
                                                                      Category Label : <?php echo (empty($foodsResult->food->categoryLabel)) ? 'Data tidak tersedia' : $foodsResult->food->categoryLabel ?>
                                                                 </li>
                                                            </ul>

                                                       </div>
                                                       <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary text-capitalize" data-bs-dismiss="modal">tutup</button>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   <!-- END: Modal -->
                                   </div>
                              </div>
                         </div>
                    </div>
          <?php
               }
          } ?>
     </div>
</div>