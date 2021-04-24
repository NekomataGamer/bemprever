<?php include_once(ROOT_PATH . '/assets/includes/admin/header.php'); ?>

<div class="py-32pt navbar-submenu">
    <div class="container page__container">
        <div class="progression-bar progression-bar--active-accent">

            <span class="progression-bar__item-text h5 mb-0 text-uppercase">
                Listagem de Profissionais Credenciados<br>
                <a href="<?php echo site_url('admin/profissionais/cadastrar/');?>">
                    <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Credenciar Profissional</button>
                </a>
            </span>
        </div>
    </div>
</div>

<div class="page-section border-bottom-2">
    <div class="container page__container">
    
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Listar Profissionais</h5>
                        <div class="table-responsive">
                            <table class="table mb-0 thead-border-top-0 table-nowrap data-tables">
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">ID</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">Nome Fantasia</a>
                                        </th>
                                        
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">CNPJ</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">UF</a>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="search">
                                    <?php if(count($profissionais) > 0):?>
                                        <?php foreach($profissionais as $fat):?>
                                            <tr>
                                                <td><?php echo $fat['id'];?></td>
                                                <td><?php echo $fat['nome_fant'];?></td>
                                                <td><?php echo $fat['cnpj'];?></td>
                                                <td><?php echo $fat['uf'];?></td>
                                                <td><a href="<?php echo site_url("admin/profissionais/remove/{$fat['id']}");?>" class="btn btn-primary dropdown-toggle"></a></td>
                                            </tr>
                                        <?php endforeach;?>
                                        <?php else: echo '<tr><td colspan="5" style="text-align:center;">Nenhuma categoria encontrada!</td></tr>'; ?>
                                    <?php endif;?>
                                    
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