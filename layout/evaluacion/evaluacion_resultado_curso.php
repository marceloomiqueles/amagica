<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$res = $cliente->consulta_alumnos_de_evaluacion($_GET["eval"]);
$i = 0;
$d1 = 0; // Dimension 1 - Identidad (Cuenta Respuestas)
$d2 = 0; // Dimension 2 - Autoestima (Cuenta Respuestas)
$d3 = 0; // Dimension 3 - Valores (Cuenta Respuestas)
$d4 = 0; // Dimension 4 - Manejo de Conflictos (Cuenta Respuestas)
$d5 = 0; // Dimension 5 - Cooperacion y Pertenencia (Cuenta Respuestas)
$d6 = 0; // Dimension 6 - Proteccion y Cuidados (Cuenta Respuestas)
$d7 = 0; // Dimension 7 - Manejo de la Convivencia (Cuenta Respuestas)

$NC_1 = 0; // CANTIDAD ALUMNOS <> null Identidad (Nulo)
$NC_2 = 0; // CANTIDAD ALUMNOS <> null Autoestima (Nulo)
$NC_3 = 0; // CANTIDAD ALUMNOS <> null Valores (Nulo)
$NC_4 = 0; // CANTIDAD ALUMNOS <> null Manejo de Conflictos (Nulo)
$NC_5 = 0; // CANTIDAD ALUMNOS <> null Cooperacion y Pertenencia (Nulo)
$NC_6 = 0; // CANTIDAD ALUMNOS <> null Proteccion y Cuidados (Nulo)
$NC_7 = 0; // CANTIDAD ALUMNOS <> null Manejo de la Convivencia (Nulo)

$CA_1 = 0; // CANTIDAD ALUMNOS <= 1 Identidad (Preocupante)
$CA_2 = 0; // CANTIDAD ALUMNOS <= 1 Autoestima (Preocupante)
$CA_3 = 0; // CANTIDAD ALUMNOS <= 1 Valores (Preocupante)
$CA_4 = 0; // CANTIDAD ALUMNOS <= 1 Manejo de Conflictos (Preocupante)
$CA_5 = 0; // CANTIDAD ALUMNOS <= 1 Cooperacion y Pertenencia (Preocupante)
$CA_6 = 0; // CANTIDAD ALUMNOS <= 1 Proteccion y Cuidados (Preocupante)
$CA_7 = 0; // CANTIDAD ALUMNOS <= 1 Manejo de la Convivencia (Preocupante)

$CN_1 = 0; //  Respuesta No en Pregunta 1 (P1 = 0)
$CN_2 = 0; //  Respuesta No en Pregunta 2 (P2 = 0)
$CN_3 = 0; //  Respuesta No en Pregunta 3 (P3 = 0)
$CN_4 = 0; //  Respuesta No en Pregunta 4 (P4 = 0)
$CN_5 = 0; //  Respuesta No en Pregunta 5 (P5 = 0)
$CN_6 = 0; //  Respuesta No en Pregunta 6 (P6 = 0)
$CN_7 = 0; //  Respuesta No en Pregunta 7 (P7 = 0)
$CN_8 = 0; //  Respuesta No en Pregunta 8 (P8 = 0)
$CN_9 = 0; //  Respuesta No en Pregunta 9 (P9 = 0)
$CN_10 = 0; // Respuesta No en Pregunta 10 (P10 = 0)
$CN_11 = 0; // Respuesta No en Pregunta 11 (P11 = 0)
$CN_12 = 0; // Respuesta No en Pregunta 12 (P12 = 0)
$CN_13 = 0; // Respuesta No en Pregunta 13 (P13 = 0)
$CN_14 = 0; // Respuesta No en Pregunta 14 (P14 = 0)
$CN_15 = 0; // Respuesta No en Pregunta 15 (P15 = 0)
$CN_16 = 0; // Respuesta No en Pregunta 16 (P16 = 0)
$CN_17 = 0; // Respuesta No en Pregunta 17 (P17 = 0)
$CN_18 = 0; // Respuesta No en Pregunta 18 (P18 = 0)
$CN_19 = 0; // Respuesta No en Pregunta 19 (P19 = 0)
$CN_20 = 0; // Respuesta No en Pregunta 20 (P20 = 0)
$CN_21 = 0; // Respuesta No en Pregunta 21 (P21 = 0)

