<?php

require_once '../bootstrap.php';

$view = \Service\ViewServiceFactory::create();

try {
    $ressultadoOrigianl = '';
    $resultadoCesar = '';
    $resultadoAes = '';
    $resultadoPessoa = '';

    if (!empty($_POST['acao'])) {

        /** @var \Service\CriptografiaCesarService $criptografiaCesar */
        $criptografiaCesar = \Service\CriptografiaCesarServiceFactory::create();

        /** @var \Service\CriptografiaAesService $criptografiaAes */
        $criptografiaAes = \Service\CriptografiaAesServiceFactory::create();

        /** @var \Service\CriptografiaPessoalService $criptografiaAes */
        $criptografiaPessoal = \Service\CriptografiaPessoalServiceFactory::create();

        $mensagem = $_POST['mensagem'];
        $chave    = $_POST['chave'];

        if ($_POST['acao'] == 'criptografar') {
            $resultadoCesar = $criptografiaCesar->criptografar($mensagem, $chave);
            $resultadoAes = $criptografiaAes->criptografar($mensagem, $chave);
            $resultadoPessoa = $criptografiaPessoal->criptografar($mensagem, $chave);
            $sucesso = "Criptografia aplicada com sucesso usando a chave {$chave}";

        }

        if ($_POST['acao'] == 'decripcesar') {
            $ressultadoOrigianl = $criptografiaCesar->descriptogravar($mensagem, $chave);
            $sucesso = "Descriptografia Cesar aplicada com sucesso usando a chave {$chave}";
        }

        if ($_POST['acao'] == 'decripaes') {
            $ressultadoOrigianl = $criptografiaAes->descriptogravar($mensagem, $chave);
            $sucesso = "Descriptografia AES aplicada com sucesso usando a chave {$chave}";
        }

        if ($_POST['acao'] == 'decrippessoal') {
            $ressultadoOrigianl = $criptografiaPessoal->descriptogravar($mensagem, $chave);
            $sucesso = "Descriptografia AES aplicada com sucesso usando a chave {$chave}";
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

    <h1>Criptografia</h1>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Mensagem Original
                </div>
                <div class="card-body">
                    <form name="criptografar" method="post" action="criptografia.php">
                        <input type="hidden" name="acao" value="criptografar">
                        <div class="form-group">
                            <label for="mensagem">Digite o Texto para aplicar a criptografia</label>
                            <textarea class="form-control" name="mensagem" id="mensagem" rows="3"><?php echo $ressultadoOrigianl ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Chave de Criptografia</label>
                                    <input type="text" class="form-control" name="chave" id="chave" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Criptografar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                   Criptografia Cesar
                </div>
                <div class="card-body">
                    <form name="decripcesar" method="post" action="criptografia.php">
                        <input type="hidden" name="acao" value="decripcesar">
                        <div class="form-group">
                            <label for="mensagem">Digite o Texto para aplicar a descriptografia</label>
                            <textarea class="form-control" name="mensagem" id="mensagem" rows="3"><?php echo $resultadoCesar ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Chave de Descriptografia</label>
                                    <input type="text" class="form-control" name="chave" id="chave" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Descriptografar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Criptografia AES256
                </div>
                <div class="card-body">
                    <form name="decripaes" method="post" action="criptografia.php">
                        <input type="hidden" name="acao" value="decripaes">
                        <div class="form-group">
                            <label for="mensagem">Digite o Texto para aplicar a descriptografia</label>
                            <textarea class="form-control" name="mensagem" id="mensagem" rows="3"><?php echo $resultadoAes?></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Chave de Descriptografia</label>
                                    <input type="text" class="form-control" name="chave" id="chave" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Descriptografar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Criptografia Pessoal
                </div>
                <div class="card-body">
                    <form name="decrippessoal" method="post" action="criptografia.php">
                        <input type="hidden" name="acao" value="decrippessoal">
                        <div class="form-group">
                            <label for="mensagem">Digite o Texto para aplicar a descriptografia</label>
                            <textarea class="form-control" name="mensagem" id="mensagem" rows="3"><?php echo $resultadoPessoa ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Chave de Descriptografia</label>
                                    <input type="text" class="form-control" name="chave" id="chave" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Descriptografar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $view->footer() ?>