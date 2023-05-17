<?php include 'template/header.php' ?>
  
<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from persona");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
            <div class="card-header">
                    Lista de operarios
                </div>
                <div class="p-4">
                    <table class="table align-middle">                       
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Turno</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col" colspan="2"> Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                foreach($persona as $dato){ 
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->codigo; ?></td>
                                    <td><?php echo $dato->nombre; ?></td>
                                    <td><?php echo $dato->turno; ?></td>
                                    <td><?php echo $dato->fecha; ?></td>
                                    <td><?php echo $dato->material; ?></td>
                                    <td><?php echo $dato->cantidad; ?></td>
                                    <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr> 
                                <?php 
                                }
                            ?>                         
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form action="" class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label  class="form-label">Nombre:</label>
                        <input type="text" class="for-control" name="txtNombre" autofocus>
                    </div>

                    <div class="mb-3">
                        <label>Turnos:</label>
                    <select name="turnos" id="turns">
                        <option value="selecciona">Selecciona un turno</option>
                        <option value="turno 1">turno 1</option>
                        <option value="tuno 2">turno 2</option>
                        <option value="turno 3">tuno 3</option>
                    </select>
                    </div>

                    <div class="mb-3">                        
                        <label>ingresar fecha:</label>
                        <input type="date" id="start" name="trip-start"
                            value="2023-05-17"
                            min="2023-01-01" max="2023-12-31">
                    </div>

                    <div class="mb-3">
                            <label>Material:</label>
                            <select name="material" id="material">
                            <option value="selecciona">Selecciona tu material</option>
                            <option value="producto seco">producto seco</option>
                            <option value="producto humedo">producto humedo</option>
                            <option value="otros:">otros:</option>
                        </select>
                        </div>

                    <div class="mb-3">
                        <label>Cantidad</label>
                        <input type="number" id="tentacles" name="tentacles"
                        min="1" max="100">
                    </div>  
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">

                    </div>                 
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?> 
