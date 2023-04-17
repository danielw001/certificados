<?php
	include('conecta.php');
			if(isset($_POST['enviar'])){
									$displayform=False;
									$dni_raw = $_POST['dni'];
									$dni_size=strlen($dni_raw);									
									$centenas=substr($dni_raw,$dni_size-3,3);
									$miles=substr($dni_raw,$dni_size-6,3);
									$millones=substr($dni_raw,0,$dni_size-6);
									$dni=$millones.".".$miles.".".$centenas;									
									$result = mysqli_query($conexion,"SELECT * FROM inscriptos WHERE dni='".$dni_raw."'");
									$filas_encontradas = mysqli_num_rows($result);								

									echo "<hr/>";

									echo "Filas encontradas: ".$filas_encontradas;

									echo "<hr/>";

									if ($filas_encontradas==0) {								
																echo "<p style='line-height:250%; '>
																		<strong>Error: </strong>
																		El DNI ingresado no se encuentra en la base de datos <br/>																
																		</p>";																
																}else {
																		$row = mysqli_fetch_array($result);
																		$apellidos = $row['apellidos'];								
																		$nombres = $row['nombres'];																		
																		$email = $row['correo'];																											
																		$convocatoria = $row['convocatoria'];
																		$year_convocatoria = $row['year_convocatoria'];
																		$year_certificacion = $row['year_certificacion'];
																		$cantidad_disposiciones = $row['cantidad_disposiciones'];
																		$disposicion_01 = $row['disposicion_01'];
																		$disposicion_02 = $row['disposicion_02'];
																		$dia_certificacion = $row['dia_certificacion'];
																		$mes_certificacion = $row['mes_certificacion'];																																				
																		$url_01 = $row['url_01'];
																		$url_02 = $row['url_02'];
																		$id_certificado = $row['id_certificado'];

																		$_SESSION['dni'] = $dni;
																		$_SESSION['apellidos'] = $apellidos;						
																		$_SESSION['name'] = $nombres;
																		$_SESSION['convocatoria'] = $convocatoria;									
																		$_SESSION['cantidad_disposiciones'] = $cantidad_disposiciones;									
																		$_SESSION['year_convocatoria'] = $year_convocatoria;									
																		$_SESSION['disposicion_01'] = $disposicion_01;									
																		$_SESSION['disposicion_02'] = $disposicion_02;									
																		$_SESSION['dia_certificacion'] = $dia_certificacion;									
																		$_SESSION['mes_certificacion'] = $mes_certificacion;									
																		$_SESSION['year_certificacion'] = $year_certificacion;									
																		$_SESSION['url_01'] = $url_01;
																		$_SESSION['url_02'] = $url_02;
																		$_SESSION['id_certificado'] = $id_certificado;

																		echo "<p class='texto_procesa'>
																					<strong>Nombre:</strong> $nombres $apellidos <br> <strong>DNI: </strong>$dni<br> De acuerdo a nuestros registros usted ha participado como: <br>";
																					echo "Evaluador/a: ";
																					echo "<a class='texto_procesa' target='_blank' href='diploma.php'>Descargar certificado de evaluador/a</a><br>";																												
																				echo "</p>";
																		}//final del else	
									} //final del if isset
?>