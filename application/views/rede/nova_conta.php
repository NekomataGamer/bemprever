<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nova Conta | REDE</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="<?php echo site_url('assets/assets_old'); ?>/vendor/spinkit.css" rel="stylesheet">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="<?php echo site_url('assets/assets_old'); ?>/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="<?php echo site_url('assets/assets_old'); ?>/css/material-icons.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="<?php echo site_url('assets/assets_old'); ?>/css/fontawesome.css" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="<?php echo site_url('assets/assets_old'); ?>/css/preloader.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="<?php echo site_url('assets/assets_old'); ?>/css/app.css" rel="stylesheet">

    <!-- Toastr -->
    <link type="text/css" href="<?php echo site_url('assets/assets_old'); ?>/vendor/toastr.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo site_url('assets/assets_old'); ?>/css/toastr.css" rel="stylesheet">

    <!-- Verificador CSS -->
    <link type="text/css" href="<?php echo site_url('assets/css/verificador2.css'); ?>" rel="stylesheet">

    <!-- bootstrap selectpicker -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <style>
        #toast-container>.toast-error {
            background-color: #d9534f !important;
        }

        .posicao-toast {
            width: 100%;
        }

        .posicao-toast .toast {
            margin: auto !important;
        }

        body {
            background-color: #e2e8f4 !important;
        }

        #background-passing {
            position: fixed;
            top: 0px;
            left: 0px;
            z-index: 0;
            background-image: url(<?php echo site_url('assets/imagens/bg-cadastro.png'); ?>);
            background-size: contain;
            background-repeat: no-repeat;
            background-position: right bottom;
            width: 100vw;
            height: 100vh;
        }

        .logo-login {
            width: 300px;
            max-width: 100%;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .btn.btn-principal {
            color: #ffffff;
            background-color: #367294;
            border-color: #367294;
            font-weight: 800 !important;
        }

        .btn.btn-principal:hover:not(.btn-text):not(:disabled):not(.disabled),
        .btn.btn-principal:focus:not(.btn-text),
        .btn.btn-principal.focus:not(.btn-text) {
            color: #367294;
            background-color: transparent;
            border-color: #367294;
        }

        [dir] .card,
        [dir] .card-group,
        [dir] .card-nav .tab-content {
            margin-bottom: 0px;
            height: 100%;
        }

        [dir=ltr] .row,
        [dir=rtl] .row {
            padding-bottom: 1.5rem;
        }
    </style>
</head>

<body class="layout-app bgi-login bgi-size-cover bgi-no-repeat">

    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
        <!-- <div class="sk-bounce">
    <div class="sk-bounce-dot"></div>
    <div class="sk-bounce-dot"></div>
  </div> -->

        <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
    </div>

    <!-- Drawer Layout -->
    <div id="background-passing"></div>
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page-content d-flex justify-content-center">

            <!-- Header -->



            <!-- // END Header -->

            <!-- BEFORE Page Content -->

            <!-- // END BEFORE Page Content -->

            <!-- Page Content -->

            <div class="pb-32pt">
                <div class="container page__container">

                    <form method="post" action="<?php echo site_url('rede/linkCadastro/cadastrar'); ?>" enctype="multipart/form-data" class="col-md-12 p-0 mx-auto">
                        <input type="hidden" name="id_indicador" value="<?php echo $indicador['id']; ?>" />
                        <input type="hidden" name="link_indicador" value="<?php echo $link; ?>" />
                        <center>
                            <img src="<?php echo site_url('assets/imagens/LOGO_SPL_HOR.png'); ?>" class="logo-login" alt="">
                            <h4>Seja bem vindo ?? SPL!</h4>
                            <p>Escolha seu plano e preencha seus dados abaixo para come??ar a ter todas as vantagens de ser um <b>membro SPL</b>.</p>
                            <h5 style="text-transform:none;"><b>Indicado Por: </b><span class="text-accent"><?php echo $indicador['login']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Perna: <span class="text-accent"><?php echo ucfirst($busca[0]['lado']); ?></span><br />
                                <span class="text-primary"><?php echo $indicador['email']; ?></span>
                            </h5>
                        </center>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row justify-content-center">
                                            <div class="col-md-6 pr-5">
                                                <label class="form-label" for="username">PLANO DE PAGAMENTO: *</label>
                                                <select name="plano" id="planos" onchange="mudaPlano($(this).val())" class="form-control selectpicker" data-live-search="true" data-size="5" required>
                                                    <?php foreach ($planos as $pln) {
                                                        echo '<option value="' . $pln['id'] . '">' . $pln['nome'] . ' - R$ ' . number_format($pln['adesao'], 2, ',', '') . ' / ADES??O</option>';
                                                    } ?>
                                                </select>
                                                <div class="alert alert-warning mt-2" role="alert">
                                                    Caso sua fatura atrase por <b><?php echo $config[0]['tempo_desativar_usuario'] ?> dias</b> voc?? perder?? o acesso aos benef??cios do plano e n??o poder?? pedir saques at?? ficar em dia novamente.
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-4">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <b>Plano</b>
                                                    </div>
                                                    <div class="col">
                                                        <b>Valor Mensal</b>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div id="planoRow" class="col">
                                                        <span class="text-primary"><?php echo $planos[0]['nome']; ?></span>
                                                    </div>
                                                    <div id="valorRow" class="col">
                                                        <h5>R$ <?php echo number_format($planos[0]['valor'], 2, ',', ''); ?></h5>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div id="descricaoRow" class="col">
                                                        <p><?php echo $planos[0]['descricao']; ?></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" name="planoMaster" onchange="adquirePlano(this)" style="width: 1rem;height: 1rem;" />
                                                        <label class="pl-2" style="margin-bottom:0px!important;margin-top: 1px;">Adiquirir <a href="javascript:void(0)" style="cursor:help!important;" class="text-primary" data-target="#pmaster" data-toggle="modal">Plano Master</a></label>
                                                    </div>
                                                </div>
                                                <div id="selectMaster"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="hidden" name="lado" value="<?php echo $busca[0]['lado']; ?>" />
                                        <h5 class="card-title mb-4">Dados Iniciais</h5>
                                        <div class="form-group">
                                            <label class="form-label" for="username">Usuario: *</label>
                                            <input name="login" id="username" autocomplete="nope" type="text" class="form-control" placeholder="Seu usuario..." required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Senha: *</label>
                                            <input name="senha" id="password" autocomplete="new-password" type="password" class="form-control" placeholder="*********************" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="confirm_password">Confirmar Senha: *</label>
                                            <input name="confirmar_senha" autocomplete="confirmpassword" igual="senha" id="confirm_password" type="password" class="form-control" placeholder="*********************" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="email">Email: *</label>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Seu email..." required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="username">Nacionalidade: *</label>
                                            <select id="nac" class="form-control" required>
                                                <option value="br">Brasileira</option>
                                                <option value="ex">Estrangeira</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="profissao">Profiss??o: *</label>
                                            <input name="profissao" id="profissao" type="profissao" class="form-control" placeholder="Sua profiss??o..." required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Dados Pessoais</h5>
                                        <div class="form-group">
                                            <label class="form-label" for="username">Nome: *</label>
                                            <input name="nome" id="nome" type="text" class="form-control" placeholder="Seu nome completo..." required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="estado_civil">Estado Civil: *</label>
                                            <select name="estado_civil" id="estado_civil" type="text" class="form-control" required>
                                                <option value="Solteiro">Solteiro(a)</option>
                                                <option value="Casado">Casado(a)</option>
                                                <option value="Separado">Separado(a)</option>
                                                <option value="Divorciado">Divorciado(a)</option>
                                                <option value="Vi??vo">Vi??vo(a)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="nascimento">Nascimento: *</label>
                                            <input name="nascimento" id="nascimento" type="text" onKeyUp="verifyNascimento(this)" class="form-control" placeholder="XX/XX/XXXX" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="ccpf">
                                                <label class="form-label" for="username">CPF / CNPJ: *</label>
                                                <input name="cpf" id="cpf" type="cpf" class="form-control cpf" placeholder="XXX.XXX.XXX-XX" required>
                                            </div>
                                            <div class="extrang">
                                                <label class="form-label" for="username">ID: *</label>
                                                <input class="form-control" id="idid654" type="text">
                                                <input name="cpf" id="cxcpf" type="hidden" value="389.005.420-01">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Telefone: *</label>
                                            <input name="telefone" id="telefone" type="telefone" class="form-control telefone" placeholder="(XX) XXXXX-XXXX" required>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="form-label" for="username">Foto:</label>
                                            <div class="custom-file">
                                                <input name="foto" type="file" id="foto" class="custom-file-input">
                                                <label for="foto" class="custom-file-label">Escolher Arquivo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h5 id="dados_benefc" class="card-title mb-4">Dados do benefici??rio *</h5>

                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="nome_benef">Nome: *</label>
                                                    <input name="nome_benef" id="nome_benef" type="text" class="form-control" placeholder="Nome completo do benefici??rio..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="cpf_benef">CPF: *</label>
                                                    <input name="cpf_benef" id="cpf_benef" type="cpf" class="form-control" placeholder="CPF do benefici??rio..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="parentesco_benef">Grau de parentesco: *</label>
                                                    <input name="parentesco_benef" id="parentesco_benef" type="text" class="form-control" placeholder="Grau de parentesco..." required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h5 class="card-title mb-4">Endere??o *</h5>

                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <label class="form-label" for="username">Cep: *</label>
                                                <div class="input-group mb-3">
                                                    <input type="cep" id="cep" name="cep" class="form-control cep" placeholder="XXXXX-XXX" aria-describedby="basic-addon2" onblur="pesquisacep(this.value)" required>
                                                    <!-- <div class="input-group-append">
                                                        <button class="btn btn-light" type="button" onclick="getCep($('#cep').val(), '#estado', '#cidade');" style="height: 36px;">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label" for="username">Estado: *</label>
                                                <input type="text" id="estado" name="estado" class="form-control cep" placeholder="UF" aria-describedby="basic-addon2" required>
                                                <!-- <select id="estado" onchange="getCidades($(this).val(), '#cidade')" class="form-control selectpicker" title="UF" name="estado" data-live-search="true" data-size="5" required>
                                                    <?php foreach ($estados as $estd) {
                                                        echo '<option value="' . $estd['nome'] . '">' . $estd['uf'] . '</option>';
                                                    } ?>
                                                </select> -->
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="username">Cidade: *</label>
                                                <input type="text" id="cidade" name="cidade" class="form-control cidade" placeholder="Digite sua cidade..." aria-describedby="basic-addon2" required>
                                                <!-- <select id="cidade" class="form-control selectpicker" name="cidade" data-live-search="true" title="Selecione uma cidade..." data-size="5" required>
                                                </select> -->
                                            </div>

                                        </div>
                                        <div class="form-row pt-3">
                                            <div class="col-md-5">
                                                <label class="form-label" for="username">Logradouro: *</label>
                                                <input name="endereco" id="endereco" type="text" class="form-control" placeholder="Rua, avenida..." required>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label" for="username">Numero: *</label>
                                                <input id="numero" type="number" class="form-control" name="numero" placeholder="XXX" step="1" min="0" required>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label" for="username">Complemento:</label>
                                                <input name="complemento" id="complemento" type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label" for="username">Bairro: *</label>
                                                <input name="bairro" id="bairro" type="text" class="form-control" placeholder="Seu bairro..." required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h5 class="card-title mb-4">Passos finais *</h5>

                                        <div class="form-row">
                                            <!--
                                            <div class="col-md-12" style="font-size:14px;">
                                                <span class="text-danger">?? necess??rio fazer alguns passos para prosseguir com seu cadastro:</span>
                                                <br><br>
                                                <li>
                                                    Baixe e imprima nossa
                                                    <a class="text-primary fbold" href="<?php echo site_url('carta_de_orientacao_ao_associado') ?>">CARTA DE ORIENTA????O AO ASSOCIADO</a>:
                                                    <br><a class="btn btn-secondary" href="<?php echo site_url('carta_de_orientacao_ao_associado') ?>"><i class="fa fa-download"></i>&nbsp;&nbsp;Baixar Documento</a>
                                                </li>
                                                <br>
                                                <li>Preencha os campos com seus dados ?? caneta preta ou azul.</li>
                                                <br>
                                                <li>Anexe abaixo os documentos escaneados (ou fotos de celular totalmente vis??veis).</li>
                                                <input id="fileBtn" type="file" class="fileSender" data-target=".filesToSend" multiple accept="image/png, image/jpeg, image/jpg" style="display:none">
                                                <div class="d-flex align-items-center filesToSend" style="flex-wrap: wrap;">
                                                </div>
                                                <a href="javascript:void(0)" class="btn btn-secondary" onclick="$('#fileBtn').click()"><i class="fa fa-upload"></i>&nbsp;&nbsp;Enviar Arquivos</a>
                                                <div class="form-group" style="margin-bottom:0px;">
                                                    <input id="temArquivos" required value="" style="opacity:0;width:100%;height:0px;">
                                                </div>
                                            </div> -->

                                            <div class="col-md-12">
                                                <hr>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                                    <label class="form-check-label" for="exampleCheck1" style="font-size:14px;">Declaro que li e concordo com os <a class="text-primary" href="<?php echo site_url('termos_e_condicoes_de_uso'); ?>" target="_blank">Termos e Condi????es de Uso</a> da plataforma!</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-principal btn-block"><i class="fa fa-check"></i>&nbsp;&nbsp;Prosseguir para o pagamento!</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- // END Page Content -->


        </div>

        <!-- // END drawer-layout__content -->


        <div class="modal fade" id="pmaster" tabindex="-1" role="dialog" aria-labelledby="titulo-pmaster" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titulo-pmaster">Sobre os planos master</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Ao adquirir um plano <b>MASTER</b>, seus pontos bin??rios passar??o a ser convertidos diariamente, gerando mais ganhos para voc??!</p>
                        <?php foreach ($masters as $master) : ?>
                            <p class="text-primary">Plano de R$ <?= number_format($master['valor'], 2, ',', '.') ?> converte <?= $master['pct_conversao']; ?>% dos seus pontos bin??rios</p>
                        <?php endforeach; ?>
                        <p>Seus pontos da menor perna ser??o convertidos em saldo baseados na taxa de convers??o acima, e ela ser?? zerada!</p>
                        <p>Por exemplo: Um usu??rio com plano de 3000, 10000 pontos na perna esquerda e 5000 pontos na perna direita, ter?? os pontos da sua <b>perna direita</b> convertidos com a taxa de <b>60%</b>!
                            <br>No final o usu??rio ir?? receber R$ 3.000,00 a mais!!
                        </p>
                        <hr>
                        <p>Caso o usu??rio possua uma das pernas zeradas, nenhum ponto ser?? convertido!</p>
                        <p>O plano <b>master</b> ser?? pago juntamente ?? ades??o</p>
                        <small class="text-danger" style="font-size:80%;">O ganho m??ximo est?? sujeito ao teto mensal do plano!</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- // END Drawer Layout -->

    <!-- jQuery -->
    <script src="<?php echo site_url('assets/assets_old'); ?>/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?php echo site_url('assets/assets_old'); ?>/vendor/popper.min.js"></script>
    <script src="<?php echo site_url('assets/assets_old'); ?>/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="<?php echo site_url('assets/assets_old'); ?>/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="<?php echo site_url('assets/assets_old'); ?>/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="<?php echo site_url('assets/assets_old'); ?>/vendor/material-design-kit.js"></script>

    <!-- App JS -->
    <script src="<?php echo site_url('assets/assets_old'); ?>/js/app.js"></script>

    <!-- Preloader -->
    <script src="<?php echo site_url('assets/assets_old'); ?>/js/preloader.js"></script>

    <!-- Toastr -->
    <script src="<?php echo site_url('assets/assets_old'); ?>/vendor/toastr.min.js"></script>
    <script src="<?php echo site_url('assets/assets_old'); ?>/js/toastr.js"></script>

    <!-- Validador de formul??rios -->
    <script src="<?php echo site_url('assets/js/verificador.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/verificador_datas5.js'); ?>"></script>

    <!-- Helper de arquivos -->
    <script src="<?php echo site_url('assets/js/fileSender.js'); ?>"></script>

    <!-- bootstrap selectpicker -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <?php
    if ($this->session->flashdata('aviso_tipo')) { ?>
        <script>
            $(document).ready(function() {
                var options = {
                    "closeButton": true,
                    "positionClass": "posicao-toast",
                    "progressBar": true,
                    "timeOut": 10000
                }
                <?php if ($this->session->flashdata('aviso_tipo') == 'warning' || $this->session->flashdata('aviso_tipo') == '3' || $this->session->flashdata('aviso_tipo') == 'atencao') { ?>
                    toastr.warning('<?php echo $this->session->flashdata('aviso_msg'); ?>', 'Aten????o', options);
                <?php } else if ($this->session->flashdata('aviso_tipo') == 'success' || $this->session->flashdata('aviso_tipo') == '0' || $this->session->flashdata('aviso_tipo') == 'sucesso') { ?>
                    toastr.success('<?php echo $this->session->flashdata('aviso_mensagem'); ?>', 'Sucesso!', options);
                <?php } else if ($this->session->flashdata('aviso_tipo') == 'error' || $this->session->flashdata('aviso_tipo') == '1' || $this->session->flashdata('aviso_tipo') == 'danger' || $this->session->flashdata('aviso_tipo') == 'erro' || $this->session->flashdata('aviso_tipo') == 'perigo') { ?>
                    toastr.error('<?php echo $this->session->flashdata('aviso_mensagem'); ?>', 'Erro!', options);
                <?php } ?>
            });
        </script>
    <?php } ?>
    <script>
        function adquirePlano(obj) {
            console.log($(obj).prop('checked'));
            if (!$(obj).prop('checked')) return $('#selectMaster').html(''); {

                $('#selectMaster').html(`
                    <div class="form-row">
                        <div class="form-group col-12">
                            <select name="plano_master" class="form-control mt-2" >
                            <?php foreach ($masters as $m) {
                                echo '<option value="'.$m['id'].'">R$ ' . $m['valor'] . ' - ' . $m['pct_conversao'] . '% convers??o</option>';
                            } ?>
                            </select>
                        </div>
                    </div>
                `);
            }
        }

        function mascaraCep(obj) {
            var i = 0;
            var v = obj.value;
            v = v.replace(/\D/g, "");
            v = v.length > 8 ? v.substring(0, 8) : v;
            v = v.replace(/(\d{5})(\d)/, "$1-$2");
            obj.value = v;
        }

        function verifyNascimento(obj) {
            $('#alertaNascimento').remove();
            let [dia, mes, ano] = obj.value.split('/');
            if (typeof dia !== 'undefined' &&
                typeof mes !== 'undefined' &&
                typeof ano !== 'undefined' &&
                dia.length >= 2 &&
                mes.length >= 2 &&
                ano.length >= 4
            ) {
                dataNascimento(`${ano}-${mes}-${dia}`);
            }
        }

        function avisoErro(aviso, selector = '#nascimento') {
            $('#alertaNascimento').remove();
            let dangerAlert = `<div id="alertaNascimento" class="alert alert-danger" style="margin-top: .1rem;">
                ${aviso}
            </div>`;

            $(selector).parent().append(dangerAlert);
        }

        function verificaIdade(idade) {
            if (idade >= 60) {
                $('#nome_benef').prop('readonly', true);
                $('#cpf_benef').prop('readonly', true);
                $('#parentesco_benef').prop('readonly', true);

                $('#nome_benef').prop('required', false);
                $('#cpf_benef').prop('required', false);
                $('#parentesco_benef').prop('required', false);
                avisoErro("Voc?? n??o pode cadastrar um dependente pois tem 60 anos ou mais!",
                    '#dados_benefc');
            } else {
                $('#nome_benef').prop('readonly', false);
                $('#cpf_benef').prop('readonly', false);
                $('#parentesco_benef').prop('readonly', false);

                $('#nome_benef').prop('required', true);
                $('#cpf_benef').prop('required', true);
                $('#parentesco_benef').prop('required', true);
            }
        }

        function dataNascimento(nascimento) {
            try {
                data = new Date(nascimento);
                var diff_ms = Date.now() - data.getTime(data);
                var age_dt = new Date(diff_ms);

                let idade = Math.abs(age_dt.getUTCFullYear() - 1970);

                if (!idade || idade < 16) return avisoErro("Data de nascimento inv??lida!");

                verificaIdade(idade);
            } catch (e) {
                avisoErro("Data de nascimento inv??lida!");
            }
        }

        function mascaraCPF(obj) {
            var or = obj.value;
            var v = or.replace(/\D/g, '');
            if (v.length > 14) {
                v = v.substring(0, 14);
            }
            if (v.length >= 10) {
                if (v.length <= 11) { //CPF
                    v = v.replace(/(\d{3})(\d)/, "$1.$2");
                    v = v.replace(/(\d{3})(\d)/, "$1.$2");
                    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
                    obj.value = v;

                } else { //CNPJ
                    v = v.replace(/(\d{2})(\d)/, "$1.$2");
                    v = v.replace(/(\d{3})(\d)/, "$1.$2");
                    v = v.replace(/(\d{3})(\d)/, "$1/$2");
                    v = v.replace(/(\d{4})(\d)/, "$1-$2");
                    obj.value = v;
                }
            } else {
                obj.value = obj.value;
            }
        }


        $(document).ready(function() {
            <?php
            $dataFields = $this->session->userdata('dataFields');
            if (isset($dataFields[0])) {
                foreach ($dataFields as $d) {
                    echo $d;
                }
                $this->session->unset_userdata('dataFields');
            }

            ?>
            $('.cep').on('keyup', function() {
                mascaraCep(this);
            });

            $('.cpf').on('keyup', function() {
                mascaraCPF(this);
            });

            $('#nascimento').on('keyup blur change', function() {
                MascaraData(this);
            });
        });

        var planos = <?php echo json_encode($planos); ?>;

        function mudaPlano(val) {
            var planSel = null;
            planos.map((pln) => {
                if (pln.id == val) {
                    planSel = pln;
                }
            });
            console.log(planSel);
            $('#planoRow span').html(planSel.nome);
            $('#valorRow h5').html(parseFloat(planSel.valor).toFixed(2).toString().replace('.', ','));
            $('#descricaoRow p').html(planSel.descricao);
        }

        function getCidades(id, selector) {
            var xmlhttp = new XMLHttpRequest();
            dataFormAj = new FormData();
            dataFormAj.append('estado', id);
            addLoaderLabel(selector);
            xmlhttp.open("POST", "<?php echo site_url('enderecos/buscar_cidades') ?>", true);
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var retorno = JSON.parse(this.responseText);
                    if (typeof retorno !== 'undefined' && retorno !== null) {
                        var opt = '';
                        retorno.map((cid) => {
                            opt += '<option value="' + cid.nome + '">' + cid.nome + '</option>';
                        });
                        document.querySelector(selector).innerHTML = opt;
                        $(selector).selectpicker('destroy');
                        $(selector).selectpicker();
                    }
                }
                removeLoaderLabel(selector);
            };
            xmlhttp.send(dataFormAj);
        }

        function addLoaderLabel(elemento) {
            var label = $(elemento).parent().parent().find('.form-label');
            if (!$(elemento).parent().parent().find('.fa-spinner').length) {
                label[0].innerHTML += ' <i class="fa fa-spinner fa-spin"></i>';
            }
        }

        function removeLoaderLabel(elemento) {
            if ($(elemento).parent().parent().find('.fa-spinner').length) {
                $(elemento).parent().parent().find('.fa-spinner').remove();
            }
        }
    </script>

    <script>
        function limpa_formul??rio_cep() {
            //Limpa valores do formul??rio de cep.
            document.getElementById('endereco').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('estado').value = ("");
            // document.getElementById('ibge').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('endereco').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('estado').value = (conteudo.uf);
                // document.getElementById('ibge').value=(conteudo.ibge);

                $('#numero').focus();

            } //end if.
            else {
                //CEP n??o Encontrado.
                limpa_formul??rio_cep();
                alert("CEP n??o encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova vari??vel "cep" somente com d??gitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Express??o regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('endereco').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('estado').value = "...";
                    // document.getElementById('ibge').value="...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conte??do.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep ?? inv??lido.
                    limpa_formul??rio_cep();
                    alert("Formato de CEP inv??lido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formul??rio.
                limpa_formul??rio_cep();
            }
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $('#cxcpf').removeAttr('name', 'cpf');
        $('.extrang').css('display', 'none');
        $('#nac').on('change', function() {
            let type = $('#nac').val();

            if (type == 'br') {
                // ccpf
                $('.extrang').css('display', 'none');
                $('.ccpf').css('display', 'block');
                $('#idid654').removeAttr('required');
                $('#cpf').attr('name', 'cpf');
                $('#cxcpf').removeAttr('name');
            } else if (type == 'ex') {
                // extrang
                $('.ccpf').css('display', 'none');
                $('.extrang').css('display', 'block');
                $('#idid654').attr('required');
                $('#cpf').removeAttr('required');
                $('#cpf').removeAttr('name');
                $('#cxcpf').attr('name', 'cpf');
            }

        });




        //obtem o elemento apenas uma vez no inicio em vez de todas as vezes que gera o cpf
        const cpf = document.getElementById("cxcpf");

        function gerarCpf() {
            const num1 = aleatorio(); //aleatorio j?? devolve string, logo n??o precisa de toString
            const num2 = aleatorio();
            const num3 = aleatorio();

            const dig1 = dig(num1, num2, num3); //agora s?? uma fun????o dig
            const dig2 = dig(num1, num2, num3, dig1); //mesma fun????o dig aqui

            //aqui com interpola????o de strings fica bem mais legivel
            return `${num1}.${num2}.${num3}-${dig1}${dig2}`;
        }

        //o quarto parametro(n4) s?? ser?? recebido para o segundo digito
        function dig(n1, n2, n3, n4) {

            //as concatena????es todas juntas uma vez que s??o curtas e leg??veis
            let nums = n1.split("").concat(n2.split(""), n3.split(""));

            if (n4 !== undefined) { //se for o segundo digito coloca o n4 no sitio certo
                nums[9] = n4;
            }

            let x = 0;

            //o j ?? tamb??m iniciado e incrementado no for para aproveitar a pr??pria sintaxe dele
            //o i tem inicios diferentes consoante ?? 1?? ou 2?? digito verificador
            for (let i = (n4 !== undefined ? 11 : 10), j = 0; i >= 2; i--, j++) {
                x += parseInt(nums[j]) * i;
            }

            const y = x % 11;
            //tern??rio aqui pois ambos os retornos s??o simples e continua legivel
            return y < 2 ? 0 : 11 - y;
        }

        function aleatorio() {
            const aleat = Math.floor(Math.random() * 999);
            //o preenchimento dos zeros ?? esquerda ?? mais facil com a fun????o padStart da string
            return ("" + aleat).padStart(3, '0');
        }

        cpf.value = gerarCpf();
    </script>

</body>

</html>