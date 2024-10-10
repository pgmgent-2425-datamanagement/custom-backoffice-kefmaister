    <h1>Edit User Information</h1>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?= $user->username ?>" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $user->email ?>" required><br><br>
        
        
        <input type="submit" value="Update">
    </form>