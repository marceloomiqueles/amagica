<?php
include_once("../../include/header-cache.php");
require("../../include/cliente.class.php");
if(empty($_SESSION["id"]) || $_SESSION["id"] == "") header ("Location: ../../include/login_session.php");

$cliente = new Cliente;

$eval_numero = "";

$res = $cliente->consulta_alumnos_de_evaluacion($_GET["eval"]);
$row = $res->fetch_array(MYSQLI_ASSOC);
$eval_numero = $row["eval_numero"];

$res = $cliente->consulta_evaluacion_por_usuario_id(1, $_SESSION["id"], 1);
$row = $res->fetch_array(MYSQLI_ASSOC);
$eval_id = $row["id"];

// die($eval_numero);

$i_2 = 0;
$d1_2 = 0; // Dimension 1 - Identidad (Cuenta Respuestas)
$d2_2 = 0; // Dimension 2 - Autoestima (Cuenta Respuestas)
$d3_2 = 0; // Dimension 3 - Valores (Cuenta Respuestas)
$d4_2 = 0; // Dimension 4 - Manejo de Conflictos (Cuenta Respuestas)
$d5_2 = 0; // Dimension 5 - Cooperacion y Pertenencia (Cuenta Respuestas)
$d6_2 = 0; // Dimension 6 - Proteccion y Cuidados (Cuenta Respuestas)
$d7_2 = 0; // Dimension 7 - Manejo de la Convivencia (Cuenta Respuestas)

$NC_1_2 = 0; // CANTIDAD ESTUDIANTES <> null Identidad (Nulo)
$NC_2_2 = 0; // CANTIDAD ESTUDIANTES <> null Autoestima (Nulo)
$NC_3_2 = 0; // CANTIDAD ESTUDIANTES <> null Valores (Nulo)
$NC_4_2 = 0; // CANTIDAD ESTUDIANTES <> null Manejo de Conflictos (Nulo)
$NC_5_2 = 0; // CANTIDAD ESTUDIANTES <> null Cooperacion y Pertenencia (Nulo)
$NC_6_2 = 0; // CANTIDAD ESTUDIANTES <> null Proteccion y Cuidados (Nulo)
$NC_7_2 = 0; // CANTIDAD ESTUDIANTES <> null Manejo de la Convivencia (Nulo)

$CA_1_2 = 0; // CANTIDAD ESTUDIANTES <= 1 Identidad (Preocupante)
$CA_2_2 = 0; // CANTIDAD ESTUDIANTES <= 1 Autoestima (Preocupante)
$CA_3_2 = 0; // CANTIDAD ESTUDIANTES <= 1 Valores (Preocupante)
$CA_4_2 = 0; // CANTIDAD ESTUDIANTES <= 1 Manejo de Conflictos (Preocupante)
$CA_5_2 = 0; // CANTIDAD ESTUDIANTES <= 1 Cooperacion y Pertenencia (Preocupante)
$CA_6_2 = 0; // CANTIDAD ESTUDIANTES <= 1 Proteccion y Cuidados (Preocupante)
$CA_7_2 = 0; // CANTIDAD ESTUDIANTES <= 1 Manejo de la Convivencia (Preocupante)

