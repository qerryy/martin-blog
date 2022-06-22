<div class="col py-3">
    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($data['users'] as $user) : ?>
                    <tr>
                        <td><?=$user['nama'];?></td>
                        <td><?=$user['username'];?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>