<div class="row">
	<div class="col-md-12">
		<section>
			<h5>Editar Usuário</h5>
			<div class="row">
				<div class="col-md-5">
					<form method="post">
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input type="hidden" value="<?php echo $usuario->id;?>" name="id_usuario">
							<input type="text" class="form-control" name="nome" id="nome" value="<?php echo $usuario->nome;?>">
						</div> 
						<div class="form-group">
							<label for="email">E-mail:</label>
							<input type="email" class="form-control" name="email" id="email" value="<?php echo $usuario->email;?>">
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Gravar</button>
						</div>	
					</form>	
				</div>
			</div>
		</section>
	</div>
</div>				