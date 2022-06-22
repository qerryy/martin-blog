<?php

class Comment extends Controller {

    public function store()
    {
        $data = [
            'id_user' => $_POST['id_user'],
            'id_artikel' => $_POST['id_artikel'],
            'comment' => htmlspecialchars($_POST['comment']),
        ];

        if ($this->model('BlogModel')->storeComment($data) > 0) {
            header('Location: ' . BASEURL . '/blog/detail/' . $data['id_artikel']);
            exit;
        } else {
            die('Error :(');
        }
    }
}