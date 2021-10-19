<?php

require_once('nav.php');

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Ofertas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th></th>
                         <th></th>
                         <th>Nombre</th>
                         <th>Compania</th>
                         <th>Carrera</th>
                         <th>Descripcion</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($jobPositionList as $jobPosition)
                              {
                                   ?>
                                        <tr>
                                             <td><a href="<?php echo FRONT_ROOT; ?>Company/ShowCompanyProfileStudent/<?php echo $companyDAO->SearchCompanyById($jobPosition->getCompanyId())->getId();?>"><button>Ver Alumnos</button></a></td>
                                             <td><?php echo $jobPosition->getName(); ?></td>
                                             <td><?php echo $companyDAO->SearchCompanyById($jobPosition->getCompanyId())->getName(); ?></td>
                                             <td><?php echo $careerDAO->SearchCareerById($jobPosition->getCareer())->getDescription(); ?></td>
                                             <td><?php echo $jobPosition->getDescription(); ?></td>
                                        </tr>
                                   <?php
                              }
                         ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>