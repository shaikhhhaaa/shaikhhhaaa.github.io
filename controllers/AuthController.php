<?php
class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = User::getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: login.php?action=dashboard");
                exit();
            } else {
                echo "Invalid login credentials.";
            }
        }

        require 'views/login.php';
    }

    public function logout()
    {
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>
