<?php

require_once('nav.php');

?>
<main class="py-5" style="margin: -5rem 0 12rem 0">
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
                         <th>Teléfono</th>
                         <th>URL</th>
                    </thead>
                    <tbody>
                         <?php
                          
                              foreach($postulates as $userId)
                              {    
                                   
                                   $user = $userDAO->GetById($userId);     
                                   $student = $studentsDAO->SearchStudentByEmail($user->getEmail());

                                   if($student != null && $student->getActive()){
                                   ?>  
                                        <tr>
                                             <td><a href="<?php echo FRONT_ROOT; ?>Student/ShowStudentProfile/<?php echo $user->getEmail();?>"><button class="btn btn-dark ml-auto d-block">Ver Perfil</button></a></td>
                                             <td><a href="mailto:<?php echo $student->getEmail(); ?>"><button  class="btn btn-dark ml-auto d-block">Contactar</button></a></td>
                                             <td><?php echo $student->getFirstName(); ?></td>
                                             <td><?php echo $student->getLastName(); ?></td>
                                             <td><?php echo $student->getDni(); ?></td>
                                             <td><?php echo $student->getEmail(); ?></td>
                                             <td><?php echo $student->getPhoneNumber(); ?></td>
                                             <?php 
                                                  foreach($userXjobOfferList as $value)
                                                  {
                                                       if($value->getUserId()==$userId && $value->getJobOfferId()==$id)
                                                       {
                                                            ?>
                                                                 <td><a target="_blank" href="<?php echo FRONT_ROOT . $value->getCv();?>"><?php echo $value->getCv(); ?></a></td>
                                                            <?php
                                                       }
                                                  }
                                             ?>
                                        </tr>
                                   <?php }
                              }
                         ?>
                    </tbody>
               </table>
               <a target="_blank" href="../ShowPostulatesPdf/<?php echo $id?>" style="color: white">Descargar</a>
          </div>
     </section>
</main>