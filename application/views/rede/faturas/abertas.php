<?php include_once(ROOT_PATH . '/assets/includes/rede/header.php'); ?>

<div class="page-section border-bottom-2">
    <div class="container page__container">

        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Faturas em aberto</h5>
                        <b class="text-danger">Atenção!</b> <span class="text-danger">Para faturas em atraso será cobrado uma multa de 2% e juros de 0.33% do falor da fatura ao dia.</span>
                        <div class="table-responsive">
                            <table class="table mb-0 thead-border-top-0 table-nowrap data-tables">
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">ID</a>
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
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="search">
                                    <?php if (count($faturas) > 0) {
                                        foreach ($faturas as $fat) {
                                            $vencimento = ($fat['vencimento_inicial']) ? $fat['vencimento_inicial'] : $fat['vencimento'];
                                            $multa = calculaJurosVencimento($vencimento, $fat['valor']);
                                            $total = $fat['valor'] + $multa;

                                            $valor = "R$ " . number_format(($fat['valor']), 2, ',', '');
                                            if ($multa != 0) {
                                                $valor = "R$ " . number_format(($fat['valor']), 2, ',', '');
                                                $valor .= '<br><span class="text-danger">+ R$ ' . number_format($multa, 2, ',', '') . '</span>
                                                <br><span class="text-primary">Total: R$ ' . number_format($total, 2, ',', '') . '</span>';
                                            } else if ($fat['taxas'] != 0) {
                                                $valor = "R$ " . number_format(($fat['valor'] - $fat['taxas']), 2, ',', '');
                                                $valor .= '<br><span class="text-danger">+ R$ ' . number_format($fat['taxas'], 2, ',', '') . '</span>
                                                <br><span class="text-primary">Total: R$ ' . number_format($fat['valor'], 2, ',', '') . '</span>';
                                            }

                                            echo '<tr>
                                            <td>
                                                ' . $fat['id'] . '
                                            </td>
                                            <td class="js-lists-values-login">
                                                ' . $valor . '
                                            </td>
                                            <td class="js-lists-values-email">
                                                <span class="badge badge-accent">Em aberto</span>
                                            </td>
                                            <td class="js-lists-values-email">
                                                ' . formataDataBL($fat['criado_em']) . '
                                            </td>
                                            <td class="js-lists-values-telefone">
                                                ' . formataDataBL($fat['vencimento']) . '
                                            </td>
                                            <td>
                                                <a href="' . site_url('rede/faturas/pagar/' . $fat['id']) . '">
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-credit-card"></i>&nbsp;&nbsp;Pagar</button>
                                                </a>
                                            </td>
                                        </tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="5" style="text-align:center;">Nenhuma fatura em aberto encontrada!</td></tr>';
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
<?php include_once(ROOT_PATH . '/assets/includes/rede/footer.php'); ?>