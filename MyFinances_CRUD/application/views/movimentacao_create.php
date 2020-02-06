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
				<li><a href="<?php echo base_url(); ?>index.php/movimentacao">MOVIMENTAÇÃO</a></li>
			</ul>
			</nav>
		</header>
		
		<br>
		<hr>
		<form method="post" action="<?php echo base_url() ?>index.php/movimentacao/createExe">
			<fieldset id="form_login"><legend>Cadastrar Movimentacao</legend>
			<p><label for="cdescricao">DESCRIÇÃO:<br></label><input type="text" name="tdescricao" id="cdescricao" size="30" maxlength="255"><?php echo form_error('tdescricao'); ?></p>
			<h3><p><label for="cn_conta">CONTA RELACIONADA:<br>
			<select name="tn_conta">
			<?php
				foreach ($idcontas as $c){	?>
			<option value="<?php echo $c['id'] ?>"> <?php echo $c['descricao'] ?></option>
			<?php  }
		?>
			</select></label></p></h3>
			<h3><p><label for="ctipo_mov">TIPO DE MOVIMENTAÇÃO:<br>
			<select name="ttipo_mov">
			<option selected value=1>Receita</option>
			<option value=2>Despesa</option>
			</select></label></p></h3>
			<p><label for="cvalor">VALOR:<br></label><input type="text" name="tvalor" id="cvalor"   size="13" maxlength="13"><?php echo form_error('tvalor');?></p>
			<p><label for="cdata">DATA DE MOVIMENTAÇÃO:<br></label><input type="Date" name="tdata" id="cdata" min="1992-01-03" size="13" maxlength="13"></p>
			<input type="submit" value="Cadastrar"/></a>
			<input type="reset" valeu="Limpar Campos">
			</fieldset></a>
	</div>
</body>
</html>