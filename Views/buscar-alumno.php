<?php
     use DAO\StudentDAO as StudentDAO;
     require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Buscar alumno por DNI</h2>
               <form>
                    <input type="text" name="filter" placeholder="DNI">
                    <button type="submit" value="Filtrar"></button>
               </form>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Legajo</th>
                         <th>Apellido</th>
                         <th>Nombre</th>
                         <th>DNI</th>
                         <th>Numero de Archivo</th>
                         <th>Genero</th>
                         <th>Fecha de Nacimiento</th>
                         <th>Email</th>
                         <th>Telefono</th>
                         <th>Activo</th>
                    </thead>

                    <tbody>
                         <?php

                         if(!$_GET["filter"]){


                              foreach($studentList as $student)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $student->getStudentId() ?></td>
                                             <td><?php echo $student->getLastName() ?></td>
                                             <td><?php echo $student->getFirstName() ?></td>
                                             <td><?php echo $student->getDni() ?></td>
                                             <td><?php echo $student->getFileNumber() ?></td>
                                             <td><?php echo $student->getGender() ?></td>
                                             <td><?php echo $student->getBirthDate() ?></td>
                                             <td><?php echo $student->getEmail() ?></td>
                                             <td><?php echo $student->getPhoneNumber() ?></td>
                                             <td><?php echo ($student->getActive()) ? "Si" :  "No"; ?></td>
                                        </tr>
                                   <?php
                              }
                         }
                         else{
                                   $studentDAO = new StudentDAO();
                                   $filtred = $studentDAO->searchStudent($_GET['filter']);


                                   if($filtred){
                                         ?>
                                             <tr>
                                                <td><?php echo $filtred->getStudentId() ?></td>
                                                <td><?php echo $filtred->getLastName() ?></td>
                                                <td><?php echo $filtred->getFirstName() ?></td>
                                                <td><?php echo $filtred->getDni() ?></td>
                                                <td><?php echo $filtred->getFileNumber() ?></td>
                                                <td><?php echo $filtred->getGender() ?></td>
                                                <td><?php echo $filtred->getBirthDate() ?></td>
                                                <td><?php echo $filtred->getEmail() ?></td>
                                                <td><?php echo $filtred->getPhoneNumber() ?></td>
                                                <td><?php echo ($filtred->getActive()) ? "Si" :  "No"; ?></td>
                                             </tr>
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