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
    <link type="image/x-icon" rel="shortcut icon" href="assets/images/favicons/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/favicon-180.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16.png">
    <title>Polyspirit: back-end development</title>
</head>

<body>
    <div class="wrapper">
        <div class="lines">
            <div class="line">&nbsp;</div>
            <?php for ($i = 1; $i <= 100; $i++) { ?>
                <div class="line"><?php echo $i; ?></div>
            <?php } ?>
        </div>
        <div class="code">
            <div class="object">
                <div>&nbsp;</div>

<?php
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);

$builder = new ObjectBuilder();
$i = 1;
foreach ($data as $key => $value) {
    $last = $i === count($data);
    $builder->addProp($key, $value, $last);
    $i++;
}
$builder->build();
?>
            </div>
        </div>
    </div>
    <script src="js/typer.js"></script>
    <script src="js/script.js"></script>
</body>

</html>