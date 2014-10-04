<div class="navbar navbar-inverse navbar-fixed-top navbar">
	<div class="container-fluid">
		<div class="navbar-header">
			<button class="navbar-toggle collapsed" data-target=".navbar-collapse" data-toggle="collapse" type="button">
				<span class="sr-only">
					Toggle navigation
				</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<?php
				if ($consulta = $cliente->consulta_usuario_id($_SESSION["id"])) {
					if ($consulta->num_rows > 0) {
						$row = $consulta->fetch_array(MYSQLI_ASSOC);
						echo "Bienvenido " . $row["nombre"] . " " . $row["apellido"] ;
					} 
				}
				?>
				
			</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="<?php echo $dir_base ?>">
						Dashboard
					</a>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						Perfil
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="<?php echo $dir_base ?>layout/perfil/ver_perfil.php">
								Ver
							</a>
						</li>
						<li>
							<a href="<?php echo $dir_base ?>layout/perfil/mod_perfil.php">
								Modificar
							</a>
						</li>
						<li>
							<a href="<?php echo $dir_base ?>layout/perfil/mod_pass.php">
								Cambiar Contraseña
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php echo $dir_base ?>action/logout.php">
						Salir
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>