$CN_1_2 = 0; //  Respuesta No en Pregunta 1 (P1 = 0)
$CN_2_2 = 0; //  Respuesta No en Pregunta 2 (P2 = 0)
$CN_3_2 = 0; //  Respuesta No en Pregunta 3 (P3 = 0)
$CN_4_2 = 0; //  Respuesta No en Pregunta 4 (P4 = 0)
$CN_5_2 = 0; //  Respuesta No en Pregunta 5 (P5 = 0)
$CN_6_2 = 0; //  Respuesta No en Pregunta 6 (P6 = 0)
$CN_7_2 = 0; //  Respuesta No en Pregunta 7 (P7 = 0)
$CN_8_2 = 0; //  Respuesta No en Pregunta 8 (P8 = 0)
$CN_9_2 = 0; //  Respuesta No en Pregunta 9 (P9 = 0)
$CN_10_2 = 0; // Respuesta No en Pregunta 10 (P10 = 0)
$CN_11_2 = 0; // Respuesta No en Pregunta 11 (P11 = 0)
$CN_12_2 = 0; // Respuesta No en Pregunta 12 (P12 = 0)
$CN_13_2 = 0; // Respuesta No en Pregunta 13 (P13 = 0)
$CN_14_2 = 0; // Respuesta No en Pregunta 14 (P14 = 0)
$CN_15_2 = 0; // Respuesta No en Pregunta 15 (P15 = 0)
$CN_16_2 = 0; // Respuesta No en Pregunta 16 (P16 = 0)
$CN_17_2 = 0; // Respuesta No en Pregunta 17 (P17 = 0)
$CN_18_2 = 0; // Respuesta No en Pregunta 18 (P18 = 0)
$CN_19_2 = 0; // Respuesta No en Pregunta 19 (P19 = 0)
$CN_20_2 = 0; // Respuesta No en Pregunta 20 (P20 = 0)
$CN_21_2 = 0; // Respuesta No en Pregunta 21 (P21 = 0)

$PEA_1_2 = 0; // PORCENTAJE SI EJE Identidad
$PEA_2_2 = 0; // PORCENTAJE SI EJE Autoestima
$PEA_3_2 = 0; // PORCENTAJE SI EJE Valores
$PEA_4_2 = 0; // PORCENTAJE SI EJE Manejo de Conflictos
$PEA_5_2 = 0; // PORCENTAJE SI EJE Cooperacion y Pertenencia
$PEA_6_2 = 0; // PORCENTAJE SI EJE Proteccion y Cuidados
$PEA_7_2 = 0; // PORCENTAJE SI EJE Manejo de la Convivencia

$PEP_1_2 = 0; // PORCENTAJE NO EJE Identidad
$PEP_2_2 = 0; // PORCENTAJE NO EJE Autoestima
$PEP_3_2 = 0; // PORCENTAJE NO EJE Valores
$PEP_4_2 = 0; // PORCENTAJE NO EJE Manejo de Conflictos
$PEP_5_2 = 0; // PORCENTAJE NO EJE Cooperacion y Pertenencia
$PEP_6_2 = 0; // PORCENTAJE NO EJE Proteccion y Cuidados
$PEP_7_2 = 0; // PORCENTAJE NO EJE Manejo de la Convivencia

$CS_1_2 = 0; //  Respuesta Si en Pregunta 1 (P1 = 1)
$CS_2_2 = 0; //  Respuesta Si en Pregunta 2 (P2 = 1)
$CS_3_2 = 0; //  Respuesta Si en Pregunta 3 (P3 = 1)
$CS_4_2 = 0; //  Respuesta Si en Pregunta 4 (P4 = 1)
$CS_5_2 = 0; //  Respuesta Si en Pregunta 5 (P5 = 1)
$CS_6_2 = 0; //  Respuesta Si en Pregunta 6 (P6 = 1)
$CS_7_2 = 0; //  Respuesta Si en Pregunta 7 (P7 = 1)
$CS_8_2 = 0; //  Respuesta Si en Pregunta 8 (P8 = 1)
$CS_9_2 = 0; //  Respuesta Si en Pregunta 9 (P9 = 1)
$CS_10_2 = 0; // Respuesta Si en Pregunta 10 (P10 = 1)
$CS_11_2 = 0; // Respuesta Si en Pregunta 11 (P11 = 1)
$CS_12_2 = 0; // Respuesta Si en Pregunta 12 (P12 = 1)
$CS_13_2 = 0; // Respuesta Si en Pregunta 13 (P13 = 1)
$CS_14_2 = 0; // Respuesta Si en Pregunta 14 (P14 = 1)
$CS_15_2 = 0; // Respuesta Si en Pregunta 15 (P15 = 1)
$CS_16_2 = 0; // Respuesta Si en Pregunta 16 (P16 = 1)
$CS_17_2 = 0; // Respuesta Si en Pregunta 17 (P17 = 1)
$CS_18_2 = 0; // Respuesta Si en Pregunta 18 (P18 = 1)
$CS_19_2 = 0; // Respuesta Si en Pregunta 19 (P19 = 1)
$CS_20_2 = 0; // Respuesta Si en Pregunta 20 (P20 = 1)
$CS_21_2 = 0; // Respuesta Si en Pregunta 21 (P21 = 1)

