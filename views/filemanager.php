<h1 class="text-3xl font-bold mb-4">File Manager</h1>

<form method="POST" action="/files/delete" class="p-8 bg-white shadow-lg rounded-lg w-full max-w-6xl mx-auto">
    <div class="flex space-x-12">
        <div class="w-1/2">
            <h2 class="text-2xl font-semibold mb-4">Images</h2>
            <div class="overflow-y-scroll h-[32rem] w-full border border-gray-300 rounded-lg p-2">
                <?php foreach ($images as $image): ?>
                    <div class="flex flex-col bg-gray-100 p-4 rounded-lg mb-4">
                        <div class="flex items-center space-x-4 mb-2">
                            <input type="checkbox" name="selected_files[]" value="<?= $image ?>" id="checkbox-<?= $image ?>">
                            <img src="/images/<?= $image ?>" alt="<?= $image ?>" class="object-cover rounded cursor-pointer h-40 w-40" onclick="document.getElementById('checkbox-<?= $image ?>').click();">
                        </div>
                        <p class="mt-2 text-sm text-gray-600"><?= htmlspecialchars($image) ?></p> <!-- File path added here -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="w-1/2">
            <h2 class="text-2xl font-semibold mb-4">Videos</h2>
            <div class="overflow-y-scroll h-[32rem] w-full border border-gray-300 rounded-lg p-2">
                <?php foreach ($videos as $video): ?>
                    <div class="flex flex-col bg-gray-100 p-4 rounded-lg mb-4">
                        <div class="flex items-center space-x-4 mb-2">
                            <input type="checkbox" name="selected_files[]" value="<?= $video ?>" id="checkbox-<?= $video ?>">
                            <video class="object-cover rounded cursor-pointer h-40 w-40" controls onclick="document.getElementById('checkbox-<?= $video ?>').click();">
                                <source src="/videos/<?= $video ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <p class="mt-2 text-sm text-gray-600"><?= htmlspecialchars($video) ?></p> <!-- File path added here -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded hover:bg-red-600 transition">Delete Selected</button>
    </div>
</form>
