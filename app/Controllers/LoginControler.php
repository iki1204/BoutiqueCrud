<?php
class LoginController
{
    public function index(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = (string)($_POST['password'] ?? '');

            if ($username === '' || $password === '') {
                flash_set('warning', 'Ingresa usuario y contraseña.');
                redirect('index.php?route=login');
            }

            require_once __DIR__ . '/../../config/database.php';

            try {
                $authConn = new mysqli($DB_HOST, $username, $password, $DB_NAME);
                $authConn->close();
                $_SESSION['auth_user'] = $username;
                flash_set('success', 'Inicio de sesión exitoso.');
                redirect('index.php?route=dashboard');
            } catch (mysqli_sql_exception $e) {
                flash_set('danger', 'Credenciales inválidas para la base de datos.');
                redirect('index.php?route=login');
            }
        }

        render('login/index', [
            'title' => 'Acceso al Sistema',
        ]);
    }

    public function logout(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        unset($_SESSION['auth_user']);
        flash_set('info', 'Sesión cerrada correctamente.');
        redirect('index.php?route=login');
    }
}