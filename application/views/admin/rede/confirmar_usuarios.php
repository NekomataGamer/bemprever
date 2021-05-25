<?php include_once(ROOT_PATH . '/assets/includes/admin/header.php'); ?>

<div class="page-section border-bottom-2">
    <div class="container page__container">

        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Ativar Usuários</h5>
                        <div class="table-responsive" style="min-height:400px;">
                            <table class="table mb-0 thead-border-top-0 table-nowrap data-tables">
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">ID</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">Usuário</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">Email</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">Documento</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">IP cadastrado</a>
                                        </th>
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="search">
                                    <?php if (count($usuarios) > 0) {
                                        foreach ($usuarios as $fat) {
                                            $documento = "<span class='text-danger'>Não enviado</span>";
                                            if (isset($fat['root']) && !empty($fat['root'])){
                                                $documento = '<a href="'. site_url(getDocumentoByRoot($fat['root'])) . '" target="_blank" >
                                                    <img src="' . site_url(getDocumentoByRoot($fat['root'])) . '" alt="documento" style="max-height:100px; width: auto;" />
                                                </a>';
                                            }
                                            $btns = '<a class="dropdown-item" 
                                                href="javascript:void(0);"
                                                    data-href="' . site_url('admin/rede/confirmar_cadastro/' . $fat['id']) . '"
                                                    data-titulo="<i class=' . "'fas fa-check'" . '></i> Confirmar Cadastro"
                                                    data-texto="Deseja realmente confirmar o cadastro do usuário <b>' . $fat['login'] . '</b> na rede?"
                                                    data-btn="Cancelar"
                                                    data-btn-acao="Confirmar Cadastro"
                                                    data-toggle="aviso-modal"
                                                    title="Confirmar cadastro na rede"
                                                href="javascript:void(0);"><i class="fa fa-check"></i>&nbsp;Confirmar cadastro</a>';
                                                
                                                $btns2 = '<a class="dropdown-item" 
                                                href="javascript:void(0);"
                                                    data-href="' . site_url('admin/rede/nao_confirmar_cadastro/' . $fat['id']) . '"
                                                    data-titulo="<i class=' . "'fas fa-uncheck'" . '></i> Pedir Novo Documento"
                                                    data-texto="Deseja realmente deletar o documento atual do usuário <b>' . $fat['login'] . '</b> e pedi-lo novamente?"
                                                    data-btn="Cancelar"
                                                    data-btn-acao="Pedir Novo Documento"
                                                    data-toggle="aviso-modal"
                                                    title="Pedir Novo Documento"
                                                href="javascript:void(0);"><i class="fa fa-check"></i>&nbsp;Pedir Novo Doc</a>';
                                            echo '<tr>
                                            <td>
                                                #' . $fat['id'] . '
                                            </td>
                                            <td class="js-lists-values-login">
                                                ' . $fat['login'] . '
                                            </td>
                                            <td class="js-lists-values-email">
                                                ' . $fat['email'] . '
                                            </td>
                                            <td class="js-lists-values-email">
                                                ' . $documento . '
                                            </td>
                                            <td class="js-lists-values-email">
                                                ' . $fat['ip_assinado'] . '
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções</button>
                                                <div class="dropdown-menu">
                                                    ' . $btns . $btns2 . ' 
                                                </div>
                                            </td>
                                        </tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="5" style="text-align:center;">Nenhum usuário encontrado!</td></tr>';
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // END Page Content -->
<?php include_once(ROOT_PATH . '/assets/includes/admin/footer.php'); ?>