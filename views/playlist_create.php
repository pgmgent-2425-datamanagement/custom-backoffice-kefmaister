<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 bg-white shadow rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Create New Playlist</h1>

    <form method="POST" action="/playlists/create" class="space-y-6">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Playlist Name</label>
            <input type="text" id="name" name="name" required 
                   class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Select User</label>
            <select id="user_id" name="user_id" required 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Choose a user</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= htmlspecialchars($user->id) ?>" <?= isset($_GET['user_id']) && $_GET['user_id'] == $user->id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($user->firstname . ' ' . $user->lastname) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mt-6">
            <button type="submit" 
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition">
                Create Playlist
            </button>
        </div>
    </form>
</div>
