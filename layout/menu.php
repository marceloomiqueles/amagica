<div class='col-sm-3 col-md-2 sidebar'>
	<ul class='nav nav-sidebar'>
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
			</ul>
		</li>
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
		<?php if ($_SESSION["tipo"] == 1) { ?>
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
		<li>
			<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Creditos</a>
			<ul class='dropdown-menu' role='menu'>
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
			</ul>
		</li>
		<?php } ?>
	</ul>
	<ul class='nav nav-sidebar'>
		<li>
			<a href='#'>Nav item</a>
		</li>
		<li>
			<a href='#'>Nav item again</a>
		</li>
		<li>
			<a href='#'>One more nav</a>
		</li>
		<li>
			<a href='#'>Another nav item</a>
		</li>
		<li>
			<a href='#'>More navigation</a>
		</li>
	</ul>
	<ul class='nav nav-sidebar'>
		<li>
			<a href='#'>Nav item again</a>
		</li>
		<li>
			<a href='#'>One more nav</a>
		</li>
		<li>
			<a href='#'>Another nav item</a>
		</li>
	</ul>
</div>