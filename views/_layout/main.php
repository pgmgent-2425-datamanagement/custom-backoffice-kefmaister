<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($title ?? '') . ' ' . $_ENV['SITE_NAME'] ?></title>
    <link rel="stylesheet" href="/css/main.css?v=<?php if( $_ENV['DEV_MODE'] == "true" ) { echo time(); }; ?>">
    <link href="/css/output.css?v=<?php if( $_ENV['DEV_MODE'] == "true" ) { echo time(); }; ?>" rel="stylesheet">
</head>
<body class="">
    <header>
        <div class="brand">BrandName</div>

        <nav class="bg-gray-800 p-4">
        <a href="/" class="text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
        <a href="/users" class="text-white px-3 py-2 rounded-md text-sm font-medium">Users</a>
        <a href="#" class="text-white px-3 py-2 rounded-md text-sm font-medium">Item 3</a>
        <a href="#" class="text-white px-3 py-2 rounded-md text-sm font-medium">Item 4</a>
    </nav>
    </header>



    <main>
        <?= $content; ?>
    </main>
    
    <footer>
        &copy; <?= date('Y'); ?> - BrandName
    </footer>
</body>
</html>