if ($eval_numero == 2) {

	$cant_2 = 0;
	 // die($eval_id);
	$res = $cliente->consulta_alumnos_de_evaluacion($eval_id);

	while($row = $res->fetch_array(MYSQLI_ASSOC)) {
		// die("entramos");
		$resp_2 = $cliente->consulta_respuestas_alumnos_evaluacion($eval_id, $row["n_alumno"]);
		$cant_2 = $resp_2->num_rows;
		$cont_2 = 1;
		while ($rows = $resp_2->fetch_array(MYSQLI_ASSOC)) {
			switch ($cont_2) {
				case  1: $d1_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_1_2++;  else $CS_1_2++; break;
				case  2: $d1_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_2_2++;  else $CS_2_2++; break;
				case  3: $d1_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_3_2++;  else $CS_3_2++; break;
				case  4: $d2_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_4_2++;  else $CS_4_2++; break;
				case  5: $d2_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_5_2++;  else $CS_5_2++; break;
				case  6: $d2_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_6_2++;  else $CS_6_2++; break;
				case  7: $d3_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_7_2++;  else $CS_7_2++; break;
				case  8: $d3_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_8_2++;  else $CS_8_2++; break;
				case  9: $d3_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_9_2++;  else $CS_9_2++; break;
				case 10: $d4_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_10_2++; else $CS_10_2++; break;
				case 11: $d4_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_11_2++; else $CS_11_2++; break;
				case 12: $d4_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_12_2++; else $CS_12_2++; break;
				case 13: $d5_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_13_2++; else $CS_13_2++; break;
				case 14: $d5_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_14_2++; else $CS_14_2++; break;
				case 15: $d5_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_15_2++; else $CS_15_2++; break;
				case 16: $d6_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_16_2++; else $CS_16_2++; break;
				case 17: $d6_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_17_2++; else $CS_17_2++; break;
				case 18: $d6_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_18_2++; else $CS_18_2++; break;
				case 19: $d7_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_19_2++; else $CS_19_2++; break;
				case 20: $d7_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_20_2++; else $CS_20_2++; break;
				case 21: $d7_2 += $rows["respuesta"]; if ($rows["respuesta"] == 0) $CN_21_2++; else $CS_21_2++; break;
			}
			$cont_2++;
		}
		if ($d1_2 <= 1) $NC_1_2++;
		if ($d2_2 <= 1) $NC_2_2++;
		if ($d3_2 <= 1) $NC_3_2++;
		if ($d4_2 <= 1) $NC_4_2++;
		if ($d5_2 <= 1) $NC_5_2++;
		if ($d6_2 <= 1) $NC_6_2++;
		if ($d7_2 <= 1) $NC_7_2++;
		
		if ($d1_2 > 1) $CA_1_2++;
		if ($d2_2 > 1) $CA_2_2++;
		if ($d3_2 > 1) $CA_3_2++;
		if ($d4_2 > 1) $CA_4_2++;
		if ($d5_2 > 1) $CA_5_2++;
		if ($d6_2 > 1) $CA_6_2++;
		if ($d7_2 > 1) $CA_7_2++;
		$i_2++;
	}
}

$i = 0;
$d1 = 0; // Dimension 1 - Identidad (Cuenta Respuestas)
$d2 = 0; // Dimension 2 - Autoestima (Cuenta Respuestas)
$d3 = 0; // Dimension 3 - Valores (Cuenta Respuestas)
$d4 = 0; // Dimension 4 - Manejo de Conflictos (Cuenta Respuestas)
$d5 = 0; // Dimension 5 - Cooperacion y Pertenencia (Cuenta Respuestas)
$d6 = 0; // Dimension 6 - Proteccion y Cuidados (Cuenta Respuestas)
$d7 = 0; // Dimension 7 - Manejo de la Convivencia (Cuenta Respuestas)

