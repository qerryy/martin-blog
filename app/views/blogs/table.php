<div class="col py-3">
    <div class="container">

        <a href="<?= BASEURL; ?>/blog/create" class="btn btn-primary btn-sm text-uppercase">tambah artikel</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Judul</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['artikels'] as $artikel) : ?>
                    <tr>
                        <td><?= $artikel['judul'] ?></td>
                        <td>
                            <img src="<?=BASEURL;?>/gambars/<?=$artikel['gambar']?>" alt="<?= $artikel['judul'] ?>" class="img-fluid" width="100">
                        </td>
                        <td class="align-middle">
                            <div class="d-flex">
                                <a href="<?=BASEURL;?>/blog/edit/<?=$artikel['id_artikel'];?>" class="btn btn-outline-success btn-sm me-2">Edit</a>

                                <form action="<?=BASEURL;?>/blog/delete/<?=$artikel['id_artikel'];?>" method="POST">
                                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin untuk menghapus artikel ini?');">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>