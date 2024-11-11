<h1>File Manager</h1>

<form method="POST" action="/files/delete">
    <div class="flex space-x-4">
        <div class="w-1/2">
            <h2>Images</h2>
            <div class="overflow-y-scroll h-64">
                <?php foreach ($images as $image): ?>
                    <div class="flex bg-gray-100 p-4 rounded-lg mb-4">
                        <div class="flex items-center space-x-4 mb-2">
                            <input type="checkbox" name="selected_files[]" value="<?= $image ?>" id="checkbox-<?= $image ?>">
                            <img src="/images/<?= $image ?>" alt="<?= $image ?>" class="h-20 w-20 object-cover rounded cursor-pointer" onclick="document.getElementById('checkbox-<?= $image ?>').click();">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="w-1/2">
            <h2>Videos</h2>
            <div class="overflow-y-scroll h-64">
                <?php foreach ($videos as $video): ?>
                    <div class="flex flex-col bg-gray-100 p-4 rounded-lg mb-4">
                        <div class="flex items-center space-x-4 mb-2">
                            <input type="checkbox" name="selected_files[]" value="<?= $video ?>" id="checkbox-<?= $video ?>">
                            <video class="h-20 w-20 object-cover rounded cursor-pointer" controls onclick="document.getElementById('checkbox-<?= $video ?>').click();">
                                <source src="/videos/<?= $video ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Delete Selected</button>
    </div>
</form>
