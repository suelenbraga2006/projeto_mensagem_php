<?php echo $this->loadView('menu', $dados = array()); ?>

<div class="container">
	<div class="row p-4 justify-content-center align-items-center">
		<div class="col-xl-8">
			<?php
				if(!empty($msg)){
					echo $msg;
				}
			?>

			<h1>Editar Usuário</h1>

			<form method="POST">
				<div class="form-group">
					<label for="nome">Nome</label>
						<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $info['nome']; ?>">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $info['email']; ?>">
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" id="senha" name="senha" value="<?php echo $info['senha']; ?>">
				</div>
				<div class="form-group">
					<label for="admin">Administrador <a href="#" class="btn-color" data-toggle="tooltip" title="Escolha Sim para dar acesso de administrador."><i class="fas fa-question-circle"></i></a></label>
				    <select class="form-control" id="nivel" name="nivel">
				      <option value="0" <?php echo ($info['nivel'] == '0')?'selected="selected"':''; ?>>Não</option>
		      		  <option value="1" <?php echo ($info['nivel'] == '1')?'selected="selected"':''; ?>>Sim</option>
				    </select>
				</div>

				<button type="submit" class="btn btn-primary">Editar</button>
			</form>

		</div>
	</div>
</div>