<?php

include "../conexion.php";

if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['ingreso']) || empty($_POST['vencimiento']))
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
    }else{

        $id_ingrediente = $_POST['id_ingrediente'];
        $nombre = $_POST['nombre'];
        $descripcion  = $_POST['descripcion'];
        $ingreso  = $_POST['ingreso'];
        $vencimiento  = $_POST['vencimiento'];
       
      
        $query = mysqli_query($conection,"SELECT * FROM ingrediente WHERE (nombre = '$nombre' AND id_ingrediente != $id_ingrediente)");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error"> El nombre del ingrediente ya existe.</p>';
        }else{

            if(empty($_POST['clave']))
            {

                $sql_update = mysqli_query($conection,"UPDATE ingrediente SET nombre = '$nombre',descripcion ='$descripcion',ingreso='$ingreso',vencimiento='$vencimiento' 
                                                                        WHERE id_ingrediente= $id_ingrediente ");
                                                                        

            }else{
                $sql_update = mysqli_query($conection, "UPDATE usuario SET nombre = '$nombre',descripcion ='$descripcion',ingreso='$ingreso',vencimiento='$vencimiento' 
                                                                        WHERE id_ingrediente= $id_ingrediente ");
            }

            if($sql_update){
                $alert='<p class="msg_save">Ingrediente actualizado correctamente.</p>';
            }else{
                $alert='<p class="msg_error">Error al actualizar el ingrediente.</p>';
            }
        }
            
    }
}

//Mostrar datos
if(empty($_REQUEST['id']))
{
    header('Location: ../listado_ingrediente/listado_ingrediente.php');
}
$id_ingrediente = $_REQUEST['id'];

$sql= mysqli_query($conection,"SELECT u.id_ingrediente, u.nombre, u.descripcion, u.ingreso, u.vencimiento 
                                FROM ingrediente u
                                WHERE id_ingrediente= $id_ingrediente ");
$result_sql = mysqli_num_rows($sql);

if($result_sql == 0){
    header('Location: ../listado_ingrediente/listado_ingrediente.php');
}else{

    while ($data = mysqli_fetch_array($sql)){

        $id_ingrediente  = $data['id_ingrediente'];
        $nombre  = $data['nombre'];
        $descripcion  = $data['descripcion'];
        $ingreso = $data['ingreso'];
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
    <title>Actualizar Ingrediente</title>
    <link rel="stylesheet" href="register.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>
<body>
    <header class="contenedor-header" >
    
        <p class="texto">Bon appétit</p>
<img class="santisimo" src="Img/pastel_anim.png" alt="Cerrar">            
<a href="../inicio/salir.php"><img class="close" img src="Img/cerrar cesion.png" alt="Cerrar"></a>
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
                    <li><a href="../pastel/registro_pastel.php">Nuevo Pastel</a></li>
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
          
        <h1>Actualizar Ingreso</h1> 
         <hr>
         <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

         <form action="" method="post">
             <input type="hidden" name="id_ingrediente" value="<?php echo $id_ingrediente; ?>">
             <label for="nombre">Nombre</label>
             <input type="text" id="nombre" name="nombre" placeholder="Nombre Ingrediente" value="<?php echo $nombre; ?>">
             <label for="descripcion">Descripción</label>
             <input type="text" id="descripcion"  name="descripcion" placeholder="Descripción" value="<?php echo $descripcion; ?>">
             <label for="ingreso">Fecha de Ingreso</label> 
             <input type="text" name="ingreso"  id="ingreso" placeholder="ingreso" value="<?php echo $ingreso; ?>">
             <label for="vencimiento">Fecha de vencimiento</label> 
             <input type="text" name="vencimiento"  id="vencimiento" placeholder="vencimiento" value="<?php echo $vencimiento; ?>">
             <input type="submit" value="Actualizar ingrediente" class="btn_save">
         </form>

    </div>

   </section>


</body>
</html>