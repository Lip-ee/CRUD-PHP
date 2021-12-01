<?php
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2> <img src="https://cdn-icons-png.flaticon.com/512/3884/3884583.png" width="50"> Clientes</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Cliente</a>
	    	<a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th> <img src="https://cdn-icons-png.flaticon.com/512/3884/3884564.png" width="20"> ID</th>
		<th width="30%"> <img src="https://cdn-icons-png.flaticon.com/512/3884/3884599.png" width="20"> Nome</th>
		<th> <img src="https://cdn-icons-png.flaticon.com/512/3884/3884496.png" width="20"> CPF/CNPJ</th>
		<th> <img src="https://cdn-icons-png.flaticon.com/512/3884/3884261.png" width="20"> Telefone</th>
		<th> <img src="https://cdn-icons-png.flaticon.com/512/3884/3884574.png" width="20"> Atualizado em</th>
		<th> <img src="https://cdn-icons-png.flaticon.com/512/3884/3884429.png" width="20"> Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($customers) : ?>
<?php foreach ($customers as $customer) : ?>
	<tr>
		<td><?php echo $customer['id']; ?></td>
		<td><?php echo $customer['name']; ?></td>
		<td><?php echo $customer['cpf_cnpj']; ?></td>
		<td><?php echo $customer['mobile']; ?></td>
		<td><?php echo date('d/m/Y', strtotime($customer['modified'])); ?></td>
		
        <td class="actions text-right">
			<a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="delete.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">
                <i class="fa fa-trash"></i> Excluir
            </a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include('modal.php'); ?>

<?php include(FOOTER_TEMPLATE); ?>
