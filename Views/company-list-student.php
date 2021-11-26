<?php
     use DAO\CompanyDAO as CompanyDAO;
     require_once('nav.php');
?>
<main class="py-5" style="margin: -5rem 0 10rem 0;">
     <section id="listado" class="mb-5">
          <div class="container pt-5">
               <h2 class="mb-4">Listado de Empresas</h2>
               <form>
                    <div class="filtro">
                         <input type="text" name="filter" placeholder="Nombre" class="form-control">
                         <button type="submit" value="Filtrar" class="btn btn-dark ">Filtrar</button>
                    </div>
                    <br>
               </form>
               <table class="table bg-light-alpha">
                    <thead>
                         <th></th>
                         
                         <th>Nombre</th>
                         <th>Calle</th>
                         <th>Nacionalidad</th>
                         <th>Descripción</th>
 
                    </thead>
                    <tbody>
                         <?php
                              if($companyList){

                                   foreach($companyList as $company)
                                   {
                                        ?>
                                             <tr>
                                                  <td><a href="<?php echo FRONT_ROOT; ?>Company/ShowCompanyProfileStudent/<?php echo $company->getId();?>"><button class="btn btn-dark ml-auto d-block">Ver Mas</button></a></td>
                                                  
                                                  <td><?php echo $company->getName(); ?></td>
                                                  <td><?php echo $company->getStreet(); ?></td>
                                                  <td><?php echo $company->getNacionality(); ?></td>
                                                  <td><?php echo $company->getDescription(); ?></td>

                                             </tr>
                                        
                                   <?php }
                              }
                              else{
                                   echo "<tr><td>No se encontraron resultados</td></tr>";
                              }
                         ?>
                        
                    </tbody>
               </table>
          </div>
     </section>
</main>