<?php

include "../conexion.php";

if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['preparado_por']) || empty($_POST['creacion']) || empty($_POST['vencimiento']))
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
    }else{

        $id_Pastel = $_POST['id_Pastel'];
        $nombre = $_POST['nombre'];
        $descripcion  = $_POST['descripcion'];
        $preparado_por   = $_POST['preparado_por'];
        $creacion  = $_POST['creacion'];
        $vencimiento  = $_POST['vencimiento'];
       
      
        $query = mysqli_query($conection,"SELECT * FROM pastel WHERE (nombre = '$nombre' AND id_Pastel != $id_Pastel)");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error"> El nombre del pastel ya existe.</p>';
        }else{

            if(empty($_POST['clave']))
            {

                $sql_update = mysqli_query($conection,"UPDATE pastel SET nombre = '$nombre',descripcion ='$descripcion',preparado_por='$preparado_por',creacion='$creacion',vencimiento='$vencimiento' 
                                                                        WHERE id_Pastel= $id_Pastel ");
                                                                        

            }else{
                $sql_update = mysqli_query($conection, "UPDATE pastel SET nombre = '$nombre',descripcion ='$descripcion',preparado_por='$preparado_por',creacion='$creacion',vencimiento='$vencimiento' 
                                                                        WHERE id_Pastel= $id_Pastel ");
            }

            if($sql_update){
                $alert='<p class="msg_save">Pastel actualizado correctamente.</p>';
            }else{
                $alert='<p class="msg_error">Error al actualizar el pastel.</p>';
            }
        }
            
    }
}

//Mostrar datos
if(empty($_REQUEST['id']))
{
    header('Location: ../listado_pastel/listado_pastel.php');
}
$id_Pastel = $_REQUEST['id'];

$sql= mysqli_query($conection,"SELECT p.id_Pastel, p.nombre, p.descripcion, p.preparado_por, p.creacion, p.vencimiento 
                                FROM pastel p
                                WHERE id_Pastel= $id_Pastel ");
$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
    header('Location: ../listado_pastel/listado_pastel.php');
}else{

    while ($data = mysqli_fetch_array($sql)){

        $id_Pastel  = $data['id_Pastel'];
        $nombre  = $data['nombre'];
        $descripcion  = $data['descripcion'];
        $preparado_por = $data['preparado_por'];
        $creacion = $data['creacion'];
        $vencimiento = $data['vencimiento'];

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Pastel</title>
    <link rel="stylesheet" href="register.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>
<body>
    <header class="contenedor-header" >
    
        <p class="texto">Bon appétit</p>
<img class="santisimo" src="Img/pastel_anim.png" alt="Cerrar">            
<a href="../constancia/salir.php"><img class="close" img src="Img/cerrar cesion.png" alt="Cerrar"></a>
        <div class="cont-reloj">
           
            <div class="reloj" id="reloj" > </div>
            <div class="datos">
                <span id="fec_Dato"> </span>
            </div>
        </div>



    </header>

    <script src="reloj.js"></script>
  
    <!-- menu despegable -->
 <div class="menu">    
    <nav>
        <ul>
            <li><a href="../inicio/Inicio.php">Inicio</a></li>
            <li class="principal">
                <a href="#">Pastel</a>
                <ul>
                    <li><a href="registro_pastel.php">Nuevo Pastel</a></li>
                    <li><a href="../listado_pastel/listado_pastel.php">Lista de Pasteles</a></li>
                </ul>
            </li>
            <li class="principal">
                <a href="#">Ingrediente</a>
                <ul>
                    <li><a href="../ingrediente/registro_ingrediente.php">Nuevo Ingrediente</a></li>
                    <li><a href="../listado_ingrediente/listado_ingrediente.php">Lista de Ingredientes</a></li>
                </ul>
            </li>
            <li><a href="../detalle_pastel/detalle.php">Detalle pastel</a></li>
        </ul>
    </nav>
</div>

   <section id="container">

    <div class="form_register">
          
        <h1>Actualizar Pastel</h1> 
         <hr>
         <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

         <form action="" method="post">
             <input type="hidden" name="id_Pastel" value="<?php echo $id_Pastel; ?>">
             <label for="nombre">Nombre</label>
             <input type="text" id="nombre" name="nombre" placeholder="Nombre Pastel" value="<?php echo $nombre; ?>">
             <label for="descripcion">Descripción</label>
             <input type="text" id="descripcion"  name="descripcion" placeholder="Descripción" value="<?php echo $descripcion; ?>">
             <label for="preparado_por">Preparado por</label> 
             <input type="text" name="preparado_por"  id="preparado_por" placeholder="Preparado por" value="<?php echo $preparado_por; ?>">
             <label for="creacion">Fecha de creación</label> 
             <input type="text" name="creacion"  id="creacion" placeholder="creacion" value="<?php echo $preparado_por; ?>">
             <label for="vencimiento">Fecha de vencimiento</label> 
             <input type="text" name="vencimiento"  id="vencimiento" placeholder="vencimiento" value="<?php echo $vencimiento; ?>">
             <input type="submit" value="Actualizar usuario" class="btn_save">
         </form>

    </div>

   </section>


</body>
</html>