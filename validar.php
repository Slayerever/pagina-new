<?php
$servidor="localhost";
$usuario="root";
$clave="";
$bddatos="base_de_datos_licoreria";
$conexion=mysqli_connect($servidor,$usuario,$clave,$bddatos) or die("CONEXION FALLIDA");


//INSERTAR DATOS
if(isset($_POST["registrar"])){
    $Nombre= $_POST['Nombre'];
    $Apellido=$_POST['Apellido'];
    $Email=$_POST['Email'];
    $Usuario=$_POST['Usuario'];
    $contrasenia=$_POST['contrasenia'];
    
   
    $insertar="insert into registrarse values(' ',' ".$Nombre." ',' ".$Apellido." ',' ".$Email." ',' ".$Usuario." ',' ".$contrasenia." ')";
    $resultado= mysqli_query($conexion,$insertar) or die("ERROR AL INSERTAR REGISTROS");
    mysqli_close($conexion);
        echo"<script>alert('DATOS INSERTADOS CORRECTAMENTE')</script>";
        echo"<script>location.href=login.html'</script>";
    }
    
   
   if(isset($_POST["loginear"])){
    $usuario=$_POST['usuario'];
    $contrasenia=$_POST['Ucontrasenia'];
    
    $sentencia=$conexion->prepare("SELECT * FROM registrarse WHERE usuario=? AND Ucontrasenia=? ");
    $sentencia->bind_param(' ss ',$usuario,$Ucontrasenia);
    $sentencia->execute();
    $resultado = $sentencia ->get_result();
    if ($fila = $resultado->fetch_assoc()) {
        header("location:index.php");
        
    }else{
        echo "<script>alert('usuario o contraseña incorrecta')</script>";
        echo "<script>location.href='index.html' </script> ";
    }
    
   $sentencia->close();
   $conexion->close();
    }  
    
    
?>



