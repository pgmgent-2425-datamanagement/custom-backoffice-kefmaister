<h1>List of users</h1>

<?php if (isset($users) && count($users) > 0): ?>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->username ?></td>
                <td><?= $user->email ?></td>
                <td>
                        <a href="users/edit/<?= $user->id?>" class="button edit-button">Edit</a>
                        <a href="delete.php" class="button delete-button">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif ?>