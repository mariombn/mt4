<?php
//Bloco do Controller
require_once '../bootstrap.php';

$view = \Service\ViewServiceFactory::create();

/** @var \Service\DispositivoService $dispositivosService */
$dispositivosService = \Service\DispositivoServiceFactory::create();

if (!empty($_POST['acao']) && $_POST['acao'] == 'novo') {
    try {
        $hostname = $_POST['hostname'];
        $ip = $_POST['ip'];
        $tipo = $_POST['tipo'];
        $fabricante = $_POST['fabricante'];

        $dispositivosService->cadastrar($hostname, $ip, $tipo, $fabricante);
        $sucesso = "Dispositivo cadastrado com Sucesso!";
    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}

$listaDispositivos = $dispositivosService->getTipos();

$view->header();

if (isset($erro)) {
    $view->erro($erro);
}
if (isset($sucesso)) {
    $view->sucesso($sucesso);
}

?>
    <h1>Controle de Dispositivos</h1>

    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Novo Dispositivo
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form action="controle-dispositivos.php" method="post">
                <input type="hidden" name="acao" value="novo">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hostname</label>
                            <input type="text" class="form-control" id="hostname" name="hostname" aria-describedby="emailHelp" placeholder="Hostname">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Endereço IPv4</label>
                            <input type="text" class="form-control" id="ip" name="ip" aria-describedby="emailHelp" placeholder="192.168.0.42">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipo de Dispositivo</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <?php foreach ($listaDispositivos as $chave => $nome): ?>
                                    <option value="<?php echo $chave ?>" ><?php echo $nome ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fabricante</label>
                            <input type="text" class="form-control" id="fabricante" name="fabricante" aria-describedby="emailHelp" placeholder="Nome do Fabricante">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $view->footer() ?>