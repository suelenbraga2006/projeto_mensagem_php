<?php echo $this->loadView('menu', $dados = array()); ?>

<div class="container">
	<div class="row p-4 justify-content-center align-items-center">
		<div class="col-xl-12">
			
			<h1>Usuários</h1>

			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Nome</th>
			      <th scope="col">Email</th>
			      <th scope="col">Nível</th>
			      <th scope="col">Ações</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach($usuarios as $usuario): ?>
			    <tr>
			      <th scope="row"><?php echo $usuario['nome']; ?></th>
			      <td><?php echo $usuario['email']; ?></td>
			      <td>
				      	<?php 
				      		if($usuario['nivel'] == 0){
				      			echo "Comum";
				      		}else{
				      			echo "Administrador";
				      		}
				        ?>
				  </td>
			      <td class="justify-content-center">
				    <a class="btn btn-primary btn-sm" href="<?php echo BASE_URL; ?>usuario/editar/<?php echo $usuario['id']; ?>" role="button">Editar</a>
				    <a class="btn btn-danger btn-sm" href="javascript:;" onclick="excluirUsuario(<?php echo $usuario['id']; ?>, '<?php echo $usuario['nome']; ?>')" role="button">Excluir</a>
				  </td>
			    </tr>
			    <?php endforeach; ?>
			  </tbody>
			</table>

			<?php if($_SESSION['cNivel'] == 1): ?>
				<a class="btn btn-primary" href="<?php echo BASE_URL; ?>usuario/adicionar" role="button">Adicionar Usuário</a>
			<?php endif; ?>

		</div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        
		      </div>
		      <div class="modal-footer">
		        
		      </div>
		    </div>
		  </div>
		</div>

	</div>
</div>