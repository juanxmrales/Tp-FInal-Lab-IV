<?php
    require_once('nav.php');

?>
<main class="py-5" style="margin: -5rem 0 10rem 0">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Insertar imagen</h2>
               <form action="<?php echo FRONT_ROOT ?>JobOffer/AddImage" method="post" class="bg-light-alpha p-5" enctype="multipart/form-data">
                    <div class="row">
                         <?php $_SESSION['idJobImagen'] = $idJob;?>
                         <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Imagen</label>
                                    <input type="file" name="image" class="form-control" readonly>
                                </div>
                         </div>               
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Incorporar cambios</button>
               </form>
          </div>
     </section>
</main>