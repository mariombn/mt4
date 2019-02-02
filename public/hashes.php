<?php

require_once '../bootstrap.php';

$view = \Service\ViewServiceFactory::create();

try {
    $resultadoSHA512 = '';
    $resultadoHMAC   = '';
    $resultadoPessoa = '';
    $compareSHA512 = false;
    $compareHMAC   = false;
    $comparePessoa = false;
    $hashUsuario   = false;

    if (!empty($_POST['acao'])) {

        /** @var \Service\HashSHA512Service $hashSHA512 */
        $hashSHA512 = \Service\HashSHA512ServiceFactory::create();

        /** @var \Service\HashHMACService $criptografiaAes */
        $hashHMAC = \Service\HashHMACServiceFactory::create();

        $hashPessoal = \Service\HashPessoalServiceFactory::create();

        $mensagem = $_POST['mensagem'];

        if ($_POST['acao'] == 'criarHash') {
            $resultadoSHA512 = $hashSHA512->gerarHash($mensagem);
            $resultadoHMAC = $hashHMAC->gerarHash($mensagem);
            $resultadoPessoa = $hashPessoal->gerarHash($mensagem);
            $sucesso = "Hash aplicado com sucesso para a mensagem: [{$mensagem}]";

            $hashUsuario = (!empty($_POST['hash']) ? trim($_POST['hash']) : true);
            if ($hashUsuario == $resultadoSHA512) {
                $compareSHA512 = true;
            }
            if ($hashUsuario == $resultadoHMAC) {
                $compareHMAC = true;
            }
            if ($hashUsuario == $resultadoPessoa) {
                $comparePessoa = true;
            }
        }


    }

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
    <style>
        pre {
            background-color: black;
            color: greenyellow;
        }
    </style>
    <h1>Hashes</h1>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Mensagem Original
                </div>
                <div class="card-body">
                    <form name="hash" method="post" action="hashes.php">
                        <input type="hidden" name="acao" value="criarHash">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">String</label>
                                    <input type="text" class="form-control" name="mensagem" id="mensagem" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Testar Hash</label>
                                    <input type="text" class="form-control" name="hash" id="hash" placeholder="Digite um Hash aqui para testa-lo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Criar Hashes">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if ($hashUsuario): ?>
    <hr>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Tipo de Hash</th>
                        <th>Hash</th>
                        <th>Teste Hash</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="<?php echo ($compareSHA512) ? 'bg-success' : 'bg-danger' ?>">
                        <td>Hash SHA512</td>
                        <td><?php echo ($compareSHA512) ? 'Sucesso' : 'Erro' ?>!</td>
                        <td class="text-monospace"><?php echo $resultadoSHA512 ?></td>
                    </tr>
                    <tr class="<?php echo ($compareHMAC) ? 'bg-success' : 'bg-danger' ?>">
                        <td>Hash HMAC</td>
                        <td><?php echo ($compareHMAC) ? 'Sucesso' : 'Erro' ?>!</td>
                        <td class="text-monospace"><?php echo $resultadoHMAC ?></td>
                    </tr>
                    <tr class="<?php echo ($comparePessoa) ? 'bg-success' : 'bg-danger' ?>">
                        <td>Hash Pessoal</td>
                        <td><?php echo ($comparePessoa) ? 'Sucesso' : 'Erro' ?>!</td>
                        <td class="text-monospace"><?php echo $resultadoPessoa ?></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <?php endif ?>
<?php $view->footer() ?>