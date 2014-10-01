<?php
include("include/header-cache.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>A-Magica</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	</head>
	<body>
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
						Admin AMagica
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">
								Dashboard
							</a>
						</li>
						<li>
							<a href="#">
								Settings
							</a>
						</li>
						<li>
							<a href="#">
								Profile
							</a>
						</li>
						<li>
							<a href="#">
								Help
							</a>
						</li>
					</ul>
					<form class="navbar-form navbar-right">
						<input class="form-control" type="text" placeholder="Serach..."></input>
					</form>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<li class="active">
							<a href="#">Overview</a>
						</li>
						<li>
							<a href="#">Reports</a>
						</li>
						<li>
							<a href="#">Analytics</a>
						</li>
						<li>
							<a href="#">Export</a>
						</li>
					</ul>
					<ul class="nav nav-sidebar">
						<li>
							<a href="#">Nav item</a>
						</li>
						<li>
							<a href="#">Nav item again</a>
						</li>
						<li>
							<a href="#">One more nav</a>
						</li>
						<li>
							<a href="#">Another nav item</a>
						</li>
						<li>
							<a href="#">More navigation</a>
						</li>
					</ul>
					<ul class="nav nav-sidebar">
						<li>
							<a href="#">Nav item again</a>
						</li>
						<li>
							<a href="#">One more nav</a>
						</li>
						<li>
							<a href="#">Another nav item</a>
						</li>
					</ul>
				</div>
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
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
</html>