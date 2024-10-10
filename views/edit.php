    <h1>Edit User Information</h1>
    <form action="/users/edit" method="POST">
    <input type="hidden" name="id" value="<?= $user->id ?>">
    
    <label for="username">Username:</label>
    <input type="text" id="username" name="name" value="<?= $user->username ?>" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= $user->email ?>" required><br><br>
    
    <input type="submit" value="Update">
</form>