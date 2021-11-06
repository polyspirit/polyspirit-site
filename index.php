<?php
    require_once 'include/ObjectBuilder.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link data-n-head="ssr" rel="icon" type="image/x-icon" href="favicon.ico">
    <link data-n-head="ssr" rel="image_src" type="image/x-icon" href="favicon.ico">
    <title>Polyspirit: back-end development</title>
</head>
<body>
    <div class="wrapper">
        <h1 class="title js-typer">/* <span class="js-typer-text" data-text="polyspirit"></span> */</h1>
        <div class="object">
            <?php
                $builder = new ObjectBuilder();
                $builder->addProp('name', 'Anton Karabut');
                $builder->addProp('birthdate', '13.06.1988');
                $builder->addProp('nationality', 'russian');
                $builder->addProp('workExperience', 'from 2010');
                $builder->addProp('skills', ['php', 'js', 'c#', 'css', 'html']);
                $builder->addProp('platforms', ['wordpress', 'laravel', 'unity']);
                $builder->addProp('repository', 'https://github.com/polyspirit/polyspirit-site', true);
                $builder->build();
            ?>
        </div>
    </div>
    <script src="js/typer.js"></script>
    <script src="js/script.js"></script>
</body>
</html>