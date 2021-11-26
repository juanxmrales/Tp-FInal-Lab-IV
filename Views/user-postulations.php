<?php

require_once('nav.php');

?>
<main class="py-5" style="margin: -5rem 0 10rem 0;">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Mis Ofertas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th></th>
                         <th>Posición</th>
                         <th>Compañía</th>
                         <th>Carrera</th>
                         <th>Fecha</th>
                         <th>Descripción</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($jobOfferList as $jobOffer)
                              {    
                                  if($jobOffer->ExistPostulation($_SESSION['idUser']))
                                  {
                                   ?>
                                        <tr>
                                             <td><a href="<?php echo FRONT_ROOT; ?>Company/ShowCompanyProfileStudent/<?php echo $jobOffer->getIdCompany();?>"><button class="btn btn-dark ml-auto d-block">Ver Mas</button></a></td>
                                             <td><?php echo $jobOffer->getJobPosition(); ?></td>
                                             <td><?php echo $jobOffer->getCompany(); ?></td>
                                             <td><?php echo $jobOffer->getCareer(); ?></td>                                             
                                             <td><?php echo $jobOffer->getFecha(); ?></td>
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
