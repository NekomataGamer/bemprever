<!-- Page Content -->
<?php include_once(ROOT_PATH . '/assets/includes/admin/header.php'); ?>


<div class="py-32pt navbar-submenu">
    <div class="container page__container">
        <div class="progression-bar progression-bar--active-accent">
            <!-- <a href="pricing.html"
                class="progression-bar__item progression-bar__item--complete">
                <span class="progression-bar__item-content">
                    <i class="material-icons progression-bar__item-icon">done</i>
                    <span class="progression-bar__item-text h5 mb-0 text-uppercase">Pricing</span>
                </span>
            </a>
            <a href="signup.html"
                class="progression-bar__item progression-bar__item--complete progression-bar__item--active">
                <span class="progression-bar__item-content">
                    <i class="material-icons progression-bar__item-icon"></i>
                    <span class="progression-bar__item-text h5 mb-0 text-uppercase">Account details</span>
                </span>
            </a>
            <a href="signup-payment.html"
                class="progression-bar__item">
                <span class="progression-bar__item-content">
                    <i class="material-icons progression-bar__item-icon"></i>
                    <span class="progression-bar__item-text h5 mb-0 text-uppercase">Payment details</span>
                </span>
            </a> -->

            <span class="progression-bar__item-text h5 mb-0 text-uppercase">
                <?= $title; ?>
            </span>
        </div>
    </div>
</div>

<div class="page-section container page__container" style="overflow-y:auto!important;">
    <div class="col-lg-12 p-0 mx-auto">

        <div class="table-responsive">
            <?php if (isset($alert) && !empty($alert)) : ?>
                <div class="alert alert-info">
                    <?= $alert; ?>
                </div>
            <?php endif; ?>
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
                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">Valor</a>
                        </th>
                        <th>
                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">Status</a>
                        </th>
                        <th>
                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">Gerada</a>
                        </th>
                        <th>
                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">Vencimento</a>
                        </th>
                        <?php if (isset($edit)) : ?>
                            <th>
                            </th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody class="list" id="search">
                    <?php if (count($faturas) > 0) {
                        foreach ($faturas as $fat) {
                            $status = ($fat['paga'] == 0) ? '<span class="badge badge-accent">PENDENTE</span>' : '<span class="badge badge-success">PAGA</span>';
                            echo '<tr>
                                            <td>
                                                ' . $fat['id'] . '
                                            </td>
                                            <td>
                                                <b>' . $fat['login'] . '</b>
                                                <br/>' . $fat['email'] . '
                                                <br/><small class="cpf_cnpj">' . $fat['cpf'] . '</small>
                                            </td>
                                            <td class="js-lists-values-login">
                                                ' . number_format($fat['valor'], 2, ',', '') . '
                                            </td>
                                            <td class="js-lists-values-email">
                                                ' . $status . '
                                            </td>
                                            <td class="js-lists-values-email">
                                                ' . formataDataBrSemTime($fat['criado_em']) . '
                                            </td>
                                            <td class="js-lists-values-telefone">
                                                ' . formataDataBrSemTime($fat['vencimento']) . '
                                            </td>';
                            if (isset($edit)){
                                echo '<td>
                                        <a href="javascript:void(0);"
                                        data-href="' . site_url('pagamentos/pagarContaAluno/' . $fat['id']) . '"
                                        data-titulo="<i class=' . "'fa fa-credit-card'" . '></i> Dar Baixa Na Fatura"
                                        data-texto="Deseja realmente dar baixa na fatura <b>#'.$fat['id'].'</b>, de valor <b>R$ '. number_format($fat['valor'], 2, ',', '') .'</b>, com vencimento <b>' . formataDataBrSemTime($fat['vencimento']) . '</b> do usuário <b>' . $fat['login'] . '</b> ? <small>Caso o usuário esteja bloqueado, ele voltará a poder pedir saques receber ganhos!</small>"
                                        data-btn="Cancelar"
                                        data-btn-acao="Dar Baixa"
                                        data-toggle="aviso-modal"
                                        title="Bloquear usuário" >
                                            <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i>&nbsp;&nbsp;Dar Baixa</button>
                                        </a>
                                    </td>';
                            }
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5" style="text-align:center;">Nenhuma fatura encontrada!</td></tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once(ROOT_PATH . '/assets/includes/admin/footer.php'); ?>

<script>

    function mascaraCPF(obj) {
        var or = obj.innerHTML;
        var v = or.replace(/\D/g, '');
        if (v.length > 14){
            v = v.substring(0, 14);
        }
        if (v.length >= 10) {
            if (v.length <= 11) { //CPF
                v = v.replace(/(\d{3})(\d)/, "$1.$2");
                v = v.replace(/(\d{3})(\d)/, "$1.$2");
                v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
                obj.innerHTML = v;

            } else { //CNPJ
                v = v.replace(/(\d{2})(\d)/, "$1.$2");
                v = v.replace(/(\d{3})(\d)/, "$1.$2");
                v = v.replace(/(\d{3})(\d)/, "$1/$2");
                v = v.replace(/(\d{4})(\d)/, "$1-$2");
                obj.innerHTML = v;
            }
        } else {
            obj.innerHTML = obj.innerHTML;
        }
    }

    $(document).ready(function() {

        var obj2 = document.querySelector('.cpf_cnpj');
        mascaraCPF(obj2);


    });
</script>