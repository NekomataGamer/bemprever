
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="pt-br">
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>Login | SPL Assistência Familiar</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="<?php echo site_url('assets/assetsAlison'); ?>/css/pages/login/classic/login-3.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?php echo site_url('assets/assetsAlison'); ?>/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo site_url('assets/assetsAlison'); ?>/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo site_url('assets/assetsAlison'); ?>/css/style.bundle.css" rel="stylesheet" type="text/css" />
        
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="<?php echo site_url('assets/assetsAlison'); ?>/media/logos/fav-icon.png" />
		<style>
			.text-principal{
				color: #367294!important;
			}
			.text-titulo{
				color: #08b6ce;
			}

			.btn.btn-principal {
				color: #ffffff;
				background-color: #367294;
				border-color: #367294;
				font-weight:800!important;
			}

			.btn.btn-principal:hover:not(.btn-text):not(:disabled):not(.disabled), .btn.btn-principal:focus:not(.btn-text), .btn.btn-principal.focus:not(.btn-text) {
				color: #367294;
				background-color: transparent;
				border-color: #367294;
			}

			.bg-principal{
				background:#8dadbc;
			}

			.bg-principal:focus, .bg-principal:active, .bg-principal:hover{
				background:#8dadbc!important;
			}

			.logo-login{
				max-width:100%;
			}

			.bgi-login{
				background-position:right bottom;
				background-size:contain!important;
			}

			body{
				background:#e2e8f4;
			}

			@media only screen and (max-width:768px){
				.bgi-login{
					background-image:none!important;
				}
			}
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-login bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(<?php echo site_url('assets/imagens/bg-cadastro.png'); ?>);">
					<div class="login-form text-center text-principal p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="<?php echo site_url('assets/imagens/LOGO_SPL_HOR.png'); ?>" class="max-h-100px logo-login" alt="LOGO EMPRESA">
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3 class="text-titulo">Acessar BackOffice</h3>
								<p class="font-weight-bold" style="font-weight:600!important;">Digite seus dados de acesso ao BackOffice:</p>
							</div>
							<!-- id="kt_login_signin_form" -->
							<form class="form" method="POST" action="<?php echo site_url('rede/login/login'); ?>">
								<div class="form-group">
									<input class="form-control h-auto text-white font-weight-bold placeholder-white bg-principal rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="Login" name="usuario" autocomplete="off" />
								</div>
								<div class="form-group">
									<input id="password" class="form-control h-auto text-white font-weight-bold placeholder-white bg-principal rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="Senha" name="senha" />
								</div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
									<div class="checkbox-inline">
										<label class="checkbox checkbox-outline checkbox-blue text-principal m-0" style="font-weight:800!important;">
										<input type="checkbox" name="remember" />
										<span></span>Lembrar</label>
									</div>
									
									<a href="<?php echo site_url('ead/login/esqueci');?>" id="kt_login_forgot" class="text-principal" style="font-weight:800!important;">Esqueceu sua senha?</a>
								</div>
								<div class="form-group text-center mt-10">
                                    <input type="submit" value="Entrar" id="kt_login_signin_submit" class="btn btn-pill btn-principal font-weight-bold opacity-90 px-15 py-3">
									<!-- <button id="kt_login_signin_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Entrar</button> -->
								</div>
							</form>
							<!-- <div class="mt-10">
								<span class="opacity-70 mr-4">Ainda não possui uma conta?</span>
								<a href="javascript:;" id="kt_login_signup" class="text-principal font-weight-bold" style="font-weight:800!important;">Cadastre-se agora</a>
							</div> -->
						</div>
						<!--end::Login Sign in form-->
						<!--begin::Login Sign up form-->
						<div class="login-signup">
							<div class="mb-20">
								<h3>Cadastrar</h3>
								<p class="opacity-60">Insira seus dados para realizar seu cadastro</p>
							</div>
                            <!-- id="kt_login_signup_form" -->
							<form class="form text-center"  method="POST" >
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Nome Completo" name="nome" required autocomplete="off"/>
								</div>
                                <div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="CPF" name="cpf" required autocomplete="off"/>
								</div>
                                <div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Login do Patrocinador" name="login_patrocinador" required autocomplete="off"/>
								</div>
                                <div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="CEP" name="cep" required autocomplete="off" onblur="pesquisacep(this.value);"/>
								</div>


                                <div class="form-group" style="display: none;" id="crua">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Rua" name="rua" id="rua" required autocomplete="off"/>
								</div>
                                <div class="form-group" style="display: none;" id="cbairro">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Bairro" name="bairro" required autocomplete="off" id="bairro"/>
								</div>
                                <div class="form-group" style="display: none;" id="ccidade">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Cidade" name="cidade" id="cidade" required autocomplete="off"/>
								</div>
                                <div class="form-group" style="display: none;" id="cestado">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="UF" name="estado" required autocomplete="off" id="uf" maxlength="2"/>
								</div>
                                <div class="form-group" style="display: none;" id="cnumero">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="numero" name="numero" required autocomplete="off" id="numero"/>
								</div>

                                

                                <div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Seu Login" name="login_pessoal" required autocomplete="off"/>
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="senha" name="password" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Confirm Password" name="cpassword" />
								</div>
								<div class="form-group text-left px-8">
									<div class="checkbox-inline">
										<label class="checkbox checkbox-outline checkbox-white text-white m-0">
										<input type="checkbox" name="agree" />
										<span></span>Eu li e aceito
										<a href="#" class="text-white font-weight-bold ml-1">os termos e condições de uso</a>.</label>
									</div>
									<div class="form-text text-muted text-center"></div>
								</div>
								<div class="form-group">
									<button id="kt_login_signup_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Sign Up</button>
									<button id="kt_login_signup_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign up form-->
						<!--begin::Login forgot password form-->
						<div class="login-forgot">
							<div class="mb-20">
								<h3>Forgotten Password ?</h3>
								<p class="opacity-60">Enter your email to reset your password</p>
							</div>
							<form class="form" id="kt_login_forgot_form">
								<div class="form-group mb-10">
									<input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<button id="kt_login_forgot_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Request</button>
									<button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "<?php echo BASE_URL;?>";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="<?php echo BASE_URL;?>assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo BASE_URL;?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="<?php echo BASE_URL;?>assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="<?php echo BASE_URL;?>assets/js/pages/custom/login/login-general.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
        <!-- Start Busca Cep -->
        <script>
    
            function limpa_formulário_cep() {
                    //Limpa valores do formulário de cep.
                    document.getElementById('rua').value=("");
                    document.getElementById('bairro').value=("");
                    document.getElementById('cidade').value=("");
                    document.getElementById('uf').value=("");
                    // document.getElementById('ibge').value=("");
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('rua').value=(conteudo.logradouro);
                    document.getElementById('bairro').value=(conteudo.bairro);
                    document.getElementById('cidade').value=(conteudo.localidade);
                    document.getElementById('uf').value=(conteudo.uf);
                    // document.getElementById('ibge').value=(conteudo.ibge);
                    console.log(conteudo);
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }
                
            function pesquisacep(valor) {

                //Nova variável "cep" somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('rua').value="...";
                        document.getElementById('bairro').value="...";
                        document.getElementById('cidade').value="...";
                        document.getElementById('uf').value="...";
                        // document.getElementById('ibge').value="...";

                        // crua cbairro ccidade cestado cnumero

                        $('#crua').slideDown();
                        $('#bairro').slideDown();
                        $('#ccidade').slideDown();
                        $('#cestado').slideDown();
                        $('#cnumero').slideDown();
                        $('#numero').focus();

                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            };

            </script>
        <!-- End Busca Cep -->
		<!--end::Page Scripts-->
        
        <?php 
        if ($this->session->flashdata('aviso_tipo')){ ?>
        <script>
            $(document).ready(function () {
            var options = {
                "closeButton" : true,
                "positionClass": "posicao-toast",
                "progressBar" : true,
                "timeOut" : 5000
            }
            <?php if ($this->session->flashdata('aviso_tipo') == 'warning' || $this->session->flashdata('aviso_tipo') == '3' || $this->session->flashdata('aviso_tipo') == 'atencao'){ ?>
                toastr.warning('<?php echo $this->session->flashdata('aviso_msg'); ?>', 'Atenção', options);
            <?php } else if ($this->session->flashdata('aviso_tipo') == 'success' || $this->session->flashdata('aviso_tipo') == '0' || $this->session->flashdata('aviso_tipo') == 'sucesso'){ ?>
                toastr.success('<?php echo $this->session->flashdata('aviso_mensagem'); ?>', 'Sucesso!', options);
            <?php } else if ($this->session->flashdata('aviso_tipo') == 'error' || $this->session->flashdata('aviso_tipo') == '1' || $this->session->flashdata('aviso_tipo') == 'danger'|| $this->session->flashdata('aviso_tipo') == 'erro' || $this->session->flashdata('aviso_tipo') == 'perigo'){ ?>
                toastr.error('<?php echo $this->session->flashdata('aviso_mensagem'); ?>', 'Erro!', options);
            <?php } ?>
            });
        </script>
        <?php } ?>
	</body>
	<!--end::Body-->
</html>