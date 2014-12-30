<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$res = $cliente->consulta_alumnos_de_evaluacion($_GET["eval"]);
$i = 0;
while($row = $res->fetch_array(MYSQLI_ASSOC)) {
	$d1 = 0; // Identidad
	$d2 = 0; // Autoestima
	$d3 = 0; // Valores
	$d4 = 0; // Manejo de Conflictos
	$d5 = 0; // Cooperacion y Pertenencia
	$d6 = 0; // Proteccion y Cuidados
	$d7 = 0; // Manejo de la Convivencia

	$NC_1 = 0; // CANTIDAD ALUMNOS Identidad
	$NC_2 = 0; // CANTIDAD ALUMNOS Autoestima
	$NC_3 = 0; // CANTIDAD ALUMNOS Valores
	$NC_4 = 0; // CANTIDAD ALUMNOS Manejo de Conflictos
	$NC_5 = 0; // CANTIDAD ALUMNOS Cooperacion y Pertenencia
	$NC_6 = 0; // CANTIDAD ALUMNOS Proteccion y Cuidados
	$NC_7 = 0; // CANTIDAD ALUMNOS Manejo de la Convivencia
	
	$CA_1 = 0; // CANTIDAD ALUMNOS Identidad
	$CA_2 = 0; // CANTIDAD ALUMNOS Autoestima
	$CA_3 = 0; // CANTIDAD ALUMNOS Valores
	$CA_4 = 0; // CANTIDAD ALUMNOS Manejo de Conflictos
	$CA_5 = 0; // CANTIDAD ALUMNOS Cooperacion y Pertenencia
	$CA_6 = 0; // CANTIDAD ALUMNOS Proteccion y Cuidados
	$CA_7 = 0; // CANTIDAD ALUMNOS Manejo de la Convivencia
	
	$CN_1 = 0; // CANTIDAD ALUMNOS Identidad
	$CN_2 = 0; // CANTIDAD ALUMNOS Autoestima
	$CN_3 = 0; // CANTIDAD ALUMNOS Valores
	$CN_4 = 0; // CANTIDAD ALUMNOS Manejo de Conflictos
	$CN_5 = 0; // CANTIDAD ALUMNOS Cooperacion y Pertenencia
	$CN_6 = 0; // CANTIDAD ALUMNOS Proteccion y Cuidados
	$CN_7 = 0; // CANTIDAD ALUMNOS Manejo de la Convivencia
	
	$CS_1 = 0; // CANTIDAD ALUMNOS Identidad
	$CS_2 = 0; // CANTIDAD ALUMNOS Autoestima
	$CS_3 = 0; // CANTIDAD ALUMNOS Valores
	$CS_4 = 0; // CANTIDAD ALUMNOS Manejo de Conflictos
	$CS_5 = 0; // CANTIDAD ALUMNOS Cooperacion y Pertenencia
	$CS_6 = 0; // CANTIDAD ALUMNOS Proteccion y Cuidados
	$CS_7 = 0; // CANTIDAD ALUMNOS Manejo de la Convivencia
	
	$resp = $cliente->consulta_respuestas_alumnos_evaluacion($_GET["eval"], $row["n_alumno"]);
	$cont = 1;
	while ($rows = $resp->fetch_array(MYSQLI_ASSOC)) {
		switch ($cont) {
			case 1: $d1 += $rows["respuesta"]; break;
			case 2: $d1 += $rows["respuesta"]; break;
			case 3: $d1 += $rows["respuesta"]; break;
			case 4: $d2 += $rows["respuesta"]; break;
			case 5: $d2 += $rows["respuesta"]; break;
			case 6: $d2 += $rows["respuesta"]; break;
			case 7: $d3 += $rows["respuesta"]; break;
			case 8: $d3 += $rows["respuesta"]; break;
			case 9: $d3 += $rows["respuesta"]; break;
			case 10: $d4 += $rows["respuesta"]; break;
			case 11: $d4 += $rows["respuesta"]; break;
			case 12: $d4 += $rows["respuesta"]; break;
			case 13: $d5 += $rows["respuesta"]; break;
			case 14: $d5 += $rows["respuesta"]; break;
			case 15: $d5 += $rows["respuesta"]; break;
			case 16: $d6 += $rows["respuesta"]; break;
			case 17: $d6 += $rows["respuesta"]; break;
			case 18: $d6 += $rows["respuesta"]; break;
			case 19: $d7 += $rows["respuesta"]; break;
			case 20: $d7 += $rows["respuesta"]; break;
			case 21: $d7 += $rows["respuesta"]; break;
		}
		$cont++;
	}
	if ($d1 == 0) $CN_1++; else $NC_1++;
	if ($d2 == 0) $CN_2++; else $NC_2++;
	if ($d3 == 0) $CN_3++; else $NC_3++;
	if ($d4 == 0) $CN_4++; else $NC_4++;
	if ($d5 == 0) $CN_5++; else $NC_5++;
	if ($d6 == 0) $CN_6++; else $NC_6++;
	if ($d7 == 0) $CN_7++; else $NC_7++;
	
	if ($d1 <= 1) $CA_1++;
	if ($d2 <= 1) $CA_2++;
	if ($d3 <= 1) $CA_3++;
	if ($d4 <= 1) $CA_4++;
	if ($d5 <= 1) $CA_5++;
	if ($d6 <= 1) $CA_6++;
	if ($d7 <= 1) $CA_7++;

	if ($d1 == 1) $CS_1++;
	if ($d2 == 1) $CS_2++;
	if ($d3 == 1) $CS_3++;
	if ($d4 == 1) $CS_4++;
	if ($d5 == 1) $CS_5++;
	if ($d6 == 1) $CS_6++;
	if ($d7 == 1) $CS_7++;
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
									<td>Numero de alumnos del mismo curso y establecimiento con puntaje distinto a nulo, en  Aplicación 1, en dimensión Autoestima</td>
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
									<td>Cuenta alumnos en el curso con nivel Preocupante en dimensión Autoestima</td>
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
									<td><?php if ($CA_1 == 0 && $NC_1 == 0) echo "0"; else {echo sprintf('%0.2f', $CA_1 / $NC_1);} ?></td>
								</tr>
								<tr>
									<td>16</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Autoestima</td>
									<td><?php if ($CA_2 == 0 && $NC_2 == 0) echo "0"; else {echo sprintf('%0.2f', $CA_2 / $NC_2);} ?></td>
								</tr>
								<tr>
									<td>17</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Valores</td>
									<td><?php if ($CA_3 == 0 && $NC_3 == 0) echo "0"; else {echo sprintf('%0.2f', $CA_3 / $NC_3);} ?></td>
								</tr>
								<tr>
									<td>18</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Manejo de conflictos</td>
									<td><?php if ($CA_4 == 0 && $NC_4 == 0) echo "0"; else echo sprintf('%0.2f', $CA_4 / $NC_4); ?></td>
								</tr>
								<tr>
									<td>19</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Cooperación y pertenencia</td>
									<td><?php if ($CA_5 == 0 && $NC_5 == 0) echo "0"; else echo sprintf('%0.2f', $CA_5 / $NC_5); ?></td>
								</tr>
								<tr>
									<td>20</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Jerarquías protectoras: Protección y cuidado</td>
									<td><?php if ($CA_6 == 0 && $NC_6 == 0) echo "0"; else echo sprintf('%0.2f', $CA_6 / $NC_6); ?></td>
								</tr>
								<tr>
									<td>21</td>
									<td>Porcentaje alumnos en el curso con nivel Preocupante en dimensión Jerarquías protectoras: Manejo de la convivencia</td>
									<td><?php if ($CA_7 == 0 && $NC_7 == 0) echo "0"; else echo sprintf('%0.2f', $CA_7 / $NC_7); ?></td>
								</tr>
								<tr>
									<td>22</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a1</td>
									<td><?php echo $CN_1; ?></td>
								</tr>
								<tr>
									<td>23</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a2</td>
									<td><?php echo $CN_2; ?></td>
								</tr>
								<tr>
									<td>24</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a3</td>
									<td><?php echo $CN_3; ?></td>
								</tr>
								<tr>
									<td>25</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a4</td>
									<td><?php echo $CN_4; ?></td>
								</tr>
								<tr>
									<td>26</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a5</td>
									<td><?php echo $CN_5; ?></td>
								</tr>
								<tr>
									<td>27</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a6</td>
									<td><?php echo $CN_6; ?></td>
								</tr>
								<tr>
									<td>28</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a7</td>
									<td><?php echo $CN_7; ?></td>
								</tr>
								<tr>
									<td>29</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a8</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>30</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a9</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>31</td>
									<td>Cantidad de alumnos con 'No' en afirmación a10</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>32</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a11</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>33</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a12</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>34</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a13</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>35</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a14</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>36</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a15</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>37</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a16</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>38</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a17</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>40</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a18</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>41</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a19</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>42</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a20</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>43</td>
									<td>Cantidad de alumnos con 'No'  en afirmación a21</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>44</td>
									<td>Proporción de alumnos con 'No'  en afirmación a1</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>45</td>
									<td>Proporción de alumnos con 'No'  en afirmación a2</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>46</td>
									<td>Proporción de alumnos con 'No'  en afirmación a3</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>47</td>
									<td>Proporción de alumnos con 'No'  en afirmación a4</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>48</td>
									<td>Proporción de alumnos con 'No'  en afirmación a5</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>49</td>
									<td>Proporción de alumnos con 'No'  en afirmación a6</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>50</td>
									<td>Proporción de alumnos con 'No'  en afirmación a7</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>51</td>
									<td>Proporción de alumnos con 'No'  en afirmación a8</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>52</td>
									<td>Proporción de alumnos con 'No'  en afirmación a9</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>53</td>
									<td>Proporción de alumnos con 'No'  en afirmación a10</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>54</td>
									<td>Proporción de alumnos con 'No'  en afirmación a11</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>55</td>
									<td>Proporción de alumnos con 'No'  en afirmación a12</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>56</td>
									<td>Proporción de alumnos con 'No'  en afirmación a13</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>57</td>
									<td>Proporción de alumnos con 'No'  en afirmación a14</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>58</td>
									<td>Proporción de alumnos con 'No'  en afirmación a15</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>59</td>
									<td>Proporción de alumnos con 'No'  en afirmación a16</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>60</td>
									<td>Proporción de alumnos con 'No'  en afirmación a17</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>61</td>
									<td>Proporción de alumnos con 'No'  en afirmación a18</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>62</td>
									<td>Proporción de alumnos con 'No'  en afirmación a19</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>63</td>
									<td>Proporción de alumnos con 'No'  en afirmación a20</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>64</td>
									<td>Proporción de alumnos con 'No'  en afirmación a21</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>65</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a1</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>66</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a2</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>67</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a3</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>68</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a4</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>69</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a5</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>70</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a6</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>71</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a7</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>72</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a8</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>73</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a9</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>74</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a10</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>75</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a11</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>76</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a12</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>77</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a13</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>78</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a14</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>79</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a15</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>80</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a16</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>81</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a17</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>82</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a18</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>83</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a19</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>84</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a20</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>85</td>
									<td>Cantidad de alumnos con 'Sí'  en afirmación a21</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>86</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a1</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>87</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a2</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>88</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a3</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>89</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a4</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>90</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a5</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>91</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a6</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>92</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a7</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>93</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a8</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>94</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a9</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>95</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a10</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>96</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a11</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>97</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a12</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>98</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a13</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>99</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a14</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>100</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a15</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>101</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a16</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>102</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a17</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>103</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a18</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>104</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a19</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>105</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a20</td>
									<td><?php echo ""; ?></td>
								</tr>
								<tr>
									<td>106</td>
									<td>Proporción de alumnos con 'Sí'  en afirmación a21</td>
									<td><?php echo ""; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>