<?php include_once(ROOT_PATH . '/assets/includes/rede/header.php'); ?>

<div class="page-section border-bottom-2">
    <div class="container page__container">

        <!-- row -->
        <div class="row elements">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Selecione um estabelecimento da categoria <b><?= $nome; ?></b></h5>
                        <div class="estabelecimentos">
                            <i class="fa fa-spinner fa-spin"></i> Buscando estabelecimentos (isto pode demorar um pouco)...
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
            <div class="col-lg-3 col-md-4 col-12 mb-4" >
                <a href="<?= site_url('rede/descontos/detalhes_estabelecimento') ?>?id=${obj.Codigo}&nome=${obj.Nome}&categoria=<?= $id.'-'.$nome; ?>">
                    <div class="card" style="height:100%;">
                        <div class="card-body">
                            <div class="d-fex flex-column col-12 justify-content-center align-items-center">
                                <div class="imagem" style="width:100%">
                                    <img src="https://www.clubecerto.com.br/images/parceiros/${obj.Marca}" style="width:100%;" />
                                </div>
                                <div class="nome pt-2 text-center" style="width:100%">
                                    <h4 style="color:black!important;">${obj.Nome}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>`;
        return html;
    }
    function showEstabelecimentos(obj) {
        let innerHtml = '<div style="display: flex;flex-wrap: wrap;">';
        document.querySelector('.estabelecimentos').remove();
        obj.forEach((ele) => {
            innerHtml += templateHtml(ele);
        });
        innerHtml += "</div>";
        document.querySelector('.elements').innerHTML += innerHtml;
    }

    window.onload = function() {
        fetch('<?= site_url('rede/descontos/estabelecimentos/'.$id) ?>')
            .then(function(response) {
                return response.json();
            })
            .then(function(json) {
                showEstabelecimentos(json);
            });
    }
</script>