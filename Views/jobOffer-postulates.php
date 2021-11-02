<?php

require_once('nav.php');

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Postulantes</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>boton de ver perfil</th>
                         <th>boton de contactar</th>
                         <th>email</th>
                         <th>Compania</th>
                         <th>Carrera</th>
                         <th>Fecha</th>
                         <th>Descripcion</th>
                    </thead>
                    <tbody>
                         <?php
                              
                              foreach($postulates as $userId)
                              {    
                                   ?>  
                                        <tr>


                                        </tr>
                                   <?php
                              }
                         ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>