<div class="col py-3">
    <div class="container">
        <form action="<?=BASEURL;?>/blog/store"  method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" autofocus required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" cols="50" rows="10" required></textarea>
            </div>

            <div class="mb-5">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar" required>
            </div>

            <a href="<?=BASEURL;?>/blog/table" class="btn btn-outline-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Tambah</button>

        </form>
    </div>
</div>