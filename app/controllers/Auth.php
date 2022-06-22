<?php

class Auth extends Controller {

    public function index()
    {
        $this->view('templates/header');
        $this->view('auth/login');
        $this->view('templates/footer');
    }

    public function register() 
    {
        $this->view('templates/header');
        $this->view('auth/register');
        $this->view('templates/footer');
    }

    public function registerStore()
    {
        $data = [
            'nama' => htmlspecialchars($_POST['nama']),
            'username' => htmlspecialchars($_POST['username']),
            'password' => htmlspecialchars($_POST['password']),
        ];

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if ($this->model('UserModel')->register($data) > 0) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            die('Error :(');
        }
    }

    public function loginStore()
    {
        if (empty($_POST['username']) && empty($_POST['password'])) {
            die('Username & Password harus diisi');
        } else {
            $loginUser = $this->model('UserModel')->login($_POST['username'], $_POST['password']);
            // die(var_dump($loginUser));

            if (is_null($loginUser)) {
                die('Gagal Login');
            } else {
                $this->createUserSession($loginUser);
            }
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_role'] = $user['role'];

        if ($_SESSION['user_role'] == 0) {
            // die(var_dump('User biasa'));
            header('Location: '. BASEURL .'/blog');
        } else {
            // die(var_dump('Admin'));
            header('Location: '. BASEURL .'/blog/table');
        }

    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['nama']);
        unset($_SESSION['username']);
        unset($_SESSION['user_role']);
        session_destroy();

        header('Location: '. BASEURL .'/auth');
    }
}