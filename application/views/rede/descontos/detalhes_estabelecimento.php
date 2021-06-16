<?php include_once(ROOT_PATH . '/assets/includes/rede/header.php'); ?>

<div class="page-section border-bottom-2">
    <div class="container page__container">

        <!-- row -->
        <div class="row elements">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Detalhes do estabelecimento <b><?= $nome; ?></b></h5>
                        <small><a href="<?= site_url('rede/descontos/categoria?id='.$id_categoria.'&nome='.$categoria) ?>">Voltar para a listagem da categoria <?= $categoria ?></a></small>
                        <div class="estabelecimentos mt-2">
                            <i class="fa fa-spinner fa-spin"></i> Buscando dados do estabelecimento (isto pode demorar um pouco)...
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
    function templateHtml(obj) {
        console.log(obj)
        let html = `
            <div class="col-12" >
                <div class="card">
                    <div class="card-body">
                        <div class="d-fex flex-column col-12 justify-content-center align-items-center" style="width:150px;max-width:100%;">
                            <div class="imagem">
                                <img src="https://www.clubecerto.com.br/images/parceiros/${obj.Marca}" style="width:100%;" />
                            </div>
                            <div class="nome text-center" style="width:100%">
                                <h4 style="color:black!important;">${obj.Nome}</h4>
                            </div>
                        </div>
                        <hr>
                        <p><b>Categoria: </b> <?= $categoria ?></p>
                        <p><b>Telefone: </b> ${obj.Telefone}</p>
                        <p><b>Whatsapp: </b> ${obj.WhatsApp}</p>
                        <p><b>Regras:</b> <br>${obj.Regras}</p>
                    </div>
                </div>
            </div>`;
        return html;
    }
    function showEstabelecimentos(obj) {
        let innerHtml = '';
        
        obj.forEach((ele) => {
            innerHtml += templateHtml(ele);
        });
        innerHtml += "";
        document.querySelector('.estabelecimentos').innerHTML = innerHtml;
    }

    window.onload = function() {
        fetch('<?= site_url('rede/descontos/detalhes/'.$id) ?>')
            .then(function(response) {
                return response.json();
            })
            .then(function(json) {
                showEstabelecimentos(json)
            });
    }
</script>