$NC_1 = 0; // CANTIDAD ESTUDIANTES <> null Identidad (Nulo)
$NC_2 = 0; // CANTIDAD ESTUDIANTES <> null Autoestima (Nulo)
$NC_3 = 0; // CANTIDAD ESTUDIANTES <> null Valores (Nulo)
$NC_4 = 0; // CANTIDAD ESTUDIANTES <> null Manejo de Conflictos (Nulo)
$NC_5 = 0; // CANTIDAD ESTUDIANTES <> null Cooperacion y Pertenencia (Nulo)
$NC_6 = 0; // CANTIDAD ESTUDIANTES <> null Proteccion y Cuidados (Nulo)
$NC_7 = 0; // CANTIDAD ESTUDIANTES <> null Manejo de la Convivencia (Nulo)

$CA_1 = 0; // CANTIDAD ESTUDIANTES <= 1 Identidad (Preocupante)
$CA_2 = 0; // CANTIDAD ESTUDIANTES <= 1 Autoestima (Preocupante)
$CA_3 = 0; // CANTIDAD ESTUDIANTES <= 1 Valores (Preocupante)
$CA_4 = 0; // CANTIDAD ESTUDIANTES <= 1 Manejo de Conflictos (Preocupante)
$CA_5 = 0; // CANTIDAD ESTUDIANTES <= 1 Cooperacion y Pertenencia (Preocupante)
$CA_6 = 0; // CANTIDAD ESTUDIANTES <= 1 Proteccion y Cuidados (Preocupante)
$CA_7 = 0; // CANTIDAD ESTUDIANTES <= 1 Manejo de la Convivencia (Preocupante)

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

$PEA_1 = 0; // PORCENTAJE SI EJE Identidad
$PEA_2 = 0; // PORCENTAJE SI EJE Autoestima
$PEA_3 = 0; // PORCENTAJE SI EJE Valores
$PEA_4 = 0; // PORCENTAJE SI EJE Manejo de Conflictos
$PEA_5 = 0; // PORCENTAJE SI EJE Cooperacion y Pertenencia
$PEA_6 = 0; // PORCENTAJE SI EJE Proteccion y Cuidados
$PEA_7 = 0; // PORCENTAJE SI EJE Manejo de la Convivencia

$PEP_1 = 0; // PORCENTAJE NO EJE Identidad
$PEP_2 = 0; // PORCENTAJE NO EJE Autoestima
$PEP_3 = 0; // PORCENTAJE NO EJE Valores
$PEP_4 = 0; // PORCENTAJE NO EJE Manejo de Conflictos
$PEP_5 = 0; // PORCENTAJE NO EJE Cooperacion y Pertenencia
$PEP_6 = 0; // PORCENTAJE NO EJE Proteccion y Cuidados
$PEP_7 = 0; // PORCENTAJE NO EJE Manejo de la Convivencia

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
$res = $cliente->consulta_alumnos_de_evaluacion($_GET["eval"]);

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
	if ($d1 <= 1) $NC_1++;
	if ($d2 <= 1) $NC_2++;
	if ($d3 <= 1) $NC_3++;
	if ($d4 <= 1) $NC_4++;
	if ($d5 <= 1) $NC_5++;
	if ($d6 <= 1) $NC_6++;
	if ($d7 <= 1) $NC_7++;
	
	if ($d1 > 1) $CA_1++;
	if ($d2 > 1) $CA_2++;
	if ($d3 > 1) $CA_3++;
	if ($d4 > 1) $CA_4++;
	if ($d5 > 1) $CA_5++;
	if ($d6 > 1) $CA_6++;
	if ($d7 > 1) $CA_7++;
	$i++;
}

