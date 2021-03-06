<?php include_once(ROOT_PATH . '/assets/includes/rede/header.php'); ?>
<style>
    .btn-primary.btn-outline {
        background: transparent;
        color: #6993FF;
    }
</style>


<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-12">

                <div class="row">
                    <div class="col-xl-6">

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Tiles Widget 11-->
                                <div class="card card-custom bg-primary gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                    <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3"><?php echo $totalUsers; ?></div>
                                        <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1">Sua Matriz</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 11-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Tiles Widget 12-->
                                <div class="card card-custom gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-success">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <div class="text-dark font-weight-bolder font-size-h2 mt-3"><?php echo 'R$ ' . number_format($saldo['saldo']); ?></div>
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Seu Saldo</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Tiles Widget 11-->
                                <div class="card card-custom bg-danger gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                                <title>Stockholm-icons / General / Thunder</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs></defs>
                                                <g id="Stockholm-icons-/-General-/-Thunder" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect id="Rectangle-10" x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M12.3740377,19.9389434 L18.2226499,11.1660251 C18.4524142,10.8213786 18.3592838,10.3557266 18.0146373,10.1259623 C17.8914367,10.0438285 17.7466809,10 17.5986122,10 L13,10 L13,4.47708173 C13,4.06286817 12.6642136,3.72708173 12.25,3.72708173 C11.9992351,3.72708173 11.7650616,3.85240758 11.6259623,4.06105658 L5.7773501,12.8339749 C5.54758575,13.1786214 5.64071616,13.6442734 5.98536267,13.8740377 C6.10856331,13.9561715 6.25331908,14 6.40138782,14 L11,14 L11,19.5229183 C11,19.9371318 11.3357864,20.2729183 11.75,20.2729183 C12.0007649,20.2729183 12.2349384,20.1475924 12.3740377,19.9389434 Z" id="Path-3" fill="#000000"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                            <?php if (isset($assinatura['master']['valor'])) : ?>
                                                <span class="text-white">
                                                    MASTER <?= $assinatura['master']['valor']; ?> (<?= $assinatura['master']['pct_conversao'] ?>%)
                                                </span>
                                            <?php endif; ?>
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3"><?php echo $saldo['pontos_esquerda']; ?></div>
                                        <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1">Pontua????o Esquerda</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 11-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Tiles Widget 11-->
                                <div class="card card-custom bg-danger gutter-b" style="height: 150px">
                                    <div class="card-body">
                                        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                                <title>Stockholm-icons / General / Thunder</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs></defs>
                                                <g id="Stockholm-icons-/-General-/-Thunder" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect id="Rectangle-10" x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M12.3740377,19.9389434 L18.2226499,11.1660251 C18.4524142,10.8213786 18.3592838,10.3557266 18.0146373,10.1259623 C17.8914367,10.0438285 17.7466809,10 17.5986122,10 L13,10 L13,4.47708173 C13,4.06286817 12.6642136,3.72708173 12.25,3.72708173 C11.9992351,3.72708173 11.7650616,3.85240758 11.6259623,4.06105658 L5.7773501,12.8339749 C5.54758575,13.1786214 5.64071616,13.6442734 5.98536267,13.8740377 C6.10856331,13.9561715 6.25331908,14 6.40138782,14 L11,14 L11,19.5229183 C11,19.9371318 11.3357864,20.2729183 11.75,20.2729183 C12.0007649,20.2729183 12.2349384,20.1475924 12.3740377,19.9389434 Z" id="Path-3" fill="#000000"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                            <?php if (isset($assinatura['master']['valor'])) : ?>
                                                <span class="text-white">
                                                    MASTER <?= $assinatura['master']['valor']; ?> (<?= $assinatura['master']['pct_conversao'] ?>%)
                                                </span>
                                            <?php endif; ?>
                                        </span>
                                        <div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3"><?php echo $saldo['pontos_direita']; ?></div>
                                        <a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1">Pontua????o Direita</a>
                                    </div>
                                </div>
                                <!--end::Tiles Widget 12-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-xxl-12">
                        <!--begin::Advance Table Widget 1-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Link de cadastro</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Envie seu link de cadastro e aumente sua rede!</span>
                                </h3>
                                <div class="card-toolbar">

                                    <a onclick="copiarSelecao('#url', 'URL copiada com sucesso.')" data-clipboard-text="Just because you can doesn't mean you should ??? clipboard.js" class="btn btn-success font-weight-bolder font-size-sm">
                                        <span class="svg-icon svg-icon-md svg-icon-white">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>Copiar Link de Cadastro</a>
                                    <!-- <?php echo site_url('rede/LinkCadastro/nova_conta?link=' . $linkCadastro['link']); ?> -->
                                </div>
                                <div class="input-group mb-3">
                                    <input id="url" type="text" class="form-control" placeholder="Url" aria-label="Url" value="<?php echo site_url('rede/nova_conta?&link=' . $linkCadastro['link']); ?>" readonly aria-describedby="basic-addon2" style="display: z-index: 0;">
                                    <div class="input-group-append">
                                        <a href="<?= site_url('rede/index/seleciona/esquerda') ?>" class="btn btn-primary <?php if ($linkCadastro['lado'] === 'direita') {
                                                                                                                                echo 'btn-outline';
                                                                                                                            } ?> font-weight-bolder font-size-sm" style="width:150px;border-top-left-radius:0.42rem;border-bottom-left-radius:0.42rem;">
                                            Esquerda
                                        </a>
                                        <a href="<?= site_url('rede/index/seleciona/direita') ?>" class="btn btn-primary <?php if ($linkCadastro['lado'] === 'esquerda') {
                                                                                                                                echo 'btn-outline';
                                                                                                                            } ?> font-weight-bolder font-size-sm" style="width:150px;">
                                            Direita
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-0">

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Advance Table Widget 1-->
                    </div>
                </div>

                <!-- row 3 -->
                <div class="row">
                    <div class="col-lg-12 col-xxl-12">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Faturas em aberto</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm"><b class="text-danger">Aten????o!</b> <span class="text-danger">Para faturas em atraso ser?? cobrado uma multa de 2% e juros de 0.33% do falor da fatura ao dia.</span></span>
                                </h3>
                                <div class="card-toolbar">
                                </div>

                            </div>
                            <div class="card-body py-0">
                                <h5 class="card-title mb-4"></h5>
                                <div class="row">
                                    <div class="col-md-2">
                                        <b>ID</b>
                                    </div>
                                    <div class="col-md-2">
                                        <b>Valor</b>
                                    </div>
                                    <div class="col-md-2">
                                        <b>Status</b>
                                    </div>
                                    <div class="col-md-2">
                                        <b>Gerada</b>
                                    </div>
                                    <div class="col-md-2">
                                        <b>Vencimento</b>
                                    </div>
                                    <div class="col-md-2">
                                        <b></b>
                                    </div>
                                </div>
                                <?php
                                if (count($faturas) > 0) {
                                    foreach ($faturas as $fat) {
                                        $vencimento = ($fat['vencimento_inicial']) ? $fat['vencimento_inicial'] : $fat['vencimento'];
                                        $multa = calculaJurosVencimento($vencimento, $fat['valor']);
                                        $total = $fat['valor'] + $multa;
                                ?>
                                        <hr>
                                        <div class="row" style="padding-bottom:20px;">
                                            <div class="col-md-2">
                                                #<?php echo $fat['id']; ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?php $valor = "R$ " . number_format(($fat['valor']), 2, ',', '');
                                                if ($multa != 0) {
                                                    $valor = "R$ " . number_format(($fat['valor']), 2, ',', '');
                                                    $valor .= '<br><span class="text-danger">+ R$ ' . number_format($multa, 2, ',', '') . '</span>
                                                <br><span class="text-primary">Total: R$ ' . number_format($total, 2, ',', '') . '</span>';
                                                } else if ($fat['taxas'] != 0) {
                                                    $valor = "R$ " . number_format(($fat['valor'] - $fat['taxas']), 2, ',', '');
                                                    $valor .= '<br><span class="text-danger">+ R$ ' . number_format($fat['taxas'], 2, ',', '') . '</span>
                                                <br><span class="text-primary">Total: R$ ' . number_format($fat['valor'], 2, ',', '') . '</span>';
                                                }
                                                echo $valor;
                                                ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?php echo '<span class="badge badge-danger">Em aberto</span>'; ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?php echo formataDataBrSemTime($fat['criado_em']); ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?php echo formataDataBrSemTime($fat['vencimento']); ?>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="<?php echo site_url('rede/faturas/pagar/' . $fat['id']); ?>">
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i>&nbsp;&nbsp;Pagar</button>
                                                </a>
                                            </div>
                                        </div>

                                <?php  }
                                } else {
                                    echo '<hr><div class="row"><div class="col-12 text-center"><h4><i class="fa fa-check"></i> Nenhuma fatura em aberto!</h4></div></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12 col-xxl-12">
                        <!--begin::Advance Table Widget 1-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Ultimos Cadastros</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Ultimos 4 cadastros na sua matriz</span>
                                </h3>
                                <div class="card-toolbar">
                                </div>

                            </div>

                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-0">

                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                                        <thead>
                                            <tr class="text-left">
                                                <th class="pr-0" style="width: 50px">Login</th>
                                                <th style="min-width: 200px"></th>
                                                <th style="min-width: 150px">Patrocinador</th>
                                                <th style="min-width: 150px">Status</th>
                                                <!-- <th class="pr-0 text-right" style="min-width: 150px"></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php foreach ($lastUsers as $user) : $indicador = getById($user['id']); ?>
                                                <tr>
                                                    <td class="pr-0">
                                                        <div class="symbol symbol-50 symbol-light mt-1">
                                                            <span class="symbol-label">
                                                                <img src="<?php echo getImgPerf($user['foto']); ?>" class="h-75 align-self-end" alt="" style="border-radius: 50%;">
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg"><?php echo $user['login']; ?></a>
                                                        <span class="text-muted font-weight-bold text-muted d-block"><?php echo $user['nome']; ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo isset($indicador['login']) ? $indicador['login'] : '#' . $user['id_indicador']; ?></span>
                                                        <span class="text-muted font-weight-bold"><?php echo isset($indicador['nome']) ? $indicador['nome'] : ''; ?></span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column w-100 mr-2">
                                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                                <?php if ($user['bloqueado'] == 0) : ?>
                                                                    <span class="text-white font-size-sm font-weight-bold badge bg-<?php echo ($user['ativo'] == 1) ? 'success' : 'danger'; ?>"><?php echo ($user['ativo'] == 1) ? 'Ativo' : 'Inativo'; ?></span>
                                                                <?php else : ?>
                                                                    <span class="text-white font-size-sm font-weight-bold badge bg-danger">Bloqueado</span>
                                                                <?php endif; ?>
                                                            </div>

                                                        </div>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>


                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Advance Table Widget 1-->
                    </div>
                </div>

            </div>

        </div>
        <!--end::Row-->

        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

<?php include_once(ROOT_PATH . '/assets/includes/rede/footer.php'); ?>