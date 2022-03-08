<?php include "../template/cabecera.php"; 

// print_r($_POST);
// print_r($_FILES);

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";

$txtImg = (isset($_FILES['txtImg']['name']))?$_FILES['txtImg']['name']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";

echo $txtID . "<br />";
echo $txtNombre . "<br />";
echo $txtImg . "<br />";
echo $accion . "<br />";

switch ($accion) {
    case 'Agregar':
        echo "Precionado botón agregar";
        break;
    case 'Modificar':
        echo "Precionado botón Modificar";
        break;
    case 'Cancelar':
        echo "Precionado botón Cancelar";
        break;
    default:
        # code...
        break;
}

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
                    <input type="text" class="form-control" id="txtID" name="txtID" placeholder="ID">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="txtImg">Imagen:</label>
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
            <tr>
                <td>2</td>
                <td>Aprende php</td>
                <td>Imagen.jpg</td>
                <td>Selecciones | Borrar</td>
            </tr>
        </tbody>
    </table>

</div>


<?php include "../template/pie.php"; ?>