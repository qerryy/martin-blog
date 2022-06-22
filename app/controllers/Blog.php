<?php

class Blog extends Controller {

    public function index()
    {
        $data['artikels'] = $this->model('BlogModel')->getAllArtikel();

        $this->view('templates/header');
        $this->view('blogs/index', $data);
        $this->view('templates/footer');
    }

    public function table()
    {
        $data['artikels'] = $this->model('BlogModel')->getAllArtikel();

        $this->view('templates/header-admin');
        $this->view('blogs/table', $data);
        $this->view('templates/footer-admin');
    }

    public function create()
    {
        $this->view('templates/header-admin');
        $this->view('blogs/create');
        $this->view('templates/footer-admin');
    }

    public function store()
    {
        $data = [
            'judul' => htmlspecialchars(trim($_POST['judul'])),
            'deskripsi' => htmlspecialchars($_POST['deskripsi']),
        ];

        if ( empty($data['judul']) ) {
            $data['judulError'] = 'Judul harus diisi';
        }

        if ( empty($data['deskripsi']) ) {
            $data['deskripsiError'] = 'Tulisan harus diisi';
        }

        // Validasi gambar
        if ( !empty($_FILES['gambar']) ) {
            $img_name = $_FILES['gambar']['name'];
            $img_size = $_FILES['gambar']['size'];
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $img_error = $_FILES['gambar']['error'];

            if ( $img_error === 0 ) {
                if ( $img_size > 5500000 ) {
                    $data['gambarError'] = 'Gambar anda oversize max 5 mb';
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_ex = array("jpg", "jpeg", "png");

                    if ( in_array($img_ex_lc, $allowed_ex) ) {
                        $data['gambar'] = $new_img_name = uniqid("CO-", true). '.' .$img_ex_lc;
                        $img_path = PATH. 'gambars/' .$new_img_name;
                        move_uploaded_file($tmp_name, $img_path);
                    } else {
                        $data['gambarError'] = 'Format gambar adalah jpg, jpeg, png';
                    }
                }
            } else {
                $data['gambarError'] = 'Error saat upload gambar!';
            }
        } else {
            $data['gambarError'] = 'gambar harus diiisi';
        }


        if ( empty($data['judulError']) && empty($data['deskripsiError']) & empty($data['gambarError']) ) {
            if ($this->model('BlogModel')->insertArtikel($data) > 0) {
                // Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
                header('Location: ' . BASEURL . '/blog/table');
                exit;
            } else {
                // Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/blog/create');
                exit;
            }
        } else {
            die(var_dump($data['judulError'], $data['deskripsiError'], $data['gambarError']));
        }
    }

    public function edit($id)
    {
        $data['artikel'] = $this->model('BlogModel')->getArtikelById($id);

        $this->view('templates/header-admin');
        $this->view('blogs/edit', $data);
        $this->view('templates/footer-admin');
    }

    public function update()
    {
        $gambar['artikel'] = $this->model('BlogModel')->getImageArtikelById($_POST['id_artikel']);
        
        $data = [
            'id' => $_POST['id_artikel'],
            'judul' => htmlspecialchars(trim($_POST['judul'])),
            'deskripsi' => htmlspecialchars($_POST['deskripsi']),
            'judulError' =>  '',
            'deskripsiError' => '',
            'gambarError' => '',
        ];

        if ( empty($data['judul']) ) {
            $data['judulError'] = 'Judul harus diisi';
        }

        if ( empty($data['deskripsi']) ) {
            $data['deskripsiError'] = 'Tulisan harus diisi';
        }

        // Validasi gambar
        if ( empty($_FILES['gambar']['name']) ) {
            $data['gambar'] = $gambar['artikel']['gambar'];
        } else {
            $img_name = $_FILES['gambar']['name'];
            $img_size = $_FILES['gambar']['size'];
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $img_error = $_FILES['gambar']['error'];

            if ( $img_error === 0 ) {
                if ( $img_size > 5500000 ) {
                    $data['gambarError'] = 'Gambar anda oversize max 5 mb';
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_ex = array("jpg", "jpeg", "png");

                    if ( in_array($img_ex_lc, $allowed_ex) ) {
                        $data['gambar'] = $new_img_name = uniqid("CO-", true). '.' .$img_ex_lc;
                        $img_path = PATH. 'gambars/' .$new_img_name;
                        move_uploaded_file($tmp_name, $img_path);
                    } else {
                        $data['gambarError'] = 'Format gambar adalah jpg, jpeg, png';
                    }
                }
            } else {
                $data['gambarError'] = 'Error saat upload gambar!';
            }

            $old_file = PATH. 'gambars/' .$gambar['artikel']['gambar'];

            if (file_exists($old_file)) {
                unlink($old_file);
            } else {
                echo "
                <script>
                    console.log('gambar lama gagal dihapus')'
                </script>
                ";
            }
        }


        if ( empty($data['judulError']) && empty($data['deskripsiError']) & empty($data['gambarError']) ) {
            if ($this->model('BlogModel')->updateArtikel($data) > 0) {
                // Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
                header('Location: ' . BASEURL . '/blog/table');
                exit;
            } else {
                // Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/blog/edit/' . $data['id']);
                exit;
            }
        } else {
            die(var_dump($data['judulError'], $data['deskripsiError'], $data['gambarError']));
        }
    }

    public function delete($id)
    {
        $gambar['artikel'] = $this->model('BlogModel')->getImageArtikelById($id);

        if ($this->model('BlogModel')->deleteArtikel($id) > 0) {
            // Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            $old_file = PATH. 'gambars/' .$gambar['artikel']['gambar'];
            
            if (file_exists($old_file)) {
                unlink($old_file);
            } else {
                echo "gambar lama gagal dihapus";
            }

            header('Location: ' . BASEURL . '/blog/table');
            exit;
        } else {
            // Flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/blog/table');
            exit;
        }
    }

    public function detail($id)
    {
        $data['artikel'] = $this->model('BlogModel')->getArtikelById($id);
        $data['comments'] = $this->model('BlogModel')->getAllCommentByArtikelId($id);

        $this->view('templates/header');
        $this->view('blogs/detail', $data);
        $this->view('templates/footer');
    }
}