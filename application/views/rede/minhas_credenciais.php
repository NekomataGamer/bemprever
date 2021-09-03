<?php include_once(ROOT_PATH . '/assets/includes/rede/header.php'); ?>
    
    <div class="page-section border-bottom-2">
    <div class="container page__container">

        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <h5 class="card-title mb-4"></h5> 
                            <div class="d-flex align-items-center flex-wrap">
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        
                        <div class="col-xl-12">
							<!--begin::Engage Widget 11-->
							<div class="card card-custom card-stretch gutter-b">
								<div class="card-body d-flex p-0">
									<div class="flex-grow-1 p-20 pb-40 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: 35% auto; background-image: url('<?php echo base_url('assets/assetsAlison/media/svg/humans/custom-10.svg')?>')">
										<h2 class="text-dark pb-5 font-weight-bolder"><img src="<?php echo site_url('assets/imagens/LOGO_SPL_HOR.png'); ?>" width="250px"/></h2>
										Beneficiário:
										<p class="text-dark-80pb-8 font-size-h4"><strong><?php echo $this->session->userdata('nome');?></strong>
										</p>
										CPF:
										<p class="text-dark-80pb-8 font-size-h4"><strong><?php echo $this->session->userdata('cpf');?></strong>
										</p>
										<?php if($this->session->userdata('ativo') == '1'):?>
										    <a href="#" class="btn btn-success font-weight-bold py-2 px-6">Plano Ativo</a>
										    <?php else:?>
										    <a href="#" class="btn btn-danger font-weight-bold py-2 px-6">Plano Inativo</a>
										<?php endif;?>
									</div>
								</div>
							</div>
							<!--end::Engage Widget 11-->
						</div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php include_once(ROOT_PATH . '/assets/includes/rede/footer.php'); ?>
<pre>