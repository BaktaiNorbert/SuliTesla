<?php
declare(strict_types=1);
error_reporting(E_ALL);
require(__DIR__ . '/vendor/autoload.php');
include("./forras/data.php");
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
use App\Model\Tesla;
$hasMit = key_exists("mit", $_GET);
$showTable = $hasMit && $_GET["mit"] == "tablazat";
$query = null;
if(key_exists("model",$_GET) && $_GET["model"] != ""){
    $query = $_GET["model"];
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" 	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <?php include("./menu.php"); ?>
    <?php if (!$hasMit): ?>
        <ul>
            <li><a href="index.php?mit=grid">Minden modell</a></li>
            <?php            
            foreach (Tesla::getModels() as $index => $car): ?>
                <li><a href="index.php?mit=grid&model=<?= $index ?>">
                        <?= $car ?>
                    </a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <main class="container">
    <?php if($showTable){include("./table.php");} ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </main>
</body>

</html>