<h1>information about <?= $user->name ?></h1>

<p>Username: <?= $user->name ?></p>
<p>Email: <?= $user->email ?></p>


<p>Playlist list:</p>

<?php if (isset($playlists) && count($playlists) > 0): ?>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($playlists as $playlist): ?>
            <tr>
                <td><?= $playlist->id ?></td>
                <td><a href="playlist/find/id/<?= $playlist->id ?>"><?= $playlist->name ?></a></td>
                <td>
                        <a href="playlist/edit/<?= $playlist->id?>" class="button edit-button">Edit</a>
                        <a href="playlist/delete/<?= $playlist->id?>" class="button delete-button" onclick="return confirm('Are you sure you want to delete <?= $playlist->name ?>?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>No playlists found</p>
<?php endif ?>