$CS_1 = 0; // CANTIDAD ALUMNOS Identidad
$CS_2 = 0; // CANTIDAD ALUMNOS Autoestima
$CS_3 = 0; // CANTIDAD ALUMNOS Valores
$CS_4 = 0; // CANTIDAD ALUMNOS Manejo de Conflictos
$CS_5 = 0; // CANTIDAD ALUMNOS Cooperacion y Pertenencia
$CS_6 = 0; // CANTIDAD ALUMNOS Proteccion y Cuidados
$CS_7 = 0; // CANTIDAD ALUMNOS Manejo de la Convivencia

$CS_1 = 0; //  Respuesta Si en Pregunta 1 (P1 = 1)
$CS_2 = 0; //  Respuesta Si en Pregunta 2 (P2 = 1)
$CS_3 = 0; //  Respuesta Si en Pregunta 3 (P3 = 1)
$CS_4 = 0; //  Respuesta Si en Pregunta 4 (P4 = 1)
$CS_5 = 0; //  Respuesta Si en Pregunta 5 (P5 = 1)
$CS_6 = 0; //  Respuesta Si en Pregunta 6 (P6 = 1)
$CS_7 = 0; //  Respuesta Si en Pregunta 7 (P7 = 1)
$CS_8 = 0; //  Respuesta Si en Pregunta 8 (P8 = 1)
$CS_9 = 0; //  Respuesta Si en Pregunta 9 (P9 = 1)
$CS_10 = 0; // Respuesta Si en Pregunta 10 (P10 = 1)
$CS_11 = 0; // Respuesta Si en Pregunta 11 (P11 = 1)
$CS_12 = 0; // Respuesta Si en Pregunta 12 (P12 = 1)
$CS_13 = 0; // Respuesta Si en Pregunta 13 (P13 = 1)
$CS_14 = 0; // Respuesta Si en Pregunta 14 (P14 = 1)
$CS_15 = 0; // Respuesta Si en Pregunta 15 (P15 = 1)
$CS_16 = 0; // Respuesta Si en Pregunta 16 (P16 = 1)
$CS_17 = 0; // Respuesta Si en Pregunta 17 (P17 = 1)
$CS_18 = 0; // Respuesta Si en Pregunta 18 (P18 = 1)
$CS_19 = 0; // Respuesta Si en Pregunta 19 (P19 = 1)
$CS_20 = 0; // Respuesta Si en Pregunta 20 (P20 = 1)
$CS_21 = 0; // Respuesta Si en Pregunta 21 (P21 = 1)

$cant = 0;

