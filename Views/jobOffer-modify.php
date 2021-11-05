<?php
    require_once('nav.php');

    $comp = null;

    foreach($companyList as $value)
    {
        if($value->getId() == $job->getIdCompany())
        {
            $comp = $value;
        }
    }

    $jobPos = null;

    foreach($jobPositionList as $value)
    {
        if($value->getId() == $job->getIdJobPosition())
        {
            $jobPos = $value;
        }
    }

?>
<main class="py-5" style="margin: -5rem 0 10rem 0">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Modificar Oferta</h2>
               <form action="<?php echo FRONT_ROOT ?>JobOffer/Modify" method="post" class="bg-light-alpha p-5">
                    <div class="row">
                         <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">ID</label>
                                    <input type="text" name="id" id="id" class="form-control" readonly value="<?php echo $job->getId();?>">
                                </div>
                         </div>               
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Compania</label>
                                   <select class="form-control" name="idCompany" id="idCompany" defa>
                                   <option value="<?php echo $comp->getId();?>" selected><?php echo $comp->getName();?></option>
                                        <?php  foreach($companyList as $company){
                                               ?>
                                                       <option value=<?php echo $company->getId() ?>><?php echo $company->getName(); ?></option>
                                        <?php }?>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Posicion</label>
                                   <select class="form-control" name="idJobPosition" id="idJobPosition" value="<?php echo $jobPos->getDescription();?>">>
                                   <option value="<?php echo $jobPos->getId();?>" selected><?php echo $jobPos->getDescription();?></option>
                                        <?php  foreach($jobPositionList as $jobPosition){
                                                ?>
                                                       <option value=<?php echo $jobPosition->getId() ?>><?php echo $jobPosition->getDescription(); ?></option>
                                        <?php } ?>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Fecha</label>
                                   <input type="text" name="fecha" id="fecha" class="form-control" readonly value="<?php echo $job->getFecha();?>">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Descripcion</label>
                                   <input type="text" name="description" id="description" class="form-control" required="" value="<?php echo $job->getDescription();?>">
                              </div>
                         </div>

                         
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Incorporar cambios</button>
               </form>
          </div>
     </section>
</main>