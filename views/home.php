<?php echo $this->loadView('menu', $dados = array()); ?>

<div class="container-fluid">
	<div class="jumbotron m-4">
		<h2 class="display-4">Projeto de Mansagens</h2>
		<p class="lead">Um projeto de mensagem para usuários específicos ou todos os usuários cadastrados.</p>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="homeModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensagens</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-xl-12">
      			<div id="accordion" role="tablist" aria-multiselectable="true">

					  <?php foreach($categorias as $categoria): ?>

					  <div class="card">

					    <div class="card-header" role="tab" id="heading<?php echo $categoria['id']; ?>">
					      <h5 class="mb-0">
					        <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $categoria['nome']; ?>" aria-expanded="true" aria-controls="collapseOne">
					          <?php echo $categoria['nome']; ?>
					        </a>
					      </h5>
					    </div>
						<?php

							$id = $_SESSION['cLogin'];
        					$id_categoria = $categoria['id'];

        					$m = new Mensagens();

        					$mensagens = $m->getMensagensHome($id, $id_categoria);

        				?>

						<div id="<?php echo $categoria['nome']; ?>" class="collapse" role="tabpane<?php echo $categoria['id']; ?>" aria-labelledby="heading<?php echo $categoria['id']; ?>" aria-expanded="true">
						    <div class="card-block">
						    	<?php 
						    		foreach($mensagens as $mensagem): 
						    	?>
						    		<small class="text-muted">
						    			<?php 
						    				$data = str_replace("/", "-", $mensagem['data_hora']);
											$data_formatada = date('d/m/Y H:m:i', strtotime($data));
											echo $data_formatada; 
										?>	
									</small>
						    		<p class="card-text"><?php echo $mensagem['mensagem']; ?></p>
						    		<hr>
						        <?php endforeach; ?>
						    </div>
						</div>

					  </div> <!-- Fim card -->

					<?php endforeach; ?>
					  
				</div>

      		</div>
      	</div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>