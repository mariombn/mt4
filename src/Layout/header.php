<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplicação para o Teste da MT4">
    <meta name="author" content="Mario de Moraes Barros Neto">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <title><?php echo APP_TITLE ?></title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/index.php"><?php echo APP_TITLE ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/controle-dispositivos.php">Controle de Dispositivos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/integracao-ssh.php">Integração SSH</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/criptografia.php">Criptografia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/hashes.php">Comparação de Hashes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main role="main">

    <div class="container" style="margin-top: 20px">