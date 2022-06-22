<div class="py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-md-2 justify-content-center gy-5">

            <?php foreach($data['artikels'] as $artikel) : ?>
                <div class="col-md-4">
                    <div class="card shadow">
                        <img src="<?=BASEURL;?>/gambars/<?=$artikel['gambar']?>" alt="Gambar" class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?= $artikel['judul'] ?>
                            </h4>
                            <p class="card-text text-truncate">
                                <?= $artikel['deskripsi'] ?>
                            </p>
                            <a href="<?=BASEURL;?>/blog/detail/<?=$artikel['id_artikel'];?>" class="btn btn-sm btn-outline-secondary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>