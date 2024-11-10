<h1>Edit Video Information</h1>
<form method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
    <input type="hidden" name="id" value="<?= $video->id ?>">

    <!-- Form Fields with Tailwind classes -->
    <div class="mb-4">
        <label for="videoFile" class="block text-gray-700 font-semibold mb-2">Video File:</label>
        <input type="file" id="videoFile" name="videoFile" accept="video/*"
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4">
        <label for="thumbnail" class="block text-gray-700 font-semibold mb-2">Thumbnail:</label>
        <input type="file" id="thumbnail" name="thumbnail" accept="image/*"
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-semibold mb-2">Title:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($video->title) ?>" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-semibold mb-2">Description:</label>
        <textarea id="description" name="description" required 
                  class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"><?= htmlspecialchars($video->description) ?></textarea>
    </div>

    <div class="mb-4">
        <label for="duration" class="block text-gray-700 font-semibold mb-2">Duration (in minutes):</label>
        <input type="number" id="duration" name="duration" value="<?= htmlspecialchars($video->duration) ?>" required min="0"
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4">
        <label for="user_id" class="block text-gray-700 font-semibold mb-2">User:</label>
        <select name="user_id" id="user_id" required 
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <option value="<?= htmlspecialchars($user->id) ?>" <?= $video->user_id == $user->id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($user->firstname . ' ' . $user->lastname) ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="">No users available</option>
            <?php endif; ?>
        </select>
    </div>

    <div class="mt-6">
        <input type="submit" value="Save" 
               class="w-full bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 transition duration-200">
    </div>
</form>