<h1 class="text-2xl font-bold mb-4">Create New User</h1>
<form method="POST" action="/users/create" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
    <div class="mb-4">
        <label for="firstname" class="block text-gray-700 font-semibold mb-2">Name:</label>
        <input type="text" id="firstname" name="firstname" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>
    <div class="mb-4">
        <label for="lastname" class="block text-gray-700 font-semibold mb-2">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">

    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
        <input type="email" id="email" name="email" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4">
        <label for="password" class="block text-gray-700 font-semibold mb-2">Password:</label>
        <input type="password" id="password" name="password" required 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4">
        <label for="country" class="block text-gray-700 font-semibold mb-2">Country:</label>
        <select name="country" id="country" required 
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            <option value="">Select a country</option>
            <?php foreach ($countries as $country): ?>
                <option value="<?= htmlspecialchars($country->id) ?>"><?= htmlspecialchars($country->name) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mt-6">
        <input type="submit" value="Create User" 
               class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
    </div>
</form>
