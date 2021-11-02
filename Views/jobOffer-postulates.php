<?php

require_once('nav.php');

?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Postulantes</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th></th>
                         <th></th>
                         <th>Nombre</th>
                         <th>Apellido</th>
                         <th>DNI</th>
                         <th>Email</th>
                         <th>Telefono</th>
                    </thead>
                    <tbody>
                         <?php
                          
                              foreach($postulates as $userId)
                              {    
                                   
                                   $user = $userDAO->getById($userId);                                   
                                   $student = $studentsDAO->searchStudentByEmail($user->getEmail());
                                   ?>  
                                        <tr>
                                             <td><a href=""><button class="btn btn-dark ml-auto d-block">Ver Perfil</button></a></td>
                                             <td><a href=""><button class="btn btn-dark ml-auto d-block">Contactar</button></a></td>
                                             <td><?php echo $student->getFirstName(); ?></td>
                                             <td><?php echo $student->getLastName(); ?></td>
                                             <td><?php echo $student->getDni(); ?></td>
                                             <td><?php echo $student->getEmail(); ?></td>
                                             <td><?php echo $student->getPhoneNumber(); ?></td>
                                        </tr>
                                   <?php
                              }
                         ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>