<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Projeto Mensagem</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
	    <ul class="navbar-nav">
	    	
	    		<li class="navbar-text p-2">
		        	Olá, <?php echo $_SESSION['cNome']; ?> 
		      	</li>
		      	<?php if($_SESSION['cNivel'] == 1): ?>
				<li class="nav-item">
		        	<a class="nav-link" href="<?php echo BASE_URL; ?>usuario">Usuários <span class="sr-only">(current)</span></a>
		      	</li>
		        <?php endif; ?>
		      	<li class="nav-item">
		        	<a class="nav-link" href="<?php echo BASE_URL; ?>mensagem">Mensagens</span></a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="<?php echo BASE_URL; ?>login/sair">Sair</a>
		      	</li>
	    	
	    </ul>
	  </div>
	</nav>