while($row = $res->fetch_array(MYSQLI_ASSOC)) {
	$resp = $cliente->consulta_respuestas_alumnos_evaluacion($_GET["eval"], $row["n_alumno"]);
	$cant = $resp->num_rows;
	$cont = 1;
	while ($rows = $resp->fetch_array(MYSQLI_ASSOC)) {
		switch ($cont) {
			case 1: $d1 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_1++; else $CS_1++; break;
			case 2: $d1 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_2++; else $CS_2++; break;
			case 3: $d1 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_3++; else $CS_3++; break;
			case 4: $d2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_4++; else $CS_4++; break;
			case 5: $d2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_5++; else $CS_5++; break;
			case 6: $d2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_6++; else $CS_6++; break;
			case 7: $d3 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_7++; else $CS_7++; break;
			case 8: $d3 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_8++; else $CS_8++; break;
			case 9: $d3 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_9++; else $CS_9++; break;
			case 10: $d4 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_10++; else $CS_10++; break;
			case 11: $d4 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_11++; else $CS_11++; break;
			case 12: $d4 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_12++; else $CS_12++; break;
			case 13: $d5 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_13++; else $CS_13++; break;
			case 14: $d5 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_14++; else $CS_14++; break;
			case 15: $d5 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_15++; else $CS_15++; break;
			case 16: $d6 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_16++; else $CS_16++; break;
			case 17: $d6 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_17++; else $CS_17++; break;
			case 18: $d6 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_18++; else $CS_18++; break;
			case 19: $d7 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_19++; else $CS_19++; break;
			case 20: $d7 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_20++; else $CS_20++; break;
			case 21: $d7 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_21++; else $CS_21++; break;
		}
		$cont++;
	}
	if ($d1 <> 0) $NC_1++;
	if ($d2 <> 0) $NC_2++;
	if ($d3 <> 0) $NC_3++;
	if ($d4 <> 0) $NC_4++;
	if ($d5 <> 0) $NC_5++;
	if ($d6 <> 0) $NC_6++;
	if ($d7 <> 0) $NC_7++;
	
	if ($d1 <= 1) $CA_1++;
	if ($d2 <= 1) $CA_2++;
	if ($d3 <= 1) $CA_3++;
	if ($d4 <= 1) $CA_4++;
	if ($d5 <= 1) $CA_5++;
	if ($d6 <= 1) $CA_6++;
	if ($d7 <= 1) $CA_7++;
	$i++;
}
$cliente->cerrar_conn();
?>
<!DOCTYPE html>
<html>
	<head>
    	<?php include_once("../head.php"); ?>
    	<script type="text/javascript">
    		$(document).ready(function() { 
		        $("#json-table").tablesorter( {sortList: [[0,0]], headers: {8: {sorter: false}}} );
			});
    	</script>
	</head>
	<body>
		<?php include_once("../top-menu.php"); ?>
		<div class='container-fluid'>
			<div class='row'>
				<?php include("../menu.php"); ?>
				<div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
					<h2 class='sub-header'>
						Resultado Alumnos Colegio <?php echo ""; ?> <?php if(isset($_GET["exito"]) && $_GET["exito"] == 1) {echo "(Clave cambiada exitosamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 2) {echo "(Estado cambiado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 3) {echo "(Usuario eliminado correctamente!)";} if(isset($_GET["exito"]) && $_GET["exito"] == 4) {echo "(Usuario creado correctamente!)";} ?>
					</h2>
					<div class='table-responsive'>
						<table id='json-table' class='tablesorter table table-striped'>
							<thead>
								<tr>
									<th>#</th>
									<th>Tipo</th>
									<th>Identidad</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Numero de alumnos del mismo curso y establecimiento con puntaje distinto a nulo, en  Aplicación 1, en dimensión Identidad</td>
									<td><?php echo $NC_1; ?></td>
								</tr>
								<tr>
									<td>2</td>
									<td>Numero de alumnos del mismo curso y establecimiento con puntaje distinto a nulo, en  Aplicación 1, en dimensión utoestima</td>
									<td><?php echo $NC_2; ?></td>
								</tr>
								<tr>
									<td>3</td>
									<td>Numero de alumnos del mismo curso y establecimiento con puntaje distinto a nulo, en  Aplicación 1, en dimensión Valores</td>
									<td><?php echo $NC_3; ?></td>
								</tr>
								<tr>
									<td>4</td>
									<td>Numero de alumnos del mismo curso y establecimiento con puntaje distinto a nulo, en  Aplicación 1, en dimensión Manejo de conflictos</td>
									<td><?php echo $NC_4; ?></td>
								</tr>
								<tr>
									<td>5</td>
									<td>Numero de alumnos del mismo curso y establecimiento con puntaje distinto a nulo, en  Aplicación 1, en dimensión Cooperación y pertenencia</td>
									<td><?php echo $NC_5; ?></td>
								</tr>
								<tr>
									<td>6</td>
									<td>Numero de alumnos del mismo curso y establecimiento con puntaje distinto a nulo, en  Aplicación 1, en dimensión Jerarquías protectoras: Protección y cuidado</td>
									<td><?php echo $NC_6; ?></td>
								</tr>
								<tr>
									<td>7</td>
									<td>Numero de alumnos del mismo curso y establecimiento con puntaje distinto a nulo, en  Aplicación 1, en dimensión Jerarquías protectoras: Manejo de la convivencia</td>
									<td><?php echo $NC_7; ?></td>
								</tr>
								<tr>
									<td>8</td>
									<td>Cuenta alumnos en el curso con nivel Preocupante en dimensión Identidad</td>
									<td><?php echo $CA_1; ?></td>
								</tr>
								<tr>
									<td>9</td>
									<td>Cuenta alumnos en el curso con nivel Preocupante en dimensión utoestima</td>
									<td><?php echo $CA_2; ?></td>
								</tr>
								<tr>
									<td>10</td>
									<td>Cuenta alumnos en el curso con nivel Preocupante en dimensión Valores</td>
									<td><?php echo $CA_3; ?></td>
								</tr>
								<tr>
									<td>11</td>
									<td>Cuenta alumnos en el curso con nivel Preocupante en dimensión Manejo de conflictos</td>
									<td><?php echo $CA_4; ?></td>
								</tr>
								<tr>
									<td>12</td>
									<td>Cuenta alumnos en el curso con nivel Preocupante en dimensión Cooperación y pertenencia</td>
									<td><?php echo $CA_5; ?></td>
								</tr>
								<tr>
									<td>13</td>
									<td>Cuenta alumnos en el curso con nivel Preocupante en dimensión Jerarquías protectoras: Protección y cuidado</td>
									<td><?php echo $CA_6; ?></td>
								</tr>
								<tr>
									<td>14</td>
									<td>Cuenta alumnos en el curso con nivel Preocupante en dimensión Jerarquías protectoras: Manejo de la convivencia</td>
									<td><?php echo $CA_7; ?></td>
								</tr>
								<tr>
									<td>15</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Identidad</td>
									<td><?php if ($CA_1 == 0 && $NC_1 == 0) echo "0"; else echo sprintf('%0.2f%%', ($CA_1 / $NC_1) * 100); ?></td>
								</tr>
								<tr>
									<td>16</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión utoestima</td>
									<td><?php if ($CA_2 == 0 && $NC_2 == 0) echo "0"; else echo sprintf('%0.2f%%', ($CA_2 / $NC_2) * 100); ?></td>
								</tr>
								<tr>
									<td>17</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Valores</td>
									<td><?php if ($CA_3 == 0 && $NC_3 == 0) echo "0"; else echo sprintf('%0.2f%%', ($CA_3 / $NC_3) * 100); ?></td>
								</tr>
								<tr>
									<td>18</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Manejo de conflictos</td>
									<td><?php if ($CA_4 == 0 && $NC_4 == 0) echo "0"; else echo sprintf('%0.2f%%', ($CA_4 / $NC_4) * 100); ?></td>
								</tr>
								<tr>
									<td>19</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Cooperación y pertenencia</td>
									<td><?php if ($CA_5 == 0 && $NC_5 == 0) echo "0"; else echo sprintf('%0.2f%%', ($CA_5 / $NC_5) * 100); ?></td>
								</tr>
								<tr>
									<td>20</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Jerarquías protectoras: Protección y cuidado</td>
									<td><?php if ($CA_6 == 0 && $NC_6 == 0) echo "0"; else echo sprintf('%0.2f%%', ($CA_6 / $NC_6) * 100); ?></td>
								</tr>
								<tr>
									<td>21</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Jerarquías protectoras: Manejo de la convivencia</td>
									<td><?php if ($CA_7 == 0 && $NC_7 == 0) echo "0"; else echo sprintf('%0.2f%%', ($CA_7 / $NC_7) * 100); ?></td>
								</tr>
								<tr>
									<td>22</td>
									<td>Cantidad de alumnos con 'No' en afirmación 1</td>
									<td><?php echo $CN_1; ?></td>
								</tr>
								<tr>
									<td>23</td>
									<td>Cantidad de alumnos con 'No' en afirmación 2</td>
									<td><?php echo $CN_2; ?></td>
								</tr>
								<tr>
									<td>24</td>
									<td>Cantidad de alumnos con 'No' en afirmación 3</td>
									<td><?php echo $CN_3; ?></td>
								</tr>
								<tr>
									<td>25</td>
									<td>Cantidad de alumnos con 'No' en afirmación 4</td>
									<td><?php echo $CN_4; ?></td>
								</tr>
								<tr>
									<td>26</td>
									<td>Cantidad de alumnos con 'No' en afirmación 5</td>
									<td><?php echo $CN_5; ?></td>
								</tr>
								<tr>
									<td>27</td>
									<td>Cantidad de alumnos con 'No' en afirmación 6</td>
									<td><?php echo $CN_6; ?></td>
								</tr>
								<tr>
									<td>28</td>
									<td>Cantidad de alumnos con 'No' en afirmación 7</td>
									<td><?php echo $CN_7; ?></td>
								</tr>
								<tr>
									<td>29</td>
									<td>Cantidad de alumnos con 'No' en afirmación 8</td>
									<td><?php echo $CN_8; ?></td>
								</tr>
								<tr>
									<td>30</td>
									<td>Cantidad de alumnos con 'No' en afirmación 9</td>
									<td><?php echo $CN_9; ?></td>
								</tr>
								<tr>
									<td>31</td>
									<td>Cantidad de alumnos con 'No' en afirmación 10</td>
									<td><?php echo $CN_10; ?></td>
								</tr>
								<tr>
									<td>32</td>
									<td>Cantidad de alumnos con 'No' en afirmación 11</td>
									<td><?php echo $CN_11; ?></td>
								</tr>
								<tr>
									<td>33</td>
									<td>Cantidad de alumnos con 'No' en afirmación 12</td>
									<td><?php echo $CN_12; ?></td>
								</tr>
								<tr>
									<td>34</td>
									<td>Cantidad de alumnos con 'No' en afirmación 13</td>
									<td><?php echo $CN_13; ?></td>
								</tr>
								<tr>
									<td>35</td>
									<td>Cantidad de alumnos con 'No' en afirmación 14</td>
									<td><?php echo $CN_14; ?></td>
								</tr>
								<tr>
									<td>36</td>
									<td>Cantidad de alumnos con 'No' en afirmación 15</td>
									<td><?php echo $CN_15; ?></td>
								</tr>
								<tr>
									<td>37</td>
									<td>Cantidad de alumnos con 'No' en afirmación 16</td>
									<td><?php echo $CN_16; ?></td>
								</tr>
								<tr>
									<td>38</td>
									<td>Cantidad de alumnos con 'No' en afirmación 17</td>
									<td><?php echo $CN_17; ?></td>
								</tr>
								<tr>
									<td>40</td>
									<td>Cantidad de alumnos con 'No' en afirmación 18</td>
									<td><?php echo $CN_18; ?></td>
								</tr>
								<tr>
									<td>41</td>
									<td>Cantidad de alumnos con 'No' en afirmación 19</td>
									<td><?php echo $CN_19; ?></td>
								</tr>
								<tr>
									<td>42</td>
									<td>Cantidad de alumnos con 'No' en afirmación 20</td>
									<td><?php echo $CN_20; ?></td>
								</tr>
								<tr>
									<td>43</td>
									<td>Cantidad de alumnos con 'No' en afirmación 21</td>
									<td><?php echo $CN_21; ?></td>
								</tr>
								<tr>
									<td>44</td>
									<td>Proporción de alumnos con 'No' en afirmación 1</td>
									<td><?php echo sprintf('%0.2f', $CN_1 / $cant); ?></td>
								</tr>
								<tr>
									<td>45</td>
									<td>Proporción de alumnos con 'No'  en afirmación 2</td>
									<td><?php echo sprintf('%0.2f', $CN_2 / $cant); ?></td>
								</tr>
								<tr>
									<td>46</td>
									<td>Proporción de alumnos con 'No'  en afirmación 3</td>
									<td><?php echo sprintf('%0.2f', $CN_3 / $cant); ?></td>
								</tr>
								<tr>
									<td>47</td>
									<td>Proporción de alumnos con 'No'  en afirmación 4</td>
									<td><?php echo sprintf('%0.2f', $CN_4 / $cant); ?></td>
								</tr>
								<tr>
									<td>48</td>
									<td>Proporción de alumnos con 'No'  en afirmación 5</td>
									<td><?php echo sprintf('%0.2f', $CN_5 / $cant); ?></td>
								</tr>
								<tr>
									<td>49</td>
									<td>Proporción de alumnos con 'No'  en afirmación 6</td>
									<td><?php echo sprintf('%0.2f', $CN_6 / $cant); ?></td>
								</tr>
								<tr>
									<td>50</td>
									<td>Proporción de alumnos con 'No'  en afirmación 7</td>
									<td><?php echo sprintf('%0.2f', $CN_7 / $cant); ?></td>
								</tr>
								<tr>
									<td>51</td>
									<td>Proporción de alumnos con 'No'  en afirmación 8</td>
									<td><?php echo sprintf('%0.2f', $CN_8 / $cant); ?></td>
								</tr>
								<tr>
									<td>52</td>
									<td>Proporción de alumnos con 'No'  en afirmación 9</td>
									<td><?php echo sprintf('%0.2f', $CN_9 / $cant); ?></td>
								</tr>
								<tr>
									<td>53</td>
									<td>Proporción de alumnos con 'No'  en afirmación 10</td>
									<td><?php echo sprintf('%0.2f', $CN_10 / $cant); ?></td>
								</tr>
								<tr>
									<td>54</td>
									<td>Proporción de alumnos con 'No'  en afirmación 11</td>
									<td><?php echo sprintf('%0.2f', $CN_11 / $cant); ?></td>
								</tr>
								<tr>
									<td>55</td>
									<td>Proporción de alumnos con 'No'  en afirmación 12</td>
									<td><?php echo sprintf('%0.2f', $CN_12 / $cant); ?></td>
								</tr>
								<tr>
									<td>56</td>
									<td>Proporción de alumnos con 'No'  en afirmación 13</td>
									<td><?php echo sprintf('%0.2f', $CN_13 / $cant); ?></td>
								</tr>
								<tr>
									<td>57</td>
									<td>Proporción de alumnos con 'No'  en afirmación 14</td>
									<td><?php echo sprintf('%0.2f', $CN_14 / $cant); ?></td>
								</tr>
								<tr>
									<td>58</td>
									<td>Proporción de alumnos con 'No'  en afirmación 15</td>
									<td><?php echo sprintf('%0.2f', $CN_15 / $cant); ?></td>
								</tr>
								<tr>
									<td>59</td>
									<td>Proporción de alumnos con 'No'  en afirmación 16</td>
									<td><?php echo sprintf('%0.2f', $CN_16 / $cant); ?></td>
								</tr>
								<tr>
									<td>60</td>
									<td>Proporción de alumnos con 'No'  en afirmación 17</td>
									<td><?php echo sprintf('%0.2f', $CN_17 / $cant); ?></td>
								</tr>
								<tr>
									<td>61</td>
									<td>Proporción de alumnos con 'No'  en afirmación 18</td>
									<td><?php echo sprintf('%0.2f', $CN_18 / $cant); ?></td>
								</tr>
								<tr>
									<td>62</td>
									<td>Proporción de alumnos con 'No'  en afirmación 19</td>
									<td><?php echo sprintf('%0.2f', $CN_19 / $cant); ?></td>
								</tr>
								<tr>
									<td>63</td>
									<td>Proporción de alumnos con 'No'  en afirmación 20</td>
									<td><?php echo sprintf('%0.2f', $CN_20 / $cant); ?></td>
								</tr>
								<tr>
									<td>64</td>
									<td>Proporción de alumnos con 'No'  en afirmación 21</td>
									<td><?php echo sprintf('%0.2f', $CN_21 / $cant); ?></td>
								</tr>
								<tr>
									<td>65</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 1</td>
									<td><?php echo $CS_1; ?></td>
								</tr>
								<tr>
									<td>66</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 2</td>
									<td><?php echo $CS_2; ?></td>
								</tr>
								<tr>
									<td>67</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 3</td>
									<td><?php echo $CS_3; ?></td>
								</tr>
								<tr>
									<td>68</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 4</td>
									<td><?php echo $CS_4; ?></td>
								</tr>
								<tr>
									<td>69</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 5</td>
									<td><?php echo $CS_5; ?></td>
								</tr>
								<tr>
									<td>70</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 6</td>
									<td><?php echo $CS_6; ?></td>
								</tr>
								<tr>
									<td>71</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 7</td>
									<td><?php echo $CS_7; ?></td>
								</tr>
								<tr>
									<td>72</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 8</td>
									<td><?php echo $CS_8; ?></td>
								</tr>
								<tr>
									<td>73</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 9</td>
									<td><?php echo $CS_9; ?></td>
								</tr>
								<tr>
									<td>74</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 10</td>
									<td><?php echo $CS_10; ?></td>
								</tr>
								<tr>
									<td>75</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 11</td>
									<td><?php echo $CS_11; ?></td>
								</tr>
								<tr>
									<td>76</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 12</td>
									<td><?php echo $CS_12; ?></td>
								</tr>
								<tr>
									<td>77</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 13</td>
									<td><?php echo $CS_13; ?></td>
								</tr>
								<tr>
									<td>78</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 14</td>
									<td><?php echo $CS_14; ?></td>
								</tr>
								<tr>
									<td>79</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 15</td>
									<td><?php echo $CS_15; ?></td>
								</tr>
								<tr>
									<td>80</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 16</td>
									<td><?php echo $CS_16; ?></td>
								</tr>
								<tr>
									<td>81</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 17</td>
									<td><?php echo $CS_17; ?></td>
								</tr>
								<tr>
									<td>82</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 18</td>
									<td><?php echo $CS_18; ?></td>
								</tr>
								<tr>
									<td>83</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 19</td>
									<td><?php echo $CS_19; ?></td>
								</tr>
								<tr>
									<td>84</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 20</td>
									<td><?php echo $CS_20; ?></td>
								</tr>
								<tr>
									<td>85</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación 21</td>
									<td><?php echo $CS_21; ?></td>
								</tr>
								<tr>
									<td>86</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 1</td>
									<td><?php echo sprintf('%0.2f', $CS_1 / $cant); ?></td>
								</tr>
								<tr>
									<td>87</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 2</td>
									<td><?php echo sprintf('%0.2f', $CS_2 / $cant); ?></td>
								</tr>
								<tr>
									<td>88</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 3</td>
									<td><?php echo sprintf('%0.2f', $CS_3 / $cant); ?></td>
								</tr>
								<tr>
									<td>89</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 4</td>
									<td><?php echo sprintf('%0.2f', $CS_4 / $cant); ?></td>
								</tr>
								<tr>
									<td>90</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 5</td>
									<td><?php echo sprintf('%0.2f', $CS_5 / $cant); ?></td>
								</tr>
								<tr>
									<td>91</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 6</td>
									<td><?php echo sprintf('%0.2f', $CS_6 / $cant); ?></td>
								</tr>
								<tr>
									<td>92</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 7</td>
									<td><?php echo sprintf('%0.2f', $CS_7 / $cant); ?></td>
								</tr>
								<tr>
									<td>93</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 8</td>
									<td><?php echo sprintf('%0.2f', $CS_8 / $cant); ?></td>
								</tr>
								<tr>
									<td>94</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 9</td>
									<td><?php echo sprintf('%0.2f', $CS_9 / $cant); ?></td>
								</tr>
								<tr>
									<td>95</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 10</td>
									<td><?php echo sprintf('%0.2f', $CS_10 / $cant); ?></td>
								</tr>
								<tr>
									<td>96</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 11</td>
									<td><?php echo sprintf('%0.2f', $CS_11 / $cant); ?></td>
								</tr>
								<tr>
									<td>97</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 12</td>
									<td><?php echo sprintf('%0.2f', $CS_12 / $cant); ?></td>
								</tr>
								<tr>
									<td>98</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 13</td>
									<td><?php echo sprintf('%0.2f', $CS_13 / $cant); ?></td>
								</tr>
								<tr>
									<td>99</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 14</td>
									<td><?php echo sprintf('%0.2f', $CS_14 / $cant); ?></td>
								</tr>
								<tr>
									<td>100</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 15</td>
									<td><?php echo sprintf('%0.2f', $CS_15 / $cant); ?></td>
								</tr>
								<tr>
									<td>101</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 16</td>
									<td><?php echo sprintf('%0.2f', $CS_16 / $cant); ?></td>
								</tr>
								<tr>
									<td>102</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 17</td>
									<td><?php echo sprintf('%0.2f', $CS_17 / $cant); ?></td>
								</tr>
								<tr>
									<td>103</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 18</td>
									<td><?php echo sprintf('%0.2f', $CS_18 / $cant); ?></td>
								</tr>
								<tr>
									<td>104</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 19</td>
									<td><?php echo sprintf('%0.2f', $CS_19 / $cant); ?></td>
								</tr>
								<tr>
									<td>105</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 20</td>
									<td><?php echo sprintf('%0.2f', $CS_20 / $cant); ?></td>
								</tr>
								<tr>
									<td>106</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación 21</td>
									<td><?php echo sprintf('%0.2f', $CS_21 / $cant); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>