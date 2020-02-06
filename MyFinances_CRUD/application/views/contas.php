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
		<a href="<?php echo base_url() ?>index.php/contas/create"><input type="button" value="Cadastrar"/></a>
		<div class="container">
			<div class="row">
				<hr>
				<h2>Lista de Contas</h2>
				<hr>
				<table class="table table-bordered">

					<thead>
						<tr>
							<th class="text-center">N° Conta</th>
							<th class="text-center">Descrição</th>
							<th class="text-center">Saldo Inicial</th>
							<th class="text-center">Ações</th>
						</tr>
					</thead>

					<?php
					 	$contador = 0;
					 	foreach ($contas as $conta){
					 		echo '<tr>';
					 		echo '<td>'.$conta->id.'</td>';
					 		echo '<td>'.$conta->descricao.'</td>';
					 		echo '<td>'.$conta->saldo_inicial.'</td>';
					 		echo '<td><a href="'.base_url().'index.php/contas/update/'.$conta->id.'"><input type="button" value="Atualizar"/></a><a href="'.base_url().'index.php/contas/delete/'.$conta->id.'"><input type="button" value="Excluir"/></a><a href="'.base_url().'index.php/contas/pdf/'.$conta->id.'"><input type="button" value="Gerar Relatório"/></a></td>';
					 	$contador++;
					 	}
					?>
				</table>

				<div class="row">
					<div class="col-md-12">
						Total de Contas : <?php echo $contador ?>
					</div>
				</div>
			</div>	
		
	</div>
</body>
</html>