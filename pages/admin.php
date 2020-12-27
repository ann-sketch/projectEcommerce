<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $content = file_get_contents('../database/user-database.json');
        echo '<pre>';
        echo var_dump($content);
        echo '</pre>';
    ?>
</body>
</html>