/*RESULTADO EVALUACION 2*/
if ($NC_1 == 0) $PEP_1 = 0; else $PEP_1 = ($NC_1 / $i) * 100;
if ($NC_2 == 0) $PEP_2 = 0; else $PEP_2 = ($NC_2 / $i) * 100;
if ($NC_3 == 0) $PEP_3 = 0; else $PEP_3 = ($NC_3 / $i) * 100;
if ($NC_4 == 0) $PEP_4 = 0; else $PEP_4 = ($NC_4 / $i) * 100;
if ($NC_5 == 0) $PEP_5 = 0; else $PEP_5 = ($NC_5 / $i) * 100;
if ($NC_6 == 0) $PEP_6 = 0; else $PEP_6 = ($NC_6 / $i) * 100;
if ($NC_7 == 0) $PEP_7 = 0; else $PEP_7 = ($NC_7 / $i) * 100;

if ($CA_1 == 0) $PEA_1 = 0; else $PEA_1 = ($CA_1 / $i) * 100;
if ($CA_2 == 0) $PEA_2 = 0; else $PEA_2 = ($CA_2 / $i) * 100;
if ($CA_3 == 0) $PEA_3 = 0; else $PEA_3 = ($CA_3 / $i) * 100;
if ($CA_4 == 0) $PEA_4 = 0; else $PEA_4 = ($CA_4 / $i) * 100;
if ($CA_5 == 0) $PEA_5 = 0; else $PEA_5 = ($CA_5 / $i) * 100;
if ($CA_6 == 0) $PEA_6 = 0; else $PEA_6 = ($CA_6 / $i) * 100;
if ($CA_7 == 0) $PEA_7 = 0; else $PEA_7 = ($CA_7 / $i) * 100;
/*FIN RESULTADO EVALUACION 2*/

/*EVALUACION 1*/
if ($NC_1_2 == 0) $PEP_1_2 = 0; else $PEP_1_2 = ($NC_1_2 / $i_2) * 100;
if ($NC_2_2 == 0) $PEP_2_2 = 0; else $PEP_2_2 = ($NC_2_2 / $i_2) * 100;
if ($NC_3_2 == 0) $PEP_3_2 = 0; else $PEP_3_2 = ($NC_3_2 / $i_2) * 100;
if ($NC_4_2 == 0) $PEP_4_2 = 0; else $PEP_4_2 = ($NC_4_2 / $i_2) * 100;
if ($NC_5_2 == 0) $PEP_5_2 = 0; else $PEP_5_2 = ($NC_5_2 / $i_2) * 100;
if ($NC_6_2 == 0) $PEP_6_2 = 0; else $PEP_6_2 = ($NC_6_2 / $i_2) * 100;
if ($NC_7_2 == 0) $PEP_7_2 = 0; else $PEP_7_2 = ($NC_7_2 / $i_2) * 100;

if ($CA_1_2 == 0) $PEA_1_2 = 0; else $PEA_1_2 = ($CA_1_2 / $i_2) * 100;
if ($CA_2_2 == 0) $PEA_2_2 = 0; else $PEA_2_2 = ($CA_2_2 / $i_2) * 100;
if ($CA_3_2 == 0) $PEA_3_2 = 0; else $PEA_3_2 = ($CA_3_2 / $i_2) * 100;
if ($CA_4_2 == 0) $PEA_4_2 = 0; else $PEA_4_2 = ($CA_4_2 / $i_2) * 100;
if ($CA_5_2 == 0) $PEA_5_2 = 0; else $PEA_5_2 = ($CA_5_2 / $i_2) * 100;
if ($CA_6_2 == 0) $PEA_6_2 = 0; else $PEA_6_2 = ($CA_6_2 / $i_2) * 100;
if ($CA_7_2 == 0) $PEA_7_2 = 0; else $PEA_7_2 = ($CA_7_2 / $i_2) * 100;
/*FIN EVALUACION 1*/

