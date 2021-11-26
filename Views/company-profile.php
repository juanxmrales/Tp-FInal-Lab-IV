<?php
    require_once('nav.php');

     
                         
?>
<main class="py-5" style="margin: 0 0 10rem 0">
     <section id="listado" class="mb-5">
          <div class="container">
               <a href="<?php echo FRONT_ROOT; ?>Company/ShowModifyView/<?php echo $company->getId();?>"><button class="btn btn-dark ">Modificar Información</button></a>
               <br>
               <br>                  
               <h2 class="mb-4">Perfil de Empresa: <?php echo $company->getName(); ?></h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Calle</th>
                         <th>Nacionalidad</th>
                         <th>Descripción</th>
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
                         <th></th>
                         <th></th>
                         <th>Puesto</th>
                         <th>Carrera</th>
                         <th>Fecha</th>
                         <th>Descripción</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($jobOfferList as $jobOffer)
                              {
                                   if($jobOffer->getIdCompany()==$id)
                                   {
                                        ?>
                                             <tr>
                                                  <td><a href="<?php echo FRONT_ROOT; ?>JobOffer/ShowModifyView/<?php echo $jobOffer->getId();?>"><button class="btn btn-dark ">Modificar</button></a></td>
                                                  <td><a href="<?php echo FRONT_ROOT; ?>JobOffer/Delete/<?php echo $jobOffer->getId();?>"><button class="btn btn-dark">Eliminar</button></a></td>
                                                  <td><?php echo $jobOffer->getJobPosition(); ?></td>
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
</main>