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
<main class="py-5" style="margin: 0 0 10rem 0">
     <section id="listado" class="mb-5">
          <div class="container">
               <a href="<?php echo FRONT_ROOT; ?>Company/ShowModifyView/<?php echo $company->getId();?>"><button class="btn btn-dark ">Modificar Informacion</button></a>
               <a href="<?php echo FRONT_ROOT; ?>Company/Delete/<?php echo $company->getId();?>"><button class="btn btn-dark">Eliminar Empresa</button></a>
               <br>
               <br>                  
               <h2 class="mb-4">Perfil de Empresa</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Calle</th>
                         <th>Nacionalidad</th>
                         <th>Descripcion</th>
                    </thead>
                    <tbody>
                         <tr>
                              <td><?php echo $company->getName(); ?></td>
                              <td><?php echo $company->getStreet(); ?></td>
                              <td><?php echo $company->getNacionality(); ?></td>
                              <td><?php echo $company->getDescription(); ?></td>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
     <div class="container pt-5">
          <h2 class="mb-4">Sus ofertas laborales</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Puesto</th>
                         <th>Carrera</th>
                         <th>Fecha</th>
                         <th>Descripcion</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($jobOfferList as $jobOffer)
                              {
                                   if($jobOffer->getActive()==true&&$jobOffer->getIdCompany()==$id)
                                   {
                                   ?>
                                        <tr>
                                             <td><?php echo $jobPositionDAO->SearchJobPositionById($jobOffer->getIdJobPosition())->getDescription(); ?></td>
                                             <td><?php echo $careerDAO->SearchCareerById($jobPositionDAO->SearchJobPositionById($jobOffer->getIdJobPosition())->getCareerId())->getDescription(); ?></td>
                                             <td><?php echo $jobOffer->getFecha();?></td>
                                             <td><?php echo $jobOffer->getDescription(); ?></td>
                                        </tr>
                                   <?php
                                   }
                              }
                         ?>
                    </tbody>
               </table>
     </div>
</main>