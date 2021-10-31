<?php

require_once('nav.php');

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Mis Ofertas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th></th>
                         <th>Nombre</th>
                         <th>Compania</th>
                         <th>Carrera</th>
                         <th>Descripcion</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($jobOfferList as $jobOffer)
                              {
                                  if($jobOffer->getActive()==true && $jobOffer->ExistPostulation()==true)
                                  {
                                   ?>
                                        <tr>
                                             <td><a href="<?php echo FRONT_ROOT; ?>Company/ShowCompanyProfileStudent/<?php echo $companyDAO->SearchCompanyById($jobOffer->getCompanyId())->getId();?>"><button class="btn btn-dark ml-auto d-block">Ver Mas</button></a></td>
                                             <td><?php echo $jobOffer->getName(); ?></td>
                                             <td><?php echo $companyDAO->SearchCompanyById($jobOffer->getCompanyId())->getName(); ?></td>
                                             <td><?php echo $careerDAO->SearchCareerById($jobOffer->getCareer())->getDescription(); ?></td>
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
