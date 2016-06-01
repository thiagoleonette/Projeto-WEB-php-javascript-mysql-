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
        	<h1>Listar todas as operações realizadas</h1>
					<?php

						// Informações necessárias para conectar-se ao banco
						$servidor = 'localhost';
					    $usuario = 'root';
						$senha = '';
						$banco = 'web_mercadoria';

						// Conexão ao banco de dados MySQL
						$conexao = new mysqli($servidor, $usuario, $senha, $banco);
						 //$query = "Select * from mercadoria" or die("Error in the consult.." . mysqli_error($link));  

						// Caso algo tenha dado errado, exibe uma mensagem de erro
						if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

						// Query para consulta de todas as operações
						$sql = "SELECT * FROM mercadoria";
						$query = $conexao->query($sql);
						
						// Exibindo os dados 
						while ($dados = $query->fetch_array()) {
 						echo 'Codigo: ' . $dados['codMercadoria'] . ' - ' . 'Tipo: ' . $dados['tipoMercadoria'] . ' - ' . 
						'Nome: ' . $dados['nomeMercadoria'] . ' - ' . 'Quantidade: ' . $dados['qteMercadoria'] . ' - ' . 
						'Preço: ' . $dados['precoMercadoria'] . ' - ' . 'Tipo do negocio: ' . $dados['tipoNegocio'];
						echo "<br>" . "<br>";
						}
						
	
						// Exibir quantas operações existem ao todo	
						echo 'Operações encontradas: ' . $query->num_rows;
					
					
					?>

        <td width="20px">&nbsp;</td>
   </tr>
   <tr>
     <td  colspan="4" height="20px">&nbsp;</td>
   </tr>
</table>
