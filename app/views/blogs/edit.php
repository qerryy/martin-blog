<div class="col py-3">
    <div class="container">
        <h2>Edit Artikel</h2>
        <form action="<?=BASEURL?>/blog/update"  method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id_artikel" value="<?=$data['artikel']['id_artikel']?>">

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['artikel']['judul']; ?>" autofocus required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" cols="50" rows="10" required><?= $data['artikel']['deskripsi']; ?></textarea>
            </div>

            <div class="mb-5">
                <label for="gambar" class="form-label">Gambar Baru <small class="text-secondary">(Opsional)</small></label>
                <input type="file" class="form-control" name="gambar" id="gambar">
            </div>

            <a href="<?=BASEURL;?>/blog/table" class="btn btn-outline-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
</div>