<?php

require_once '../bootstrap.php';

$view = \Service\ViewServiceFactory::create();

$view->header();

?>

    <h1>Integração SSH</h1>
    <form action="integracao-ssh.php" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="formGroupExampleInput">Usuário</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Usuario SSH">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="formGroupExampleInput">Senha</label>
                    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Senha SSH">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Comando</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Comando">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col">
                <div class="form-group">
                    <label for="formGroupExampleInput">Comando</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Comando">
                </div>
            </div>
        </div>
    </form>

<?php $view->footer() ?>