<?php
if (isset($_POST['search'])) {
     $receipes = $_POST['receipes'];

     $curl = curl_init();

     curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.edamam.com/api/recipes/v2?q=' . $receipes . '&app_id=32ea5a75&app_key=4d43df82339606836da155153e699b1a&type=public',
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
}

?>

<!-- START: Container -->
<div class="container">
     <div class="row mb-5 mt-5">
          <div class="col-md-8 mx-auto text-center text-capitalize">
               <h1 class="text-capitalize mb-4">menu receipe</h1>
               <form method="POST">
                    <div class="input-group">
                         <input type="text" name="receipes" class="form-control" required placeholder="Cari resep kesukaanmu">
                         <button type="submit" class="btn btn-primary text-capitalize" name="search">search receipe</button>
                    </div>
               </form>
          </div>
     </div>

     <div class="row">
          <?php
          if (empty($data->hits)) {
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

               <?php
               foreach ($data->hits as $receipesResult) {
                    $source = str_replace(" ", "", $receipesResult->recipe->source);
               ?>

                    <div class="col-md-3 mt-5">
                         <div class="card card-shadow">
                              <div class="card-body">
                                   <div class="card-title text-center">
                                        <img src="<?php echo $receipesResult->recipe->image ?>" class="img-fluid rounded-2" alt="image api">
                                   </div>
                                   <div class="text-left">
                                        <?php echo $receipesResult->recipe->label ?>
                                   </div>
                                   <div class="card-text">
                                        <div class="mt-3">
                                             <button type="button" class="btn btn-success text-capitalize" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $source ?>">
                                                  detail
                                             </button>
                                        </div>

                                        <!-- START: Modal -->
                                        <div class="modal fade" id="exampleModal<?php echo $source ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                  <div class="modal-content">
                                                       <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                 <?php echo $receipesResult->recipe->label ?>
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                       </div>
                                                       <div class="modal-body">
                                                            <div class="mb-3 mt-3 text-capitalize text-secondary">healt label</div>
                                                            <?php foreach($receipesResult->recipe->healthLabels as $health) {?>
                                                                 <span class="badge bg-secondary">
                                                                      <?php echo$health ?>
                                                                 </span>
                                                            <?php } ?>
                                                            <div class="text-secondary b-3 mt-3">ingredient</div>
                                                            <div class="row">
                                                                 <?php foreach($receipesResult->recipe->ingredients as $ingredient) {?>
                                                                      <div class="col-md-6 mb-3">
                                                                           <div class="card">
                                                                                <div class="card-body">
                                                                                     <div class="card-title">
                                                                                          
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                            </div>
                                                            <?php } ?>
                                                       </div>
                                                       <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>

                                   </div>
                              </div>
                         </div>
                    </div>

          <?php
               }
          }
          ?>

     </div>

</div>