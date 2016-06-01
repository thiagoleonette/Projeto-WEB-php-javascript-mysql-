<!--
	Author: Thiago Leonette
	Date: 29/05/2016
	Last modified : 31/05/2016
	Site html utilizando javascript com biblioteca jquery para validação de campos. Utilização de php em back-end com persistecncia em banco mysql.
	Template utlizado do site: http://www.website-templates.info/homepage/free-templates/20/1/index.html
-->
<!doctype html>
<html>
<head>
	<title>Meu site</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style.css" type="text/css">
	<script language="JavaScript" src="js/jquery.js" type="text/javascript"></script>
	<script language="JavaScript" src="js/jquery.validate.js" type="text/javascript"></script>

<!--
	JavaScript - usando jquery para validar os campos a serem persistidos no banco.
-->	
<script type="text/javascript">
    $(document).ready(function(){
        $("#form_mercadoria").validate({
            rules: {
                codMercadoria: {
                    required: true,
                    minlength: 3
                },
                tipoMercadoria: {
                    required: true
                },
                nomeMercadoria: {
                    required: true
                },
				qteMercadoria: {
					required: true
				},
				precoMercadoria: {
					required: true
				},
				tipoNegocio: {
					required: true
				}
                
            },
            messages: {
                codMercadoria: {
                    required: "O campo codigo da Mercadoria é obrigatório",
                    minlength: "O campo codigo da Mercadoria deve conter no mínimo 3 caracteres"
                },
                tipoMercadoria: {
                    required: "O campo Tipo da Mercadoria é obrigatório"
                },
                nomeMercadoria: {
                    required: "O campo Nome da Mercadoria é obrigatório"
                },
				qteMercadoria: {
					required: "O campo quantidade é obrigatório"
				},
				precoMercadoria: {
					required: "O campo preço é obrigatório"
				},
				tipoNegocio: {
					required: "O campo tipo do negocio é obrigatório"	
				}
                
            }
 
        });
    });
</script>
<style type="text/css">
* {
	font-family: Verdana;
	font-size: 96%;
}
label {
	display: block;
	margin-top: 10px;
}
label.error {
	float: none;
	color: red;
	margin: 0 .5em 0 0;
	vertical-align: top;
	font-size: 10px
}
p {
	clear: both;
}
.submit {
	margin-top: 1em;
}
em {
	font-weight: bold;
	padding-right: 1em;
	vertical-align: top;
}
</style>
</head>
<body>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="950">
   <tr>
     <td  colspan="4" height="20px">&nbsp;</td>
   </tr>
   <tr>
   <td width="20px">&nbsp;</td>
      <td class="oben" colspan="2">
        <div class="logo"><img src="image/images.jpg" width="180" height="130" border="0" alt=""></div><div id="textobengross">Plataforma de Negociação de Mercadorias</div>
        <div id="textobenklein">Soluções para sua empresa</div></td>
      <td width="20px">&nbsp;</td>
   </tr>
   
    <tr>
      <td width="20px">&nbsp;</td>
      <td class="zwischen" colspan="2">&nbsp;</td>
      <td width="20px">&nbsp;</td>
    </tr>
   <tr> <td width="20px">&nbsp;</td>
     <td valign="top" class="links"><div class="naviueberschrift">Title 1</div>
        <div class="zwischen2">&nbsp;</div>
        <ul class="menue">
          <li><a title="Home" href="index.html">&raquo; Home</a></li>
          <li><a title="Compra ou Venda" href="negocio.php">&raquo; Compra ou Venda</a></li>
          <li><a title="Lista de Operações" href="historico.php">&raquo; Lista de Operações</a></li>
        </ul>
      </td>
      <td class="hauptfenster" valign="top"><div class="haupttext">
        	<h1>Inserção da Negociação</h1>

				 <form id="form_mercadoria" onSubmit="return validar(this);" action="" method="post" align="center">

					 <label class="alinhar">Codigo: </label><input type="text" name="codMercadoria" id="codMercadoria"><br>
					 <label class="alinhar">Tipo: </label><input type="text" name="tipoMercadoria" id="tipoMercadoria"><br>
					 <label class="alinhar">Nome: </label><input type="text" name="nomeMercadoria" id="nomeMercadoria"><br>
					 <label class="alinhar">Quantidade: </label><input type="text" name="qteMercadoria" id="qteMercadoria"><br>
					 <label class="alinhar">Preco: </label><input type="text" name="precoMercadoria" id="precoMercadoria"><br>
					 <label class="alinhar">Compra ou Venda: </label><input type="text" name="tipoNegocio" id="tipoNegocio"><br>

					 <input type="submit" value="gravar" name="gravar">
				
				 </form>
				 
				 <?php
						// Informações necessárias para conectar-se ao banco
						$servidor = 'localhost';
					    $usuario = 'root';
						$senha = '';
						$banco = 'web_mercadoria';

						// Conexão ao banco de dados MySQL
						$conexao = new mysqli($servidor, $usuario, $senha, $banco); 
						
						// Caso algo tenha dado errado, exibe uma mensagem de erro
						if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
						
						// Prepare Statement - Insert
						
						$sql = "insert into mercadoria values(?, ?, ?, ?, ?, ?)";
						$stmt = $conexao->prepare($sql);
						$stmt->bind_param('issids', $codMercadoria, $tipoMercadoria, $nomeMercadoria, $qteMercadoria, $precoMercadoria, $tipoNegocio);
						
						// Recebendo através do método POST os valores informados em cada campo
						$codMercadoria = empty($_POST['codMercadoria']) ? null : $_POST['codMercadoria'];
						$tipoMercadoria = empty($_POST['tipoMercadoria'])? null : $_POST['tipoMercadoria'];
						$nomeMercadoria = empty($_POST['nomeMercadoria'])? null : $_POST['nomeMercadoria'];
						$qteMercadoria = empty($_POST['qteMercadoria'])? null : $_POST['qteMercadoria'];
						$precoMercadoria = empty($_POST['precoMercadoria'])? null : $_POST['precoMercadoria'];
						$tipoNegocio = empty($_POST['tipoNegocio'])? null : $_POST['tipoNegocio'];
						
						
						$stmt->execute();
							 
						$stmt->close();
							 
					?>


        <td width="20px">&nbsp;</td>
   </tr>
   <tr>
     <td  colspan="4" height="20px">&nbsp;</td>
   </tr>
</table>
