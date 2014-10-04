<?php
include_once("include/header-cache.php");
require("include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") {
	header ("Location: include/login_session.php");
}
$cliente = new Cliente;
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8">
		<title>A-Magica</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	</head>
	<body>
		<?php
		 include_once("/layout/top-menu.php");
		?>
		<div class="container-fluid">
			<div class="row">
				<?php
				include("/layout/menu.php");
				?>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">
						Dashboard
					</h1>
					<div class="row placeholders">
						<div class="col-xs-6 col-sm-3 placeholder">
							<img class="img-responsive" alt="200x200" data-src="holder.js/200x200/auto/sky" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iIzBEOEZEQiIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjEwMCIgeT0iMTAwIiBzdHlsZT0iZmlsbDojZmZmO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEzcHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MjAweDIwMDwvdGV4dD48L3N2Zz4="></img>
							<h4>
								Label
							</h4>
							<span class="text-muted">
								Something else
							</span>
						</div>
						<div class="col-xs-6 col-sm-3 placeholder">
							<img class="img-responsive" alt="200x200" data-src="holder.js/200x200/auto/vine" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iIzM5REJBQyIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjEwMCIgeT0iMTAwIiBzdHlsZT0iZmlsbDojMUUyOTJDO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEzcHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MjAweDIwMDwvdGV4dD48L3N2Zz4="></img>
							<h4>
								Label
							</h4>
							<span class="text-muted">
								Something else
							</span>
						</div>
						<div class="col-xs-6 col-sm-3 placeholder">
							<img class="img-responsive" alt="200x200" data-src="holder.js/200x200/auto/sky" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iIzBEOEZEQiIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjEwMCIgeT0iMTAwIiBzdHlsZT0iZmlsbDojZmZmO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEzcHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MjAweDIwMDwvdGV4dD48L3N2Zz4="></img>
							<h4>
								Label
							</h4>
							<span class="text-muted">
								Something else
							</span>
						</div>
						<div class="col-xs-6 col-sm-3 placeholder">
							<img class="img-responsive" alt="200x200" data-src="holder.js/200x200/auto/vine" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iIzM5REJBQyIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjEwMCIgeT0iMTAwIiBzdHlsZT0iZmlsbDojMUUyOTJDO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEzcHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MjAweDIwMDwvdGV4dD48L3N2Zz4="></img>
							<h4>
								Label
							</h4>
							<span class="text-muted">
								Something else
							</span>
						</div>
					</div>
					<h2 class="sub-header">
						Section title
					</h2>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Header</th>
									<th>Header</th>
									<th>Header</th>
									<th>Header</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1,001</td>
									<td>Lorem</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,002</td>
									<td>amet</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,003</td>
									<td>Integer</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,004</td>
									<td>libero</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,005</td>
									<td>dapibus</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,006</td>
									<td>Nulla</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,007</td>
									<td>nibh</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,008</td>
									<td>sagittis</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,009</td>
									<td>Fusce</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,010</td>
									<td>augue</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,011</td>
									<td>massa</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,012</td>
									<td>eget</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,013</td>
									<td>taciti</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,014</td>
									<td>torquent</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,015</td>
									<td>per</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>1,016</td>
									<td>sodales</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $dir_base ?>js/bootstrap.js"></script>
	</body>
</html>