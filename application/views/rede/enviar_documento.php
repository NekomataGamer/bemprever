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
    <link type="text/css" href="<?php echo site_url('assets/css/verificador.css'); ?>" rel="stylesheet">

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

        .tem-erro.erro-label {
            color:red;
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
                    <center>
                        <img src="<?php echo site_url('assets/imagens/BPV-Logo-Color-Login.png'); ?>" class="logo-login" alt="">
                        <h4>Seja bem vindo à BEMPREVER!</h4>
                        <div class="alert alert-danger">
                            <p>Encontramos <b>dados inconsistentes ou mal focados</b> no seu último envio do documento, por favor, envie um documento escaneado ou uma foto <b>VISÍVEL</b> da carta preenchida.</p>
                        </div>
                    </center>

                    <form method="post" action="<?php echo site_url('rede/documentos/reenviar/' . $user['id']); ?>" enctype="multipart/form-data" class="col-md-12 p-0 mx-auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h5 class="card-title mb-4">Reenviar documento *</h5>

                                        <div class="form-row">
                                            <div class="col-md-12" style="font-size:14px;">
                                                <span class="text-danger">É necessário fazer alguns passos para prosseguir com seu cadastro:</span>
                                                <br><br>
                                                <li>
                                                    Baixe e imprima nossa
                                                    <a class="text-primary fbold" href="<?php echo site_url('carta_de_orientacao_ao_associado') ?>">CARTA DE ORIENTAÇÃO AO ASSOCIADO</a>:
                                                    <br><a class="btn btn-secondary" href="<?php echo site_url('carta_de_orientacao_ao_associado') ?>"><i class="fa fa-download"></i>&nbsp;&nbsp;Baixar Documento</a>
                                                </li>
                                                <br>
                                                <li>Preencha os campos com seus dados à caneta preta ou azul.</li>
                                                <br>
                                                <li>Anexe abaixo os documentos escaneados (ou fotos de celular totalmente visíveis).</li>
                                                <input id="fileBtn" type="file" class="fileSender" data-target=".filesToSend" multiple accept="image/png, image/jpeg, image/jpg" style="display:none">
                                                <div class="d-flex align-items-center filesToSend" style="flex-wrap: wrap;">
                                                </div>
                                                <a href="javascript:void(0)" class="btn btn-secondary" onclick="$('#fileBtn').click()"><i class="fa fa-upload"></i>&nbsp;&nbsp;Enviar Arquivos</a>
                                                <div class="form-group" style="margin-bottom:0px;">
                                                    <input id="temArquivos" required value="" style="opacity:0;width:100%;height:0px;">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <hr>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                                    <label class="form-check-label" for="exampleCheck1" style="font-size:14px;">Declaro que li e concordo com os <a class="text-primary" href="<?php echo site_url('termos_e_condicoes_de_uso'); ?>" target="_blank">Termos e Condições de Uso</a> da plataforma!</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-principal btn-block"><i class="fa fa-check"></i>&nbsp;&nbsp;Reenviar documento!</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- // END Page Content -->


        </div>

        <!-- // END drawer-layout__content -->



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

    <!-- Validador de formulários -->
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
                    toastr.warning('<?php echo $this->session->flashdata('aviso_msg'); ?>', 'Atenção', options);
                <?php } else if ($this->session->flashdata('aviso_tipo') == 'success' || $this->session->flashdata('aviso_tipo') == '0' || $this->session->flashdata('aviso_tipo') == 'sucesso') { ?>
                    toastr.success('<?php echo $this->session->flashdata('aviso_mensagem'); ?>', 'Sucesso!', options);
                <?php } else if ($this->session->flashdata('aviso_tipo') == 'error' || $this->session->flashdata('aviso_tipo') == '1' || $this->session->flashdata('aviso_tipo') == 'danger' || $this->session->flashdata('aviso_tipo') == 'erro' || $this->session->flashdata('aviso_tipo') == 'perigo') { ?>
                    toastr.error('<?php echo $this->session->flashdata('aviso_mensagem'); ?>', 'Erro!', options);
                <?php } ?>
            });
        </script>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>

</html>