<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>My Finances</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>css/estilo.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>css/form.css"/>
</head>
<body>
	<div id="interface">
		<header id= "cabecalho">	
			<h1><center>My Finances</center></h1>
			<h2><center>Suas finanças pessoais onde quiser!</center></h2>
			<nav id="menu">
			<ul>	
				<li><a href="<?php echo base_url(); ?>index.php/welcome">HOME</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/contas">CONTAS</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/contas">MOVIMENTAÇÃO</a></li>
			</ul>
			</nav>
		</header>
		
		<br>
		<hr>
		<form method="post" action="<?php echo base_url() ?>index.php/contas/read">
			<fieldset id="form_login"><legend>Menu de Conta</legend>
			<p><label for="cn_conta">N° DA CONTA:</label><input type="text" name="tn_conta" id="cn_conta" size="10" maxlength="10"></p><br>
			<p><label for="cdescricao">DESCRIÇÃO:<br></label><input type="text" name="tdescricao" id="cdescricao" size="30" maxlength="255"></p>
			<p><label for="csaldo_i">SALDO INICIAL:<br></label><input type="text" name="tsaldo_i" id="csaldo_i" size="13" maxlength="13"></p>
			<input type=hidden name="tvisivel" value="1">
			<a href="<?php echo base_url() ?>/index.php/contas/create/"><input type="button" value="Cadastrar"/></a>
			<a href="<?php echo base_url() ?>/index.php/contas/read/"><input type="submit" value="Buscar"/></a>
			<a href="<?php echo base_url() ?>/index.php/contas/update/"><input type="button" value="Atualizar"/></a>
			<a href="<?php echo base_url() ?>/index.php/contas/delete/"><input type="button" value="Apagar"/><h3>ou</h3><input type="reset" valeu="Limpar Campos">
			</fieldset></a>
	</div>
</body>
</html>