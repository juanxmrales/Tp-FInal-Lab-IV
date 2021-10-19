<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Agregar oferta</h2>
               <form action="<?php echo FRONT_ROOT ?>JobPosition/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">                       
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" value="" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Compania</label>
                                   <select class="form-control" name="companyId">
                                        <?php  foreach($companyList as $company){
                                                  if($company->getActive()){ ?>
                                                       <option value=<?php echo $company->getId() ?>><?php echo $company->getName() ?></option>
                                        <?php }} ?>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Carrera</label>
                                   <select class="form-control" name="career">
                                        <?php  foreach($careerList as $career){
                                                  if($career->getActive()){ ?>
                                                       <option value=<?php echo $career->getCareerId() ?>><?php echo $career->getDescription() ?></option>
                                        <?php }} ?>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Descripcion</label>
                                   <input type="text" name="description" value="" class="form-control" required="">
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>