<?php

/**
 * Description of login
 *
 * @author sarai
 */
class Login {

    private $usuario;
    private $password;
    public $con;
    public $tabla = 'usuario';

    public function __construct() {
        $db = Database::getInstance();
        $this->con = $db->getConexion();
    }

    function readUser() {
           $password = $this->getPassword();
            $usuario = $this->getUsuario();
        $query = "SELECT correo , password" .
                " FROM " . $this->tabla ." where correo = '".$usuario."' and password = '".sha1($password)."'";
        
        $rst = $this->con->prepare($query);
        $rst->execute();
        return $rst;
    }

    public function manterSession() {

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo "<script>
	          location='?c=pantallaPrincipal&a=Index';
		  </script> ";
        }
    }

    public function logout() {
        session_start();
        unset($SESSION['username']);
        session_destroy();
        header('Location:?c=login&a=Index');
    }

    public function login($captcha) {
        $registro = $this->readUser();
        if($captcha!=0){
                if ($registro->rowCount() > 0) {
                    $row = $registro->fetch(PDO::FETCH_ASSOC);

                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $this->getUsuario();
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
                        echo "<script>location='?c=pantallaPrincipal&a=Index';</script> ";
                } else {
                    echo "<script> alert('el usuario no existe'); </script>";
                }
         }else{
          require_once 'vista/layout/layout_headerlogin.php';
           echo "<script> 
                    alert('comprobar el captcha'); 
                    location='index.php';
                 </script>";
            require_once 'vista/layout/layout_footer.php';
          }
    }

    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

}
