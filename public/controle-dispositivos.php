<?php
//Bloco do Controller
require_once '../bootstrap.php';

$view = \Service\ViewServiceFactory::create();

try {

    /** @var \Service\DispositivoService $dispositivosService */
    $dispositivosService = \Service\DispositivoServiceFactory::create();

    if (!empty($_POST['acao']) && $_POST['acao'] == 'novo') {

            $hostname = $_POST['hostname'];
            $ip = $_POST['ip'];
            $tipo = $_POST['tipo'];
            $fabricante = $_POST['fabricante'];

            $dispositivosService->incluir($hostname, $ip, $tipo, $fabricante);
            $sucesso = "Dispositivo cadastrado com Sucesso!";

    }

    if (!empty($_GET['acao']) && $_GET['acao'] == 'excluir') {
        $dispositivosService->excluir($_GET['id']);
        $sucesso = "Dispositivo excluido com Sucesso!";
    }

    $listaTiposDispositivos = $dispositivosService->getTipos();

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
                                <?php foreach ($listaTiposDispositivos as $chave => $nome): ?>
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

    <div class="row">
        <div class="col">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hostname</th>
                    <th scope="col">IP</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Fabricante</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($listaDispositivos) > 0): ?>
                    <?php foreach ($listaDispositivos as $dispositivo): ?>
                        <tr>
                            <th scope="row"><?php echo $dispositivo->getId() ?></th>
                            <td><?php echo $dispositivo->getHostname() ?></td>
                            <td><?php echo $dispositivo->getIp() ?></td>
                            <td><?php echo $dispositivo->getTipo() ?></td>
                            <td><?php echo $dispositivo->getFabricante() ?></td>
                            <td>
                                <a href="controle-dispositivos.php?acao=editar&id=<?php echo $dispositivo->getId() ?>" class="btn badge-info">Editar</a>
                                <a href="controle-dispositivos.php?acao=excluir&id=<?php echo $dispositivo->getId() ?>" class="btn badge-danger">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr><td colspan="5">Nenhum Registro Encontrado</td></tr>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $view->footer() ?>