<?php include_once(ROOT_PATH . '/assets/includes/rede/header.php'); ?>

<div class="page-section border-bottom-2">
    <div class="container page__container">

        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <h5 class="card-title mb-4">Credenciados em:</h5> 
                            <div class="d-flex align-items-center flex-wrap">
                                <form method="GET" id="formuf">
                                    <div class="form-group">
                                        
                                        <select id="estados" name="uf">
                                			<option value="">Selecione Seu Estado</option>
                                		</select>
                                		<select id="cidades" name="cidade">
                                		    <option value="">Selecione Seu Estado</option>
                                		</select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table mb-0 thead-border-top-0 table-nowrap data-tables">
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">ID</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">Nome</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">Telefone</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">Endereço</a>
                                        </th>
                                        <th>
                                            <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-nome">UF</a>
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="list" id="search">
                                    <?php if(count($credenciados) > 0):?>
                                        <?php foreach($credenciados as $fat):?>
                                            <tr>
                                                <td><?php echo $fat['id']?></td>
                                                <td><?php echo $fat['nome_fant']?></td>
                                                <td><?php echo $fat['telefone']?></td>
                                                <td><?php echo $fat['endereco']?></td>
                                                <td><?php echo $fat['uf']?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        <?php else: echo '<tr><td colspan="5" style="text-align:center;">Nenhum credenciado foi encontrado.</td></tr>';?>
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
<?php include_once(ROOT_PATH . '/assets/includes/rede/footer.php'); ?>

<script>
    $("#cidades").on('change', function(){
        $("#formuf").submit();
    });
</script>
<script type="text/javascript">	
		
		$(document).ready(function () {
		
			$.getJSON('<?php echo base_url('assets/cidades.json')?>', function (data) {

				var items = [];
				var options = '<option value="">escolha um estado</option>';	

				$.each(data, function (key, val) {
					options += '<option value="' + val.nome + '">' + val.nome + '</option>';
				});					
				$("#estados").html(options);				
				
				$("#estados").change(function () {				
				
					var options_cidades = '<option>Selecione um estado</option>';
					var str = "";					
					
					$("#estados option:selected").each(function () {
						str += $(this).text();
					});
					
					$.each(data, function (key, val) {
						if(val.nome == str) {							
							$.each(val.cidades, function (key_city, val_city) {
								options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
							});							
						}
					});

					$("#cidades").html(options_cidades);
					
				}).change();		
			
			});
		
		});
		
	</script>		