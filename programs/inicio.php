<?php
  include("conection.php");
  $usuarior=$_POST['usuario'];
  $contrar=$_POST['contra'];
  $usuario=mysqli_real_escape_string(conection(),$usuarior);
  $contra=mysqli_real_escape_string(conection(),$contrar);
  $query = "SELECT * FROM usuario WHERE cuenta = '".$usuario."';";
  $res=mysqli_query(conection(),$query);
  $fila=mysqli_fetch_assoc($res);
  if($fila==NULL)
     echo "usuario incorrecto";
    else{
      if($fila['password']==$contra)
      {
        session_start();
        $_SESSION['usuario']=$usuario;
        echo "true";
        // header('Location: http://localhost/AE/acceso.html');
      }
      else{
        echo "contraseña invalida";
      }
    }
?>
