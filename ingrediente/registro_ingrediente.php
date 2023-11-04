<?php

include "../conexion.php";

if(!empty($_POST))
{
    $alert='';
    if(empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['ingreso']) || empty($_POST['vencimiento']))
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
    }else{

        

        $nombre = $_POST['nombre'];
        $descripcion  = $_POST['descripcion'];
        $ingreso  = $_POST['ingreso'];
        $vencimiento  = $_POST['vencimiento'];
       


        $query = mysqli_query($conection,"SELECT * FROM ingrediente WHERE nombre = '$nombre'");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error"> El nombre del ingrediente ya existe.</p>';
        }else{

            $query_insert = mysqli_query($conection, "INSERT INTO ingrediente(nombre,descripcion,ingreso,vencimiento) 
                                                                VALUES('$nombre','$descripcion','$ingreso','$vencimiento')");

                                                                if($query_insert){
                                                                    $alert='<p class="msg_save">Ingrediente ingresado con exito.</p>';
                                                                }else{
                                                                    $alert='<p class="msg_error">Error al ingresar el ingrediente.</p>';
                                                                }
        }
            
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
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
                <a href="#">Ingredientes</a>
                <ul>
                    <li><a href="registro_ingrediente.php">Nuevo Ingrediente</a></li>
                    <li><a href="../listado_ingrediente/listado_ingrediente.php">Lista de Ingredientes</a></li>
                </ul>
            </li>
            <li><a href="../detalle_pastel/detalle.php">Detalle Pastel</a></li>
        </ul>
    </nav>
</div>

   <section id="container">

    <div class="form_register">
          
        <h1>Registro de Ingrediente</h1> 
         <hr>
         <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

         <form action="" method="post">
             <label for="nombre">Nombre</label>
             <input type="text" id="nombre" name="nombre" placeholder="Nombre del ingrediente">
             <label for="descripcion">Descripción</label>
             <input type="text" id="descripcion"  name="descripcion" placeholder="Descripción">
             <label for="ingreso">Fecha de Ingreso</label> 
             <input type="text" name="ingreso"  id="ingreso" placeholder="Fecha de Ingreso" >
             <label for="vencimiento">Fecha Vencimiento</label>
             <input type="vencimiento" name="vencimiento" id="vencimiento" placeholder="Fecha de vencimiento">
             <input type="submit" value="Ingresar ingrediente" class="btn_save">
         </form>

    </div>

   </section>


</body>
</html>