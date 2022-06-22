<?php

class User extends Controller {

    public function index()
    {
        $data['users'] = $this->model('UserModel')->getAllUsers();

        $this->view('templates/header-admin');
        $this->view('users/table', $data);
        $this->view('templates/footer-admin');
    }

    public function setting()
    {
        $data['user'] = $this->model('UserModel')->getUserById($_SESSION['user_id']);

        $this->view('templates/header');
        $this->view('users/setting', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        $data = [
            'id_user' => $_SESSION['user_id'],
            'nama' => htmlspecialchars($_POST['nama']),
            'username' => htmlspecialchars($_POST['username']),
        ];

        if ( empty($_POST['password']) ) {
            if ($this->model('UserModel')->updateWithoutPass($data) > 0) {
                header('Location: ' . BASEURL . '/user/setting/' . $_SESSION['user_id']);
                exit;
            } else {
                die('Error :(');
            }

        } else {
            $data['password'] =htmlspecialchars($_POST['password']);
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
            if ($this->model('UserModel')->updateWithPass($data) > 0) {
                header('Location: ' . BASEURL . '/user/setting/' . $_SESSION['user_id']);
                exit;
            } else {
                die('Error :(');
            }
        }
    }
}