<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 bg-white shadow rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Information about <?= htmlspecialchars($user->firstname) . " " . htmlspecialchars($user->lastname) ?></h1>

    <!-- User Information -->
    <div class="mb-6">
        <p class="text-lg font-medium">Firstname: <span class="text-gray-700"><?= htmlspecialchars($user->firstname) ?></span></p>
        <p class="text-lg font-medium">Email: <span class="text-gray-700"><?= htmlspecialchars($user->email) ?></span></p>
    </div>

    <!-- Button to Create Playlist -->
    <div class="mb-6">
    <a href="/playlists/create?user_id=<?= htmlspecialchars($user->id) ?>" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition">
    Create Playlist
</a>

    </div>

    <!-- Playlist List -->
    <div>
        <h2 class="text-2xl font-semibold mb-4">Playlist List</h2>
        <?php if (isset($playlists) && count($playlists) > 0): ?>
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($playlists as $playlist): ?>
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= htmlspecialchars($playlist->id) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">
                                <a href="/playlist/view/<?= htmlspecialchars($playlist->id) ?>" class="hover:underline"><?= htmlspecialchars($playlist->name) ?></a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex space-x-2">
                                    <a href="/playlist/edit/<?= htmlspecialchars($playlist->id) ?>" class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white text-sm font-medium rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-75 transition">
                                        Edit
                                    </a>
                                    <a href="/playlist/delete/<?= htmlspecialchars($playlist->id) ?>" class="inline-flex items-center px-3 py-1 bg-red-500 text-white text-sm font-medium rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 transition" onclick="return confirm('Are you sure you want to delete <?= htmlspecialchars($playlist->name) ?>?');">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-gray-600 mt-4">No playlists found.</p>
        <?php endif; ?>
    </div>
</div>
