<div class='col-sm-3 col-md-2 sidebar'>
	<ul class='nav nav-sidebar'>
		<?php if ($_SESSION["tipo"] < 4) {?>
		<li class='dropdown'>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Usuarios
			</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>layout/usuarios/crear_usuario.php'>
						Crear
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/usuarios/listar_usuarios.php'>
						Listar
					</a>
				</li>
				<?php if ($_SESSION["tipo"] == 1) { ?>
				<li>
					<a href='<?php echo $dir_base ?>layout/usuarios/listar_usuarios_eliminados.php'>
						Eliminado
					</a>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php if ($_SESSION["tipo"] < 3) {?>
		<li class='dropdown'>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Colegios
			</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>layout/colegio/crear_colegio.php'>
						Crear
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/colegio/listar_colegios.php'>
						Listar
					</a>
				</li>
			</ul>
		</li>
		<?php 	
				} 
			} 
			if ($_SESSION["tipo"] == 1) { 
		?>
		<li>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Productos</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>layout/producto/crear_producto.php'>
						Crear
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/producto/listar_productos.php'>
						Listar
					</a>
				</li>
			</ul>
		</li>
		<?php } 
		if ($_SESSION["tipo"] <=2 ) {
		?>
		<li>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Creditos</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>layout/credito/comprar_credito.php'>
						Comprar
					</a>
				</li>
				<?php if ($_SESSION["tipo"] == 1) { ?>
				<li>
					<a href='<?php echo $dir_base ?>layout/credito/manejar_credito.php'>
						Solicitudes
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/credito/manejar_credito.php'>
						Manejar
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/credito/historial_full_credito.php'>
						Historial Full
					</a>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } ?>
	</ul>
	<ul class='nav nav-sidebar'>
		<?php if ($_SESSION["tipo"] <> 2) { ?>
		<li>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Evaluación</a>
			<ul class='dropdown-menu' role='menu'>
				<?php if ($_SESSION["tipo"] == 1) { ?>
				<li>
					<a href='<?php echo $dir_base ?>/layout/evaluacion/'>Subir</a>
				</li>
				<?php 
				}
				if ($_SESSION["tipo"] <> 3) {
				?>
				<li>
					<a href='<?php echo $dir_base ?>/layout/evaluacion/'>Profesor</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>/layout/evaluacion/'>Alumnos</a>
				</li>
				<?php } ?>
				<li>
					<a href='<?php echo $dir_base ?>/layout/evaluacion/'>Resultados</a>
				</li>
			</ul>
		</li>
		<?php } ?>
		<li>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Documentos</a>
			<ul class='dropdown-menu' role='menu'>
				<?php if ($_SESSION["tipo"] == 1) { ?>
				<li>
					<a href='<?php echo $dir_base ?>/layout/documento/'>Subir</a>
				</li>
				<?php } ?>
				<li>
					<a href='<?php echo $dir_base ?>/layout/documento/'>Listar</a>
				</li>
			</ul>
		</li>
		<?php if ($_SESSION["tipo"] <> 2) { ?>
		<li>
			<a clas='dropdown-toggle' data-toggle='dropdown' href='#'>Juego</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>/layout/juego/'>Listar</a>
				</li>
				<?php if ($_SESSION["tipo"] == 1) { ?>
				<li>
					<a href='<?php echo $dir_base ?>/layout/juego/'>Subir</a>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } ?>
	</ul>
</div>