<?php
//Bloco do Controller
require_once '../bootstrap.php';

$view = \Service\ViewServiceFactory::create();

try {

    /** @var \Service\DispositivoService $dispositivosService */
    $dispositivosService = \Service\DispositivoServiceFactory::create();
    /** @var \Entity\DispositivoEntity $dispositivoEntity */
    $dispositivoEntity = $dispositivosService->obterPorId($_GET['id']);

    $listaTiposDispositivos = $dispositivosService->getTipos();

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
    <h1>Controle de Dispositivos - Editar</h1>

    <div class="row">
        <div class="col">
            <form action="controle-dispositivos.php" method="post">
                <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="id" value="<?php echo $dispositivoEntity->getId() ?>">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hostname</label>
                            <input type="text" class="form-control" id="hostname" name="hostname" aria-describedby="emailHelp" placeholder="Hostname" value="<?php echo $dispositivoEntity->getHostname() ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Endereço IPv4</label>
                            <input type="text" class="form-control" id="ip" name="ip" aria-describedby="emailHelp" placeholder="192.168.0.42" value="<?php echo $dispositivoEntity->getIp() ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipo de Dispositivo</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <?php foreach ($listaTiposDispositivos as $chave => $nome): ?>
                                    <option value="<?php echo $chave ?>" <?php echo ($chave == $dispositivoEntity->getTipo() ? 'selected' : '') ?>><?php echo $nome ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fabricante</label>
                            <input type="text" class="form-control" id="fabricante" name="fabricante" aria-describedby="emailHelp" placeholder="Nome do Fabricante" value="<?php echo $dispositivoEntity->getFabricante() ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $view->footer() ?>