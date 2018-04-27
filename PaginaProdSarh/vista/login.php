<?php
$login = new Login();

$login->manterSession();
?>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container" >

    <form id="signup" method="POST">

        <div class="header">

            <h3 >Bienvenido</h3>

            <p>Completa el formulario</p>

        </div>

        <div class="sep"></div>

        <div class="inputs">

            <input type="email" placeholder="e-mail" autofocus name="usuario" required  />

            <input type="password" placeholder="Password" name="password" required />
            <div class="g-recaptcha" data-sitekey="6Lfk2lUUAAAAAPQKcBNZI6DcRfJQnUBrWykcbBbY"></div>
            <button id="submit" >Ingresar</button>
            <br>

            <p>No eres Miembro? <a href="#">Registrate Ahora</a><span class="fontawesome-arrow-right"></span></p>

        </div>

    </form>

</div>








<?php
if ($_POST) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $captcha = $_POST['g-recaptcha-response'];
    //echo "<script> alert('usuario->" . $usuario . "'); </script>";
    //echo "<script> alert('password->" . $password . "'); </script>";
    $login->setUsuario($usuario);
    $login->setPassword($password);
    $login->login($captcha);
}
?>

