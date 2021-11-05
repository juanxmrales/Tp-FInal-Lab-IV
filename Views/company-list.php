<?php
     use DAO\CompanyDAO as CompanyDAO;
     require_once('nav.php');
?>
<main class="py-5" style="margin: -7rem 0 12rem 0">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Listado de Empresas</h2>
               <form>
                    <input type="text" name="filter" placeholder="Nombre">
                    <button type="submit" value="Filtrar" class="btn btn-outline-dark">Filtrar</button>
                    <br><br>
               </form>
               <table class="table bg-light-alpha">
                    <thead>
                         <th></th>
                         <th>ID</th>
                         <th>Nombre</th>
                         <th>Calle</th>
                         <th>Nacionalidad</th>
                         <th>Descripcion</th>
 
                    </thead>
                    <tbody>
                         <?php

                         if(!isset($_GET["filter"]) || $_GET['filter'] == ""){


                              foreach($companyList as $company)
                              {
                                   ?>
                                        <tr>
                                             <td><a href="<?php echo FRONT_ROOT; ?>Company/ShowCompanyProfile/<?php echo $company->getId();?>"><button class="btn btn-dark ml-auto d-block">Ver Mas</button></a></td>
                                             <td><?php echo $company->getId(); ?></td>
                                             <td><?php echo $company->getName(); ?></td>
                                             <td><?php echo $company->getStreet(); ?></td>
                                             <td><?php echo $company->getNacionality(); ?></td>
                                             <td><?php echo $company->getDescription(); ?></td>

                                        </tr>
                                   <?php
                                   
                              }
                         }
                         else{
                              $companyDAO = new CompanyDAO();
                              $filtred = $companyDAO->searchCompany($_GET['filter']);

                              if($filtred){
                                        ?>
                                        <tr>
                                             <td><a href="<?php echo FRONT_ROOT; ?>Company/ShowCompanyProfile/<?php echo $filtred->getId();?>"><button class="btn btn-dark ml-auto d-block">Ver Mas</button></a></td>
                                             <td><?php echo $filtred->getId(); ?></td>
                                             <td><?php echo $filtred->getName(); ?></td>
                                             <td><?php echo $filtred->getStreet(); ?></td>
                                             <td><?php echo $filtred->getNacionality(); ?></td>
                                             <td><?php echo $filtred->getDescription(); ?></td>
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