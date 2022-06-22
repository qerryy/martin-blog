<div class="container">
    <div class="p-5 mt-5 card rounded w-50 mx-auto">
        <form action="<?= BASEURL; ?>/auth/loginStore" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button class="btn btn-success w-100" type="submit">Login</button>
        </form>
    </div>
</div>