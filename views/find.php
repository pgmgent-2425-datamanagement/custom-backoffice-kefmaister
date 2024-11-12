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
                                    <button type="button" onclick="openEditModal('<?= htmlspecialchars($playlist->id) ?>', '<?= htmlspecialchars($playlist->name) ?>')" class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white text-sm font-medium rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-75 transition">
                                        Edit
                                    </button>
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

    <!-- Modal -->
<div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
        <h2 class="text-xl font-semibold mb-4">Edit Playlist</h2>
        <form id="editForm" method="POST" action="">
            <input type="hidden" name="id" id="playlistId">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($user->id) ?>"> <!-- Capturing user_id -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Playlist Name:</label>
                <input type="text" name="name" id="playlistName" required class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(playlistId, playlistName) {
        document.getElementById('playlistId').value = playlistId;
        document.getElementById('playlistName').value = playlistName;
        document.getElementById('editForm').action = '/playlists/edit/' + playlistId; 
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>

</div>
