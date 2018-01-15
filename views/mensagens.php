<?php echo $this->loadView('menu', $dados = array()); ?>

<div class="container">
	<div class="row p-4 justify-content-center align-items-center">
		<div class="col-xl-12">
			
			<h1>Mensagens</h1>

			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Categoria</th>
			      <th scope="col">Mensagem</th>
			      <th scope="col">Data/Hora</th>
			      <?php if($_SESSION['cNivel'] == 1): ?>
			      	<th scope="col">Para</th>
			      	<th scope="col">Ações</th>
			      <?php endif; ?>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach($mensagens as $mensagem): ?>
			    <tr>
			      <th scope="row"><?php echo $mensagem['categoria']; ?></th>
			      <td><?php echo $mensagem['mensagem']; ?></td>
			      <td><?php 
						    $data = str_replace("/", "-", $mensagem['data_hora']);
							$data_formatada = date('d/m/Y H:m:i', strtotime($data));
							echo $data_formatada; 
						?>	
				  </td>
			      <?php if($_SESSION['cNivel'] == 1): ?>

				      <td>
				      	<?php 
				      		if($mensagem['usuario'] == ''){
				      			echo "Todos";
				      		}else{
				      			echo $mensagem['usuario'];
				      		}
				        ?>
				       </td>
				      
				       <td class="justify-content-center">
				      		<a class="btn btn-primary btn-sm" href="<?php echo BASE_URL; ?>mensagem/editar/<?php echo $mensagem['id']; ?>" role="button">Editar</a>
				      		<a class="btn btn-danger btn-sm" href="javascript:;" onclick="excluirMensagem(<?php echo $mensagem['id']; ?>, '<?php echo $mensagem['usuario']; ?>')" role="button">Excluir</a>
				       </td>
			
			      <?php endif; ?>
			    </tr>
			    <?php endforeach; ?>
			  </tbody>
			</table>

			<?php if($_SESSION['cNivel'] == 1): ?>
				<a class="btn btn-primary" href="<?php echo BASE_URL; ?>mensagem/adicionar" role="button">Adicionar Mensagem</a>
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