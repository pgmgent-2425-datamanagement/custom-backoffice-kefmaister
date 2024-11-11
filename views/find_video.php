<div class="flex items-center justify-center min-h-screen">
    <div class="max-w-3xl mx-auto p-4">
        <?php if ($video): ?>
            <!-- Display the video -->
            <video class="" width="640" height="360" controls>
                <source src="/videos/<?= $video->file_path ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <!-- Display title and description -->
            <div class="text-2xl mt-4"><?= htmlspecialchars($video->title) ?></div>
            <div class="text-lg mt-2"><?= htmlspecialchars($video->description) ?></div>

            <!-- Display uploaded date -->
            <div class="text-sm text-gray-600 mt-1">Uploaded on: <?= htmlspecialchars($video->upload_date) ?></div>
        <?php else: ?>
            <p>Video not found.</p>
        <?php endif; ?>

        <!-- Comments Section -->
        <div class="mt-8">
            <h3 class="text-xl mb-4">Comments</h3>
            <form action="/comments/create" method="post" class="mb-4">
                <input type="hidden" name="video_id" value="<?= htmlspecialchars($video->id) ?>">
                <textarea name="comment" rows="4" class="w-full p-2 border rounded" placeholder="Add a comment..."></textarea><br>
                <input type="submit" value="Submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded cursor-pointer">
            </form>

            <?php if (isset($comments) && count($comments) > 0): ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="mb-2 p-2 border-b">
                        <strong><?= htmlspecialchars($comment->username) ?>:</strong>
                        <p><?= htmlspecialchars($comment->content) ?></p>
                        <span class="text-xs text-gray-500"><?= htmlspecialchars($comment->created_at) ?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No comments yet.</p>
            <?php endif; ?>
        </div>
    </div>
</div>