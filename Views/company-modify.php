<?php
    require_once('nav.php');

    $company = null;

     foreach($companyList as $value)
     {
          if($value->getId() == $id)
          {
               $company = $value;
          }
     }
?>
<main class="py-5"  style="margin: 0 0 10rem 0">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Modificar Empresa</h2>
               <form action="<?php echo FRONT_ROOT ?>Company/Modify" method="post" class="bg-light-alpha p-5">
                    <div class="row">
                        <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">ID</label>
                                   <input type="text" name="id" value="<?php echo $company->getId()?>" class="form-control" readonly>
                              </div>
                         </div>                 
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" value="<?php echo $company->getName()?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Calle</label>
                                   <input type="text" name="street" value="<?php echo $company->getStreet()?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nacionalidad</label>
                                   <input type="text" name="nacionality" value="<?php echo $company->getNacionality()?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Descripcion</label>
                                   <input type="textarea" name="description" value="<?php echo $company->getDescription()?>" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Incorporar cambios</button>
               </form>
          </div>
     </section>
</main>