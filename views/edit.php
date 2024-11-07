    <h1>Edit User Information</h1>
    <form method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <input type="hidden" name="id" value="<?= $user->id ?>">
    <!-- Form Fields with Tailwind classes -->
    <div class="mb-4">
        <label for="firstname" class="block text-gray-700 font-semibold mb-2">Username:</label>
        <input type="text" id="firstname" name="firstname" value="<?= htmlspecialchars($user->firstname) ?>" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>
    <!-- Repeat for other fields -->
    <div class="mb-4">
        <label for="lastname" class="block text-gray-700 font-semibold mb-2">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="<?= htmlspecialchars($user->lastname) ?>" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">

    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user->email) ?>" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4">
        <label for="Country" class="block text-gray-700 font-semibold mb-2">Country:</label>
        <select name="country" id="country" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            <?php foreach ($countries as $country): ?>
                <option value="<?= $country->id ?>" <?= $user->countries_id == $country->id ? 'selected' : '' ?>><?= $country->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mt-6">
        <input type="submit" value="Save" 
               class="w-full bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 transition duration-200">
    </div>
</form>