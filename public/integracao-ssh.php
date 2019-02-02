<?php

require_once '../bootstrap.php';

$view = \Service\ViewServiceFactory::create();

$username = '';
$password = '';
$dispositivoId = 0;

try {
    /** @var \Service\DispositivoService $dispositivosService */
    $dispositivosService = \Service\DispositivoServiceFactory::create();

    if (!empty($_POST['acao']) && $_POST['acao'] == 'postSsh') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $dispositivoId = $_POST['dispositivoId'];
        $command  = $_POST['command'];

        $saida = $dispositivosService->enviarComandoSsh($command, $username, $password, $dispositivoId);
    }

    $listaDispositivos = $dispositivosService->listar();

} catch (Exception $e) {
    $erro = $e->getMessage();
}

$view->header();

if (isset($erro)) {
    $view->erro($erro);
}
if (isset($sucesso)) {
    $view->sucesso($sucesso);
}

?>

    <h1>Integração SSH</h1>
    <form action="integracao-ssh.php" method="post">
        <input type="hidden" name="acao" value="postSsh">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="formGroupExampleInput">Usuário</label>
                    <input name="username" type="text" class="form-control" id="formGroupExampleInput" placeholder="Usuario SSH" value="<?php echo $username ?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="formGroupExampleInput">Senha</label>
                    <input name="password" type="password" class="form-control" id="formGroupExampleInput" placeholder="Senha SSH" value="<?php echo $password ?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="formGroupExampleInput">Senha</label>
                    <select name="dispositivoId" class="form-control">
                        <?php foreach ($listaDispositivos as $dispositivo): ?>
                            <option value="<?php echo $dispositivo->getId() ?>" <?php echo ($dispositivoId == $dispositivo->getId()) ? 'selected' : '' ?>><?php echo $dispositivo->getHostname() ?></option>
                        <?php endforeach ?>
                    </select>
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

    <?php if (!empty($saida)): ?>
        <div class="row">
            <pre style="margin-top: 10px; background-color: black; color: white; padding: 10px">
                <?php echo $saida ?>
            </pre>
        </div>
    <?php endif ?>

<?php $view->footer() ?>