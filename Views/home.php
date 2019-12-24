<div class="row">
	<div class="col-md-12">
		<section>
			<h5>Home</h5>
			<div class="row">
				<div class="col-md-5">
					<form method="post">
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input type="text" class="form-control" name="nome" id="nome">
						</div> 
						<div class="form-group">
							<label for="email">E-mail:</label>
							<input type="email" class="form-control" name="email" id="email">
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success">Gravar</button>
						</div>	
					</form>	
				</div>
				<!-- col-md-6 -->
				<div class="col-md-7">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Email</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($usuarios) && !empty($usuarios)): ?>
								<?php foreach($usuarios as $lista): ?>
							<tr>
								<td><?php echo $lista->nome;?></td>
								<td><?php echo $lista->email;?></td>
								<td>
									<a class="btn btn-primary" href="<?php echo BASE_URL;?>edit/?id=<?php echo $lista->id;?>">Editar</a>
									<a class="btn btn-danger" href="<?php echo BASE_URL;?>delete/?id=<?php echo $lista->id;?>">Excluir</a>
								</td>
							</tr>
								<?php endforeach; ?>
							<?php endif; ?>	
						</tbody>
					</table>	
				</div>	
			</div>
		</section>
	</div>
</div>