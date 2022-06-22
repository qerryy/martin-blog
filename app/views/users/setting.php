
<div class="py-5">
    <div class="container">

        <h2>Setting</h2>

        <form action="<?=BASEURL?>/user/update"  method="POST">

            <input type="hidden" name="id_user" value="<?=$data['user']['id_user']?>">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?=$data['user']['nama'];?>" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?=$data['user']['username'];?>" required>
            </div>

            <div class="mb-5">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>

            <a href="<?=BASEURL;?>/blog" class="btn btn-secondary">&#8592; Kembali</a>
            <button type="submit" class="btn btn-primary text-uppercase">Update</button>

        </form>
    </div>
</div>