<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = htmlspecialchars($_POST["marca"]);
    $modello = htmlspecialchars($_POST["modello"]);
    $porte_hdmi = (int)$_POST["porte_hdmi"];
    $refresh = (int)$_POST["refresh"];
    $risoluzione = $_POST["risoluzione"];

    $consigli = [];

    if ($porte_hdmi < 2) {
        $consigli[] = "Ti consigliamo un televisore con almeno <b>2 porte HDMI</b>.";
    }

    if ($refresh < 50) {
        $consigli[] = "Ti consigliamo un televisore con <b>refresh rate di almeno 50Hz</b>.";
    }

    if ($risoluzione == "HD Ready" || $risoluzione == "Full HD") {
        $consigli[] = "Ti consigliamo un televisore con risoluzione <b>Ultra HD o 4K</b>.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Consigli sul televisore</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-8">
            <div class="card shadow p-4">
                <h1 class="text-center mb-4">Risultati per il televisore</h1>
                <p><b>Marca:</b> <?= $marca ?></p>
                <p><b>Modello:</b> <?= $modello ?></p>
                <p><b>Porte HDMI:</b> <?= $porte_hdmi ?></p>
                <p><b>Refresh rate:</b> <?= $refresh ?> Hz</p>
                <p><b>Risoluzione:</b> <?= $risoluzione ?></p>
                <hr>
                <h3>Consigli:</h3>
                <?php if (!empty($consigli)) : ?>
                    <ul class="list-group">
                        <?php foreach ($consigli as $c) : ?>
                            <li class="list-group-item list-group-item-warning"><?= $c ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <div class="alert alert-success mt-3">Il televisore ha già ottime caratteristiche!</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
