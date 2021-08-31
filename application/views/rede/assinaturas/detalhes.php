<?php include_once(ROOT_PATH . '/assets/includes/rede/header.php'); ?>

<div class="page-section border-bottom-2">
    <div class="container page__container">

        <div class="row">
            <div class="col-lg-4">
                <div class="card border-1 border-left-3 border-left-primary text-center mb-lg-0">
                    <div class="card-body">
                        <h4 class="h2 mb-0">
                            <?php echo $plano[0]['nome']; ?>
                        </h4>
                        <div>
                            <?php
                            if (isset($master['valor']) && !empty($master)) {
                                echo "<span class='text-primary'>MASTER {$master['valor']} ({$master['pct_conversao']}% conversão binária)</span>";
                            } else {
                                echo "<span class='text-primary'>SEM CONVERSÃO BINÁRIA</span>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-1 border-left-3 border-left-success text-center mb-lg-0">
                    <div class="card-body">
                        <h4 class="h2 mb-0"><?php echo number_format($assinatura[0]['recebido'], 2, ',', ''); ?></h4>
                        <div>Total Recebido</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-1 border-left-3 border-left-danger text-center mb-lg-0">
                    <div class="card-body">
                        <h4 class="h2 mb-0"><?php echo number_format($assinatura[0]['pago'], 2, ',', ''); ?></h4>
                        <div>Total Pago</div>
                    </div>
                </div>
            </div>

        </div>

        <!-- row 2 -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Plano</h5>
                        <div class="row">
                            <div class="col-4">
                                <b>Nome</b>
                            </div>
                            <div class="col-4">
                                <b>Adesão</b>
                            </div>
                            <div class="col-4">
                                <b>Mensalidade</b>
                            </div>
                        </div>
                        <?php
                        if (count($plano) > 0) {
                            foreach ($plano as $pln) { ?>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        <?php echo $pln['nome']; ?>
                                    </div>
                                    <div class="col-4">
                                        <?php echo 'R$ ' . number_format($pln['adesao'], 2, ',', ''); ?>
                                    </div>
                                    <div class="col-4">
                                        <?php echo 'R$ ' . number_format($pln['valor'], 2, ',', ''); ?>
                                    </div>
                                </div>
                                <hr>
                                <?php if (isset($master['valor']) && !empty($master)) : ?>
                                    <div class="row">
                                        <div class="col-4">
                                            <?php echo "MASTER {$master['valor']}"; ?>
                                        </div>
                                        <div class="col-4">
                                            <?php echo 'R$ ' . number_format($master['valor'], 2, ',', ''); ?>
                                        </div>
                                        <div class="col-4">
                                            <?php echo ' - '; ?>
                                        </div>
                                    </div>
                                    <hr>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo nl2br($pln['descricao']); ?>
                                        <?php if (isset($master['valor']) && !empty($master)) : ?>
                                            <br><br>
                                            <?php echo "{$master['pct_conversao']}% de conversão binária"; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                        <?php  }
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- row 3 -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Assinatura</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <b>Valor</b>
                            </div>
                            <div class="col-md-3">
                                <b>Ttl pago</b>
                            </div>
                            <div class="col-md-3">
                                <b>Ttl recebido</b>
                            </div>
                            <div class="col-md-3">
                                <b>Status</b>
                            </div>
                        </div>
                        <?php
                        if (count($assinatura) > 0) {
                            foreach ($assinatura as $pln) { ?>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php echo 'R$ ' . number_format($pln['valor'], 2, ',', ''); ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo 'R$ ' . number_format($pln['pago'], 2, ',', ''); ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo 'R$ ' . number_format($pln['recebido'], 2, ',', ''); ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $pln['status'] == 'ativo' ? '<span class="badge badge-success">' . ucfirst($pln['status']) . '</span>' : '<span class="badge badge-accent">' . ucfirst($pln['status']) . '</span>'; ?>
                                    </div>
                                </div>

                        <?php  }
                        } ?>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- // END Page Content -->
<?php include_once(ROOT_PATH . '/assets/includes/rede/footer.php'); ?>