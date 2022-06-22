<div class="py-5">
    <div class="container">
        <a href="<?=BASEURL;?>/blog" class="btn btn-secondary btn-sm mb-4">&#8592; Kembali</a>

        <div class="card mb-3 shadow">
            <div style="height: 400px;">
                <img
                    src="<?=BASEURL;?>/gambars/<?= $data['artikel']['gambar'] ;?>"
                    class="card-img-top img-fluid h-100"
                    alt="<?= $data['artikel']['judul'] ;?>"
                    style="object-fit: cover;">
            </div>

            <div class="card-body">
                <h5 class="card-title"><?= $data['artikel']['judul'] ;?></h5>
                <p class="card-text mb-5">
                    <?= $data['artikel']['deskripsi'] ;?>
                </p>

                <div class="col border-top border-bottom py-3">
                    <p class="card-text"><small class="text-muted">Comment</small></p>

                    <form action="<?=BASEURL;?>/comment/store" method="POST">
                        <input type="hidden" name="id_artikel" value="<?=$data['artikel']['id_artikel'];?>">
                        <input type="hidden" name="id_user" value="<?=$_SESSION['user_id'];?>">

                        <textarea name="comment" class="form-control mb-3"></textarea>
                        <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                    </form>
                </div>

                <div class="col">
                    <ul class="list-group list-group-flush">
                        <?php foreach($data['comments'] as $comment) : ?>
                            <li class="list-group-item">
                                <h5 class="m-0"><?=$comment['username'];?>:</h5>
                                <p>
                                    <small><?=$comment['koment'];?></small>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
            </div>

        </div>

    </div>
</div>