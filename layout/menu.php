<div class='col-sm-3 col-md-2 sidebar'>
	<?php if ($_SESSION["tipo"] == 1) { ?>
	<ul class='nav nav-sidebar list-group-item-success'>
		<li class='dropdown list-group-item-success'>
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
	</ul>
	<?php } 
	if ($_SESSION["tipo"] < 4) {
	?>
	<ul class='nav nav-sidebar list-group-item-info'>
		<?php if ($_SESSION["tipo"] < 3) { ?>
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
		<?php } ?>
		<li class='dropdown'>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Responsable Colegio
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
		<?php if ($_SESSION["tipo"] <> 2) { ?>
		<li class='dropdown'>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Docente
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
		<?php } ?>
	</ul>
	<?php if ($_SESSION["tipo"] < 3) { ?>
	<ul class='nav nav-sidebar list-group-item-warning'>
		<?php if ($_SESSION["tipo"] == 1) { ?>
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
		<?php if ($_SESSION["tipo"] == 15) { ?>
		<li>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Creditos
			</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>layout/credito/manejar_credito.php'>
						Manejar
					</a>
				</li>
			</ul>
		</li>
		<?php } ?>
	</ul>
	<?php } } 
	if ($_SESSION["tipo"] <> 2) {
	?>
	<ul class='nav nav-sidebar list-group-item-danger'>
		<?php if ($_SESSION["tipo"] <> 5) { ?>
		<li>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Evaluación
			</a>
			<ul class='dropdown-menu' role='menu'>
				<?php if ($_SESSION["tipo"] == 1) { ?>
				<li>
					<a href='<?php echo $dir_base ?>layout/evaluacion/crear_evaluacion.php'>
						Crear
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/evaluacion/listar_evaluaciones.php'>
						Listar
					</a>
				</li>
				<? } 
				if ($_SESSION["tipo"] <> 3 && $_SESSION["tipo"] <> 1) {
				?>
				<li>
					<a href='<?php echo $dir_base ?>layout/evaluacion/evaluacion_profesor.php'>
						Evaluación Docente Inicial
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/evaluacion/evaluacion_profesor_final.php'>
						Evaluación Docente Final
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/evaluacion/evaluacion_alumno.php'>
						Evaluación Estudiante Inicial
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/evaluacion/evaluacion_alumno_final.php'>
						Evaluación Estudiante Final
					</a>
				</li>
				<?php } ?>
				<li>
					<a href='<?php echo $dir_base ?>layout/evaluacion/evaluacion_resultado.php'>
						Resultados
					</a>
				</li>
			</ul>
		</li>
		<? } ?>
		<li>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				Documentos
			</a>
			<ul class='dropdown-menu' role='menu'>
				<li>
					<a href='<?php echo $dir_base ?>layout/documento/listar_documentos.php'>
						Listar
					</a>
				</li>
				<?php if ($_SESSION["tipo"] == 1) { ?>
				<li>
					<a href='<?php echo $dir_base ?>layout/documento/crear_documento.php'>
						Crear
					</a>
				</li>
				<li>
					<a href='<?php echo $dir_base ?>layout/documento/listar_documentos_eliminados.php'>
						Eliminados
					</a>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php if ($_SESSION["tipo"] <> 5) { ?>
		<li>
			<a clas='dropdown-toggle' data-toggle='dropdown' href='#'>
				Software
			</a>
			<ul class='dropdown-menu' role='menu'>
				<?php if ($_SESSION["tipo"] <> 3) { ?>
				<li>
					<a href='<?php echo $dir_base ?>layout/descarga/listar_descargas.php'>
						Descarga
					</a>
				</li>
				<?php } if ($_SESSION["tipo"] == 3) { ?>
				<li>
					<a href='<?php echo $dir_base ?>layout/descarga/listar_compras.php'>
						Comprado
					</a>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } ?>
	</ul>
	<?php } ?>
</div>