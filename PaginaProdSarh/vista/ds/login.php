<?php
session_start(); 
include_once './layout/layout_header.php';
include_once '../configuracion/Database.php';
include '../modelo/login.php';
$login = new Login();

$login->manterSession();
   
?>

 <div class = "container">
    <div class="wrapper">
        <form action="" method="post" name="Login_Form" class="form-signin">       
            <h3 class="form-signin-heading">Bienvenidos</h3>
              <hr class="colorgraph"><br>
              
              <input type="text" class="form-control" name="Username" placeholder="Username" required="" autofocus="" />
              <input type="password" class="form-control" name="Password" placeholder="Password" required=""/>     


             
              <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Registrarse</button>  
               <br>
               
            <div class="text center"> 
        <button class="btn" onclick="window.location.href='registro.php'" name="btn-reg" type="submit">Registrarme</button>
       </div>
                   
        </form> 
    </div>
</div>
        

<?php
if($_POST){
   $login->setUsuario($_POST['username']);
   $login->setPassword($_POST['password']);
   $login->login();
}
?>

<?php
include_once './layout/layout_footer.php';
?>
 