<?php echo $this->loadView('menulogin', $dados = array()); ?>

<div class="container" id="login">
	<div class="row p-4 justify-content-center align-items-center">
		<div class="col-xl-4">
			<?php
				if(!empty($msg)){
					echo $msg;
				}
			?>

			<div class="card">
		  		<div class="card-body">

					<form method="POST">
					  <div class="form-group">
					    <label for="email">Email</label>
					    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
					  </div>
					  <div class="form-group">
					    <label for="senha">Senha</label>
					    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
					  </div>
					  <button type="submit" class="btn btn-primary">Entrar</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>