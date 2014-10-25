<div class='col-sm-3 col-md-2 sidebar'>
	<?php if ($_SESSION["tipo"] < 4) { ?>
	<ul class='nav nav-sidebar'>
		<?php if ($_SESSION["tipo"] == 1) {?>
		<li class='dropdown'>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Administrador
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
				<li>
					<a href='<?php echo $dir_base ?>layout/usuarios/listar_usuarios_eliminados.php'>
						Eliminado
					</a>
				</li>
			</ul>
		</li>
		<li class='dropdown'>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Vendedor
			</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>layout/vendedor/crear_vendedor.php'>
						Crear
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/vendedor/listar_vendedores.php'>
						Listar
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/vendedor/listar_vendedores_eliminados.php'>
						Eliminado
					</a>
				</li>
			</ul>
		</li>
		<?php } if ($_SESSION["tipo"] < 3) { ?>
		<li class='dropdown'>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Admin. Colegio
			</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>layout/admin/crear_admin.php'>
						Crear
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/admin/listar_admin.php'>
						Listar
					</a>
				</li>
				<?php if ($_SESSION["tipo"] == 1) { ?>
				<li>
					<a href='<?php echo $dir_base ?>layout/admin/listar_admin_eliminados.php'>
						Eliminado
					</a>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } if ($_SESSION["tipo"] == 1 || $_SESSION["tipo"] == 3) { ?>
		<li class='dropdown'>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Profesor
			</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>layout/profesor/crear_profesor.php'>
						Crear
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/profesor/listar_profesores.php'>
						Listar
					</a>
				</li>
				<?php if ($_SESSION["tipo"] == 1) { ?>
				<li>
					<a href='<?php echo $dir_base ?>layout/profesor/listar_profesores_eliminados.php'>
						Eliminado
					</a>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } if ($_SESSION["tipo"] == 1) { ?>
		<li class='dropdown'>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Capacitador
			</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>layout/capacitador/crear_capacitador.php'>
						Crear
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/capacitador/listar_capacitadores.php'>
						Listar
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/capacitador/listar_capacitadores_eliminados.php'>
						Eliminado
					</a>
				</li>
			</ul>
		</li>
		<li>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Productos
			</a>
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
				<li>
					<a href='<?php echo $dir_base ?>layout/producto/listar_productos_eliminados.php'>
						Eliminado
					</a>
				</li>
			</ul>
		</li>
		<?php } ?>
	</ul>
	<?php } ?>
	<ul class='nav nav-sidebar'>
		<?php if ($_SESSION["tipo"] < 3) { ?>
		<li class='dropdown'>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Venta
			</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>layout/venta/crear_venta.php'>
						Nueva
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/venta/listar_ventas.php'>
						Listar
					</a>
				</li>
			</ul>
		</li>
		<?php } if ($_SESSION["tipo"] < 3) {?>
		<li class='dropdown'>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Colegio
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
			if ($_SESSION["tipo"] == 1) { 
		?>
		<?php } 
		if ($_SESSION["tipo"] <=2 ) {
		?>
		<li>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Creditos
			</a>
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
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Evaluación
			</a>
			<ul class='dropdown-menu' role='menu'>
				<?php if ($_SESSION["tipo"] == 1) { ?>
				<li>
					<a href='<?php echo $dir_base ?>/layout/evaluacion/'>
						Subir
					</a>
				</li>
				<?php 
				}
				if ($_SESSION["tipo"] <> 3) {
				?>
				<li>
					<a href='<?php echo $dir_base ?>/layout/evaluacion/'>Profesor
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>/layout/evaluacion/'>
						Alumnos
					</a>
				</li>
				<?php } ?>
				<li>
					<a href='<?php echo $dir_base ?>/layout/evaluacion/'>
						Resultados
					</a>
				</li>
			</ul>
		</li>
		<?php } ?>
		<li>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Documentos
			</a>
			<ul class='dropdown-menu' role='menu'>
				<?php if ($_SESSION["tipo"] == 1) { ?>
				<li>
					<a href='<?php echo $dir_base ?>/layout/documento/crear_documento.php'>
						Crear
					</a>
				</li>
				<?php } ?>
				<li>
					<a href='<?php echo $dir_base ?>/layout/documento/listar_documentos.php'>
						Listar
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>/layout/documento/listar_documentos_eliminados.php'>
						Eliminados
					</a>
				</li>
			</ul>
		</li>
		<?php if ($_SESSION["tipo"] <> 2 && $_SESSION["tipo"] <> 5) { ?>
		<li>
			<a clas='dropdown-toggle' data-toggle='dropdown' href='#'>
				Software
			</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>/layout/descarga/listar_descargas.php'>
						Listar
					</a>
				</li>
			</ul>
		</li>
		<?php } ?>
	</ul>
</div>