<?php
  include("conection.php");
  $usuarior=$_POST['usuario'];
  $contrar=$_POST['contra'];
  $usuario=mysqli_real_escape_string(conection(),$usuarior);
  $contra=mysqli_real_escape_string(conection(),$contrar);
  echo $usuario.$contra;
  $res=mysqli_query(conection(),"SELECT * FROM usuario WHERE cuenta==".$usuario.";");
  if($res==NULL)
     echo "usuario incorrecto";
    else{
      $fila=mysqli_fetch_assoc($res);
      echo $fila;
      if($fila[password]!=$contra)
      {
          echo "contraseña invalida";
      }
      else{
        session_start();
        $_SESSION['usuario']=$usuario;
        echo "true";
        // header('Location: http://localhost/AE/acceso.html');
        echo "location.href ='http://localhost/AE/acceso.html'";
        // echo $usuario.$contra;
      }
    }
?>
