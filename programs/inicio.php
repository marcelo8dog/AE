<?php
  include("conection.php")
  $usuario=$_POST['usuario'];
  $contra=$_POST['contra'];
  mysqli_real_escape_string($usuario);
  mysqli_real_escape_string($cuenta);
  $res=mysqli_query(conection(),"SELECT * FROM usuario WHERE cuenta==".$usuario.";");
  $fila=mysqli_fetch_assoc($res)
  if($res===NULL)
     echo "usuario o contraseña invalido";
    else{
      echo "window.location = 'index.html';";
      echo $usuario.$contra;
    }
?>
