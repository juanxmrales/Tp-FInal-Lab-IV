<?php
    require_once('nav.php');                 
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
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
</main>