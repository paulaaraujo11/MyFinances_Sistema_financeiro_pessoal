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
		<a href="<?php echo base_url() ?>index.php/movimentacao/create"><input type="button" value="Cadastrar"/></a>
		<div class="container">
			<div class="row">
				<hr>
				<h2>Lista de Movimentações</h2>
				<hr>
				<table class="table table-bordered">

					<thead>
						<tr>
							<th class="text-center"><h5>N° MOVIMENTAÇÃO&nbsp;&nbsp;</h5></th>
							<br>
							<th class="text-center"><h5>CONTA&nbsp;</h5></th>
							<th class="text-center"><h5>DESCRIÇÃO&nbsp;</h5></th>
							<th class="text-center"><h5>TIPO DE MOVIMENTAÇÃO&nbsp;</h5></th>
							<th class="text-center"><h5>VALOR&nbsp;&nbsp;</h5></th>
							<th class="text-center"><h5>DATA DE MOVIMENTAÇÃO&nbsp;</h5></th>
							<th class="text-center"><h5>AÇÕES&nbsp;</h5></th>
						</tr>
					</thead>

					<?php
					 	$contador_mov = 0;
					 	foreach ($movimentacoes as $movimentacao){
					 		echo '<tr>';
					 		echo '<td>'.$movimentacao->id.'</td>';
					 		echo '<td>'.$movimentacao->conta_id.'</td>';
					 		echo '<td>'.$movimentacao->descricao.'</td>';
					 		echo '<td>'.$movimentacao->tdescricao.'</td>';
					 		echo '<td>'.$movimentacao->valor .'</td>';
					 		echo '<td>'.$movimentacao->data_movimentacao.'</td>';
					 		echo '<td><a href="'.base_url().'index.php/movimentacao/update/'.$movimentacao->id.'"><input type="button" value="Atualizar"/></a><a href="'.base_url().'index.php/movimentacao/delete/'.$movimentacao->id.'"><input type="button" value="Excluir"/></a></td>';
					 	$contador_mov++;
					 	}
					?>
				</table>

				<div class="row">
					<div class="col-md-12">
						Total de Contas : <?php echo $contador_mov ?>
					</div>
				</div>
			</div>	
		
	</div>
</body>
</html>