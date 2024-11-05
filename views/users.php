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
                <td><a href="find/id/<?= $user->id ?>"><?= $user->name ?></a></td>
                <td><?= $user->email ?></td>
                <td>
                        <a href="users/edit/<?= $user->id?>" class="button edit-button">Edit</a>
                        <a href="users/delete/<?= $user->id?>" class="button delete-button" onclick="return confirm('Are you sure you want to delete <?= $user->name ?>?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif ?>