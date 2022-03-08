<?php include "../template/cabecera.php"; 
include "../config/db.php";
// print_r($_POST);
// print_r($_FILES);

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";

$txtImg = (isset($_FILES['txtImg']['name']))?$_FILES['txtImg']['name']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";

switch ($accion) {
    case 'Agregar':

        $sentenciaSQL = $conexion -> prepare("INSERT INTO libro (nombre, imagen) VALUES (:nombre, :imagen)");
        $sentenciaSQL -> bindParam(':nombre', $txtNombre);
        $sentenciaSQL -> bindParam(':imagen', $txtImg);
        $sentenciaSQL -> execute();

        // echo "Precionado botón Agregar";
        break;
    case 'Modificar':
        $sentenciaSQL = $conexion -> prepare("UPDATE libro SET nombre = :nombre WHERE id = :id");
        $sentenciaSQL -> bindParam(':id', $txtID);
        $sentenciaSQL -> bindParam(':nombre', $txtNombre);
        $sentenciaSQL -> execute();
        
        
        if ($txtImg != "") {
            $sentenciaSQL = $conexion -> prepare("UPDATE libro SET imagen = :imagen WHERE id = :id");
            $sentenciaSQL -> bindParam(':id', $txtID);
            $sentenciaSQL -> bindParam(':imagen', $txtImg);
            $sentenciaSQL -> execute();
        }


        // echo "Precionado botón Modificar";
        break;
    case 'Cancelar':
        // echo "Precionado botón Cancelar";
        break;
    case 'Seleccionar':
        $sentenciaSQL = $conexion -> prepare("SELECT * FROM libro WHERE id = :id");
        $sentenciaSQL -> bindParam(':id', $txtID);
        $sentenciaSQL -> execute();
        $libro = $sentenciaSQL -> fetch(PDO::FETCH_LAZY);

        $txtNombre = $libro['nombre'];
        $txtImg = $libro['imagen'];
        // echo "Precionado botón Seleccionar";
        break;
    case 'Borrar':

        $sentenciaSQL = $conexion -> prepare("DELETE FROM libro WHERE id=:id");
        $sentenciaSQL -> bindParam(':id', $txtID);
        $sentenciaSQL -> execute();
        // echo "Precionado botón Borrar";
        break;
    default:
        # code...
        break;
}

$sentenciaSQL = $conexion -> prepare("SELECT * FROM libro");
$sentenciaSQL -> execute();
$listaLibros = $sentenciaSQL -> fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-5">
    <div class="card">

        <div class="card-header">
            Datos de Libro
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class = "form-group">
                    <label for="txtID">ID</label>
                    <input type="text" value="<?php echo $txtID; ?>" class="form-control" id="txtID" name="txtID" placeholder="ID">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" value="<?php echo $txtNombre; ?>" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="txtImg">Imagen:</label> <?php echo $txtImg; ?>
                    <input type="file" class="form-control" id="txtImg" name="txtImg" placeholder="Nombre">
                </div>
                
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>
        </div>
     
    </div>

</div>
<div class="col-md-7"> 
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($listaLibros as $libro) { ?>
                    
                    <tr>
                        <td><?php echo $libro['id']; ?></td>
                        <td><?php echo $libro['nombre']; ?></td>
                        <td><?php echo $libro['imagen']; ?></td>

                        <td>
                            <form  method='POST'>
                                <input type='hidden' name='txtID' id='txtID' value='<?php echo $libro['id']; ?>' />
                                
                                <input type='submit' name='accion' value='Seleccionar' class='btn btn-primary' />
                                <input type='submit' name='accion' value='Borrar' class='btn btn-danger' />
                            </form>
                        </td>
                    </tr>                                       
                    
            <?php } ?>
                
            
        </tbody>
    </table>

</div>


<?php include "../template/pie.php"; ?>