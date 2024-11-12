<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 bg-white shadow rounded-lg">
    <!-- Playlist Information -->
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Playlist: <?= htmlspecialchars($playlist->name) ?></h1>

    <!-- Add New Video Form -->
    <div class="mb-6 bg-gray-50 p-4 rounded-lg shadow-sm">
        <h2 class="text-2xl font-semibold mb-4">Add Video to Playlist</h2>
        <form method="POST" action="/playlist/add-video" class="flex items-center space-x-4">
    <input type="hidden" name="playlist_id" value="<?= htmlspecialchars($playlist->id) ?>">

    <div class="w-full">
        <label for="video_id" class="block mb-2 text-sm font-medium text-gray-700">Select Video:</label>
        <select name="video_id" id="video_id" required 
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            <option value="">Choose a video</option>
            <?php foreach ($availableVideos as $video): ?>
                <option value="<?= htmlspecialchars($video->id) ?>"><?= htmlspecialchars($video->title) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
        Add Video
    </button>
</form>

    </div>

    <!-- List of Videos in the Playlist -->
    <div>
        <h2 class="text-2xl font-semibold mb-4">Videos in this Playlist</h2>
        <?php if (isset($videos) && count($videos) > 0): ?>
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($videos as $video): ?>
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= htmlspecialchars($video->id) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">
                                <a href="/videos/view/<?= htmlspecialchars($video->id) ?>" class="hover:underline">
                                    <?= htmlspecialchars($video->title) ?>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= htmlspecialchars($video->description) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex space-x-2">
                                    <a href="/videos/edit/<?= htmlspecialchars($video->id) ?>" class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white text-sm font-medium rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-75 transition">
                                        Edit
                                    </a>
                                    <a href="/playlist/remove-video/<?= htmlspecialchars($playlist->id) ?>/<?= htmlspecialchars($video->id) ?>" class="inline-flex items-center px-3 py-1 bg-red-500 text-white text-sm font-medium rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 transition" onclick="return confirm('Are you sure you want to remove <?= htmlspecialchars($video->title) ?> from this playlist?');">
                                        Remove
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-gray-600 mt-4">No videos in this playlist.</p>
        <?php endif; ?>
    </div>
</div>
