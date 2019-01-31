<?php

require_once '../bootstrap.php';

$view = \Service\ViewServiceFactory::create();

if (!empty($_POST['acao']) && $_POST['acao'] == 'postSsh') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $command  = $_POST['command'];

    $connection = ssh2_connect('192.168.0.165', 22);
    ssh2_auth_password($connection, $username, $password);

    $stream = ssh2_exec($connection, $command);

    stream_set_blocking($stream, true);
    $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
    echo stream_get_contents($stream_out);

    exit;
}

$view->header();

?>

    <h1>Integração SSH</h1>
    <form action="integracao-ssh.php" method="post">
        <input type="hidden" name="acao" value="postSsh">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="formGroupExampleInput">Usuário</label>
                    <input name="username" type="text" class="form-control" id="formGroupExampleInput" placeholder="Usuario SSH">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="formGroupExampleInput">Senha</label>
                    <input name="password" type="password" class="form-control" id="formGroupExampleInput" placeholder="Senha SSH">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Comando</label>
                    <input name="command" type="text" class="form-control" id="formGroupExampleInput" placeholder="Comando">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col align-self-end">
                <input type="submit" class="btn btn-primary" value="Enviar Comando">
            </div>
        </div>
    </form>

    <?php if (!empty($stream)): ?>
        <div class="row">
            <?php echo $stream ?>
        </div>
    <?php endif ?>

<?php $view->footer() ?>