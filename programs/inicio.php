<?php
  include("conection.php");
  if(isset($_POST['nusuario'],$_POST['ncontra']))
  {
    $rusuario=$_POST['nusuario'];
    $rcontra=$_POST['ncontra'];
    $nusuario=mysqli_real_escape_string(conection(),$rusuario);
    $ncontra=mysqli_real_escape_string(conection(),$rcontra);
    $new = hash('sha512', $ncontra);
    echo $new."**\n";
    $newpas= password_hash($new, PASSWORD_DEFAULT);
    echo $newpas;
    $que="INSERT INTO usuario (cuenta,password) VALUES ('".$nusuario."','".$newpas."')";
    $re=mysqli_query(conection(),$que);
    echo "succes";
  }
  else{
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
        $chec = hash('sha512', $contra);
        if (password_verify($chec, $fila['password']))
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
   }
?>
