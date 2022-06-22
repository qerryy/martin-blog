<div class="container">
    <div class="p-5 mt-5 border border-secondary rounded w-50 mx-auto">

        <form action="<?= BASEURL; ?>/auth/registerStore" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Register</button>
        </form>
        
    </div>
</div>