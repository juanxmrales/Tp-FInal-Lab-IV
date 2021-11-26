<?php
     use DAO\StudentDAO as StudentDAO;
     require_once('nav.php');
?>
<main class="py-5" style="margin: -7rem 0 20rem -3rem;">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Listado de Alumnos</h2>
               <form>
                    <div class="filtro">
                         <input type="text" name="filter" placeholder="DNI" class="form-control">
                         <button type="submit" value="Filtrar" class="btn btn-dark ">Filtrar</button>
                    </div>
                    <br>
               </form>
               </div>
               <div class="container">
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Legajo</th>
                         <th>Apellido</th>
                         <th>Nombre</th>
                         <th>DNI</th>
                         <th>Número de Archivo</th>
                         <th>Género</th>
                         <th>Fecha de Nacimiento</th>
                         <th>Email</th>
                         <th>Teléfono</th>
                         <th>Activo</th>
                    </thead>

                    <tbody>
                         <?php

                         if(!isset($_GET["filter"]) || $_GET['filter'] == ""){


                              foreach($studentList as $student)
                              {
                                   foreach($userList as $user)
                                   {
                                        if($student->getEmail()==$user->getEmail())
                                        {
                                        ?>
                                             <tr>
                                                  <td><?php echo $student->getStudentId(); ?></td>
                                                  <td><?php echo $student->getLastName(); ?></td>
                                                  <td><?php echo $student->getFirstName(); ?></td>
                                                  <td><?php echo $student->getDni(); ?></td>
                                                  <td><?php echo $student->getFileNumber(); ?></td>
                                                  <td><?php echo $student->getGender(); ?></td>
                                                  <td><?php echo $student->getBirthDate(); ?></td>
                                                  <td><?php echo $student->getEmail(); ?></td>
                                                  <td><?php echo $student->getPhoneNumber(); ?></td>
                                                  <td><?php echo ($student->getActive()) ? "Si" :  "No"; ?></td>
                                             </tr>
                                        <?php
                                        }
                                   }
                              }
                         }
                         else{
                                   $studentDAO = new StudentDAO();
                                   $filtred = $studentDAO->SearchStudentByDNI($_GET["filter"]);


                                   if($filtred){

                                        foreach($userList as $user)
                                        {
                                             if($filtred->getEmail()==$user->getEmail())
                                             {
                                                  ?>
                                                       <tr>
                                                       <td><?php echo $filtred->getStudentId(); ?></td>
                                                       <td><?php echo $filtred->getLastName(); ?></td>
                                                       <td><?php echo $filtred->getFirstName(); ?></td>
                                                       <td><?php echo $filtred->getDni(); ?></td>
                                                       <td><?php echo $filtred->getFileNumber(); ?></td>
                                                       <td><?php echo $filtred->getGender(); ?></td>
                                                       <td><?php echo $filtred->getBirthDate(); ?></td>
                                                       <td><?php echo $filtred->getEmail(); ?></td>
                                                       <td><?php echo $filtred->getPhoneNumber(); ?></td>
                                                       <td><?php echo ($filtred->getActive()) ? "Si" :  "No"; ?></td>
                                                       </tr>
                                                  <?php
                                             }
                                        }
                                   }
                                   else
                                   {
                                        ?>
                                             <td><?php echo "No se encontraron resultados"; ?></td>
                                        <?php
                                   }
                         }
                         ?>
                         </tr>
                         
                    </tbody>
               </table>
               </div>
          
     </section>
</main>