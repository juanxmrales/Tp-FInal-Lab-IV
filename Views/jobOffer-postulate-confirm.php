<?php
    require_once('nav.php');
?>
<main class="py-5"   style="margin: -5rem 0 10rem 0">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Postulandose a la oferta:</h2>
               <form action="<?php echo FRONT_ROOT ?>JobOffer/ApplyJobOffer" method="post" class="bg-light-alpha p-5" enctype="multipart/form-data">
                    <div class="row">
                         <?php $_SESSION['jobIdCv'] = $job->getId(); ?>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Descripcion</label>
                                   <input type="text" class="form-control" value="<?php echo $job->getDescription(); ?>" readonly>
                              </div>
                         </div>                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Empresa</label>
                                   <input type="text" class="form-control" value="<?php echo $job->getCompany(); ?>" readonly>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Posicion</label>
                                   <input type="text" class="form-control" value="<?php echo $job->getJobPosition(); ?>" readonly>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Curriculum Vitae</label>
                                   <input type="file" name="cv" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Confirmar</button><br>
               </form> 
          
               
               <span class="badge badge-info" style="font-size: 15px;"><?php echo $message; ?></span>              
          </div>
     </section>
</main>