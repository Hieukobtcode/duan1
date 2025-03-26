<?php
class loginController {
    public $loginModel;

    function __construct() {
        $this->loginModel = new loginModel();
    }

    function login() {
        if (isset($_POST['btn_login'])) {
            $email = $_POST['Email'];
            $password = $_POST['Mat_khau'];

            // Kiểm tra thông tin đăng nhập
            if ($this->loginModel->checkAcc($email, $password)) {
                $_SESSION['dn'] = $email;
                echo '<script> window.location = "?act=trangChu"; </script>';
            } else {
                echo "<script>alert('Lỗi: Không thể đăng nhập');</script>";
            }
        }

        require_once 'views/loginView/login.php';
    }

    function logout() {
        session_unset(); 
        session_destroy(); 
        echo '<script> window.location = "./"; </script>';
    }
}
?>
