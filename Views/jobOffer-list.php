<?php

use Models\JobOffer;

require_once('nav.php');

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Listado de Ofertas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th></th>
                         <th></th>
                         <th>Posicion</th>
                         <th>Compania</th>
                         <th>Carrera</th>
                         <th>Fecha</th>
                         <th>Descripcion</th>
                    </thead>
                    <tbody>
                         <?php
                         	
                              foreach($jobOfferList as $jobOffer)
                              {    
                                   if($jobOffer->getActive())
                                   {
                                        ?>
                                             <tr>
                                                  <td><a href="<?php echo FRONT_ROOT; ?>Company/ShowCompanyProfileStudent/<?php echo $companyDAO->SearchCompanyById($jobOffer->getIdCompany())->getId();?>"><button class="btn btn-dark ml-auto d-block">Ver Mas</button></a></td>
                                                  <td><a href="<?php echo FRONT_ROOT; ?>JobOffer/ApplyJobOffer/<?php echo $jobOffer->getId();?>"><button class="btn btn-dark ml-auto d-block">Postularme</button></a></td>

                                                  <td><?php echo $jobPositionDAO->SearchJobPositionById($jobOffer->getIdJobPosition())->getDescription(); ?></td>
                                                  <td><?php echo $companyDAO->SearchCompanyById($jobOffer->getIdCompany())->getName(); ?></td>
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
     </section>
</main>
