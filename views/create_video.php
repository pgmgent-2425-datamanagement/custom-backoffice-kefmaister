<h1 class="text-2xl font-bold mb-4">Upload New Video</h1>
<form method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
    <!-- Video File Upload -->
    <div class="mb-4">
        <label for="videoFile" class="block text-gray-700 font-semibold mb-2">Video File:</label>
        <input type="file" id="videoFile" name="video" accept="video/*" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <!-- Thumbnail Upload -->
    <div class="mb-4">
        <label for="thumbnail" class="block text-gray-700 font-semibold mb-2">Thumbnail:</label>
        <input type="file" id="thumbnail" name="thumbnail" accept="image/*" 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <!-- Video Title -->
    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-semibold mb-2">Title:</label>
        <input type="text" id="title" name="title" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <!-- Video Description -->
    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-semibold mb-2">Description:</label>
        <textarea id="description" name="description" required 
                  class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
    </div>

    <!-- Video Duration -->
    <div class="mb-4">
        <label for="duration" class="block text-gray-700 font-semibold mb-2">Duration (in seconds):</label>
        <input type="number" id="duration" name="duration" min="0" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <!-- User Dropdown -->
    <div class="mb-4">
        <label for="user_id" class="block text-gray-700 font-semibold mb-2">User:</label>
        <select name="user_id" id="user_id" required 
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <option value="<?= htmlspecialchars($user->id) ?>">
                        <?= htmlspecialchars($user->firstname . ' ' . $user->lastname) ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="">No users available</option>
            <?php endif; ?>
        </select>
    </div>

    <!-- Submit Button -->
    <div class="mt-6">
        <input type="submit" value="Upload Video" 
               class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
    </div>

    <!-- Error Message Display (if applicable) -->
    <?php if (isset($error)): ?>
        <p class="text-red-500 mt-4"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</form>
