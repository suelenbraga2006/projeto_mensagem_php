<?php echo $this->loadView('menu', $dados = array()); ?>

<div class="container">
	<div class="row p-4 justify-content-center align-items-center">
		<div class="col-xl-8">
			<?php
				if(!empty($msg)){
					echo $msg;
				}
			?>

			<h1>Editar Mensagem</h1>

			<form method="POST">
				<div class="form-group">
					<label for="categoria">Categoria</label>
				    <select class="form-control" name="categoria" id="categoria">
				    	<?php
				    		$c = new Categorias();

				    		$cats = $c->getLista();
				    		foreach ($cats as $cat):
				    		?>
							 	<option value="<?php echo $cat['id']; ?>" <?php echo ($info['id_categoria'] == $cat['id'])?'selected="selected"':''; ?>><?php echo $cat['nome']; ?></option>
				    	<?php endforeach; ?>
				    </select>
				</div>
					
				<div class="form-group">
					<?php 
						    $data = str_replace("/", "-", $info['data_hora']);
							$data_formatada = date('d/m/Y H:m:i', strtotime($data)); 
					?>
					<label for="categoria">Data/Hora</label>
					<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $data_formatada; ?>" disabled>
				</div>

				<div class="form-group">
				    <label for="busuario">Usuário</label>
				    <input type="text" class="form-control" id="usuario" name="busuario" value="<?php echo $info['usuario']; ?>">

				    <div class="list-group" id="resultado"> 
					  
					</div>

					<input type="hidden" name="usuario" value="<?php echo $info['id_usuario']; ?>">
				</div>

				<div class="form-group">
					<label for="mensagem">Mensagem</label>
					<textarea class="form-control" id="mensagem" name="mensagem" rows="3" ><?php echo $info['mensagem']; ?></textarea>
				</div>

				<button type="submit" class="btn btn-primary">Editar</button>
			</form>

		</div>
	</div>
</div>