$cliente->cerrar_conn();
?>
<!DOCTYPE html>
<html>
	<head>
    	<?php include_once("../head.php"); ?>
    	<script type="text/javascript">
    		function printDiv(divName) {
		    var printContents = document.getElementById(divName).innerHTML;
		    var originalContents = document.body.innerHTML;

		    document.body.innerHTML = printContents;

		    window.print();

		    document.body.innerHTML = originalContents;
		}
    	</script>
	</head>
	<body>
		<?php include_once("../top-menu.php"); ?>
		<div class='container-fluid'>
			<div class='row'>
				<?php include("../menu.php"); ?>
				<div id='reporte' class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
					<h2 class='sub-header'>
						Resultado Curso por Eje - Evaluación <?php if ($eval_numero == 1) echo "Inicial"; elseif ($eval_numero == 2) echo "Final"; ?>
					</h2>

					<p><b>Introducción</b></p>

					<p>
						<b>Ejes evaluados:</b>
						<br>
						<ul>
							<li>Identidad: busca que los niños(as) logren reconocer sus fortalezas, habilidades, dificultades, gustos e intereses.</li>
							<li>Autoestima: se enfoca en que los niños(as) se reconozcan como alguien único, valioso(a) y distinto, que merece ser bien tratado por quienes lo rodean.</li>
							<li>Valores: se centra en el desarrollo del respeto, empatía, como valores fundamentales de la convivencia con otros, junto con la gratitud, tolerancia y capacidad para pedir disculpas.</li>
							<li>Manejo de conflictos: se orienta a que los estudiantes aprendan a resolver conflictos de forma pacífica, prime el buen trato en sus relaciones, y logren pedir ayuda de sus profesores para mediar cuando corresponda.</li>
							<li>Cooperación y pertenencia: busca que los niños(as) establezcan relaciones cooperativas, solidarias y de confianza, primando la lógica del bien común. Asimismo, se evalúa si sienten que el ambiente del curso les permite compartir emociones, sentirse contenidos y parte del grupo.</li>
							<li>Jerarquías protectoras: se promueve que los profesores cumplan un rol de protección y justicia, donde se explicitan las normas y se fomente el desarrollo y el cuidado de todos los miembros del curso. Se presentan resultados en dos subejes: “Protección y cuidado” y “Manejo de la convivencia”.</li>
						</ul>
					</p>
					<p>
						<b>Niveles de desarrollo  en las que se presentan los resultados:</b>
						<br>
						<ul>
							<li>Preocupante: no se han logrado consolidar las habilidades del eje en cuestión, mostrando logros poco consistentes o aislados. En estos casos pueden presentarse actitudes o conductas que están dañando el clima y la convivencia escolar.</li>
							<li>En Desarrollo: las habilidades del eje están en desarrollo, algunas de ellas más desarrolladas y otras menos, pero aún falta que se consoliden como aprendizajes.</li>
							<li>Adecuado: las habilidades evaluadas se encuentran desarrolladas de acuerdo a lo esperado, y se han consolidado como aprendizajes.</li>
						</ul>
					</p>

					<p>
						<b>Descripción de tipos de reporte:</b>
						<br>
						<ul>
							<li>Reporte del curso por nivel de desarrollo en cada eje: este reporte entrega información sobre cuántos estudiantes se encuentran en cada nivel de desarrollo en cada uno de los ejes evaluados, y las afirmaciones que en cada eje se encuentran en nivel “Preocupante”.</li>
							<li>Reporte por afirmación: al ver qué respondieron los alumnos en cada afirmación, podrá conocer qué aspectos específicos de cada eje aparecen más débiles y cuáles más fortalecidos.</li>
						</ul>
					</p>

					<p>
						<b>Descripción:</b> 
						<br>
						En este reporte, se da información más detallada por eje, mostrando el porcentaje de alumnos y la cantidad de alumnos (entre paréntesis) que se encuentra en cada categoría (Preocupante, En Desarrollo y Adecuado).
						<br>
						Estos resultados brindan información detallada de cómo responden los alumnos. Como referencia para la interpretación, un resultado ideal sería que una gran cantidad de estudiantes se encuentre en el nivel “Adecuado” y muy pocos o ninguno en “Preocupante”. Aquellos ejes en que hay más de un 20% de estudiantes en el nivel Preocupante, se indican a continuación con un asterisco y en color rojo. Estos son ejes que habría que trabajar prontamente con mayor profundidad.
					</p>

					<p>
						<b>Usos posibles:</b> 
						<br>
						Estos resultados le pueden servir para identificar en qué ejes hay una proporción importante de estudiantes en el nivel “Preocupante”, por tanto alertando de áreas que requieren volver a trabajarse en mayor profundidad.
					</p>

					<p><b>Resultado</b></p>
					<div class='table-responsive'>
						<table id='json-table' class='tablesorter table table-bordered'>
							<thead>
								<tr>
									<th>Unidad</th>
									<th>Eje</th>
									<th>Preocupante</th>
									<th>Adecuado</th>
									<th>Afirmaciones en nivel "Preocupante"</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td rowspan='2'>1</td>
									<td <?php if ($PEP_1 > 20) echo "class='danger'"; ?>>
										Identidad<?php if ($PEP_1 > 20) echo "*"; ?>
									</td>
									<td <?php if ($PEP_1 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEP_1, 0, PHP_ROUND_HALF_DOWN) . "% ({$NC_1})"; ?>
										<?php if (($PEP_1_2 - $PEP_1) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEP_1_2 - $PEP_1) < 10 && ($PEP_1_2 - $PEP_1) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEP_1_2 - $PEP_1) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_1 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEA_1, 0, PHP_ROUND_HALF_DOWN) . "% ({$CA_1})"; ?>
										<?php if (($PEA_1_2 - $PEA_1) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEA_1_2 - $PEA_1) < 10 && ($PEA_1_2 - $PEA_1) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEA_1_2 - $PEA_1) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_1 > 20) echo "class='danger'"; ?> align='center'>
										<?php echo $NC_2; ?>
									</td>
								</tr>
								<tr>
									<td <?php if ($PEP_2 > 20) echo "class='danger'"; ?>>
										Autoestima<?php if ($PEP_2 > 20) echo "*"; ?>
									</td>
									<td <?php if ($PEP_2 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEP_2, 0, PHP_ROUND_HALF_DOWN) . "% ({$NC_2})"; ?>
										<?php if (($PEP_2_2 - $PEP_2) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEP_2_2 - $PEP_2) < 10 && ($PEP_2_2 - $PEP_2) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEP_2_2 - $PEP_2) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_2 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEA_2, 0, PHP_ROUND_HALF_DOWN) . "% ({$CA_2})"; ?>
										<?php if (($PEA_2_2 - $PEA_2) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEA_2_2 - $PEA_2) < 10 && ($PEA_2_2 - $PEA_2) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEA_2_2 - $PEA_1) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_2 > 20) echo "class='danger'"; ?> align='center'>
										<?php echo $NC_2; ?>
									</td>
								</tr>
								<tr>
									<td rowspan='5'>2</td>
									<td <?php if ($PEP_3 > 20) echo "class='danger'"; ?>>
										Valores<?php if ($PEP_3 > 20) echo "*"; ?>
									</td>
									<td <?php if ($PEP_3 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEP_3, 0, PHP_ROUND_HALF_DOWN) . "% ({$NC_3})"; ?>
										<?php if (($PEP_3_2 - $PEP_3) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEP_3_2 - $PEP_3) < 10 && ($PEP_3_2 - $PEP_3) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEP_3_2 - $PEP_3) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_3 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEA_3, 0, PHP_ROUND_HALF_DOWN) . "% ({$CA_3})"; ?>
										<?php if (($PEA_3_2 - $PEA_3) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEA_3_2 - $PEA_3) < 10 && ($PEA_3_2 - $PEA_3) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEA_3_2 - $PEA_3) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_3 > 20) echo "class='danger'"; ?> align='center'>
										<?php echo $NC_3; ?>
									</td>
								</tr>
								<tr>
									<td <?php if ($PEP_4 > 20) echo "class='danger'"; ?>>
										Manejo de Conflictos<?php if ($PEP_4 > 20) echo "*"; ?>
									</td>
									<td <?php if ($PEP_4 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEP_4, 0, PHP_ROUND_HALF_DOWN) . "% ({$NC_4})"; ?>
										<?php if (($PEP_4_2 - $PEP_4) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEP_4_2 - $PEP_4) < 10 && ($PEP_4_2 - $PEP_4) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEP_4_2 - $PEP_4) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_4 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEA_4, 0, PHP_ROUND_HALF_DOWN) . "% ({$CA_4})"; ?>
										<?php if (($PEA_4_2 - $PEA_4) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEA_4_2 - $PEA_4) < 10 && ($PEA_4_2 - $PEA_4) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEA_4_2 - $PEA_4) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_4 > 20) echo "class='danger'"; ?> align='center'>
										<?php echo $NC_4; ?>
									</td>
								</tr>
								<tr>
									<td <?php if ($PEP_5 > 20) echo "class='danger'"; ?>>
										Cooperación y Pertenencia<?php if ($PEP_5 > 20) echo "*"; ?>
									</td>
									<td <?php if ($PEP_5 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEP_5, 0, PHP_ROUND_HALF_DOWN) . "% ({$NC_5})"; ?>
										<?php if (($PEP_5_2 - $PEP_5) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEP_5_2 - $PEP_5) < 10 && ($PEP_5_2 - $PEP_5) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEP_5_2 - $PEP_5) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_5 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEA_5, 0, PHP_ROUND_HALF_DOWN) . "% ({$CA_5})"; ?>
										<?php if (($PEA_5_2 - $PEA_5) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEA_5_2 - $PEA_5) < 10 && ($PEA_5_2 - $PEA_5) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEA_5_2 - $PEA_5) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_5 > 20) echo "class='danger'"; ?> align='center'>
										<?php echo $NC_5; ?>
									</td>
								</tr>
								<tr>
									<td <?php if ($PEP_6 > 20) echo "class='danger'"; ?>>
										Jerarquías protectoras Subeje: Protección y cuidado<?php if ($PEP_6 > 20) echo "*"; ?>
									</td>
									<td <?php if ($PEP_6 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEP_6, 0, PHP_ROUND_HALF_DOWN) . "% ({$NC_6})"; ?>
										<?php if (($PEP_6_2 - $PEP_6) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEP_6_2 - $PEP_6) < 10 && ($PEP_6_2 - $PEP_6) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEP_6_2 - $PEP_6) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_6 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEA_6, 0, PHP_ROUND_HALF_DOWN) . "% ({$CA_6})"; ?>
										<?php if (($PEA_6_2 - $PEA_6) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEA_6_2 - $PEA_6) < 10 && ($PEA_6_2 - $PEA_6) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEA_6_2 - $PEA_6) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_6 > 20) echo "class='danger'"; ?> align='center'>
										<?php echo $NC_6; ?>
									</td>
								</tr>
								<tr>
									<td <?php if ($PEP_7 > 20) echo "class='danger'"; ?>>
										Jerarquías protectoras Subeje: Manejo de la Convivencia<?php if ($PEP_7 > 20) echo "*"; ?>
									</td>
									<td <?php if ($PEP_7 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEP_7, 0, PHP_ROUND_HALF_DOWN) . "% ({$NC_7})"; ?>
										<?php if (($PEP_7_2 - $PEP_7) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEP_7_2 - $PEP_7) < 10 && ($PEP_7_2 - $PEP_7) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEP_7_2 - $PEP_7) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_7 > 20) echo "class='danger'"; ?>>
										<?php echo round($PEA_7, 0, PHP_ROUND_HALF_DOWN) . "% ({$CA_7})"; ?>
										<?php if (($PEA_7_2 - $PEA_7) >= 10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
										<?php } if (($PEA_7_2 - $PEA_7) < 10 && ($PEA_7_2 - $PEA_7) > -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
										<?php } if (($PEA_7_2 - $PEA_7) <= -10 && $eval_numero == 2) { ?>
										<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
										<?php } ?>
									</td>
									<td <?php if ($PEP_7 > 20) echo "class='danger'"; ?> align='center'>
										<?php echo $NC_7; ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<button class='btn btn-info' onclick='printDiv("reporte");'>Imprimir</button>
				</div>
			</div>
		</div>
	</body>
</html>