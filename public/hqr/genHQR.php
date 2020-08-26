
		<?php
			header("Content-type: image/png");
		//Parámetros iniciales
			//Obtener parámetros
			$id = 0;
			$str_id = $bits_ex = $type_tmplt = "";

			$p_id = $p_name = $p_lname = $full_name = "";
			if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["lastname"]) && isset($_POST["type"])){
				$p_id = $_POST["id"];
				$p_name = $_POST["name"];
				$p_lname = $_POST["lastname"];
				$p_type = $_POST["type"];
				if (is_numeric($p_id) && is_string($p_name) && is_string($p_lname)){
					if (strlen(strval($p_id)) == 7 && strlen($p_name) > 0 && strlen($p_lname) > 0){
						$id = $p_id;
						$str_id = strval($id);
						$full_name = $p_name." ".$p_lname;
						$p_name = substr($p_name, 0, 1);
						$p_lname = substr($p_lname, 0, 1);
						$type_tmplt = strtolower($p_type);
					}
				}
			}
			$img = "";
			switch($type_tmplt){
				case "s":
					$img = @imagecreatefrompng("template_student.png");
					break;
				case "i":
					$img = @imagecreatefrompng("template_instructor.png");
					break;
			}
			$color_white = imagecolorallocate($img, 255, 255, 255);
			$color_gray = imagecolorallocate($img, 105, 105, 105);
			$color_red = imagecolorallocate($img, 255, 0, 0);
			$color_blue = imagecolorallocate($img, 0, 0, 255);

			$hqr_radius = 405;
			$hqr_margin = $hqr_radius * 0.046;
			$point_center_x = 550;
			$point_center_y = 695;
			$circle_radius = $hqr_radius * 0.24;
			$ring_num = 3;
			$ring_radius = $hqr_radius * 0.178;

		//Funciones auxiliares
			function draw_circle_filled(int $x, int $y, int $radius, $clr){
				global $img;
				$c = coor($x, $y);
				imagefilledellipse($img, $c[0], $c[1], $radius * 2, $radius * 2, $clr);
			}

			function draw_circle(int $x, int $y, int $radius, int $border, $clr){
				global $img, $color_white;
				$c = coor($x, $y);
				$border /= 2;
				$wd = $radius - $border;
				imagefilledellipse($img, $c[0], $c[1], $radius * 2, $radius * 2, $clr);
				imagefilledellipse($img, $c[0], $c[1], $wd * 2, $wd * 2, $color_white);
			}

			function draw_text(int $x, int $y, int $size, string $txt, $clr){
				global $img;
				$c = coor($x, $y);
				imagettftext($img, $size, 0, $c[0], $c[1], $clr, "SourceSansPro.ttf", $txt);
			}

			function coor(int $x, int $y){
				global $point_center_x, $point_center_y;
				$rp = array($point_center_x + $x, $point_center_y - $y);
				return $rp;
			}

			function rotate_point(int $x, int $y, float $ang){
				$ang = deg2rad($ang);
				$rx = $x * cos($ang) - $y * sin($ang);
				$ry = $x * sin($ang) + $y * cos($ang);
				$rp = array($rx, $ry);
				return $rp;
			}

			function fill_zeros(string $txt, int $sz){
				$answ = "";
				$z = $sz - strlen($txt);
				for ($i = 0; $i < $z; $i++){
					$answ = $answ."0";
				}
				$answ = $answ.$txt;
				return $answ;
			}

			function dec_to_bin(int $dec){
				$bin = "";
				while($dec > 1){
					$aux = $dec % 2;
					$bin = $bin.$aux;
					$dec = floor($dec / 2);
				}
				$bin = $bin.$dec;
				$answ = "";
				for ($i = strlen($bin) - 1; $i >= 0; $i--){
					$aux = substr($bin, $i, 1);
					$answ = $answ.$aux;
				}
				return $answ;
			}

			function char_to_num($chr){
				$alphabeat = "abcdefghijklmnñopqrstuvwxyz";
				$k = 0;
				for ($i = 0; $i < strlen($alphabeat); $i++){
					if (substr($alphabeat, $i, 1) == $chr){
						$k = $i;
						break;
					}
				}
				return $k;
			}

		//Proceso
			if (strlen($str_id) == 7){
				//Cifrar ID a 60 bits
				$id_len = 0;
				$code = fill_zeros(dec_to_bin($id), 24);
				if (strlen($str_id) == 7){
					for ($n = 0; $n < 10; $n++){
						$cnt = 0;
						for ($c = 0; $c < strlen($str_id); $c++){
							if (substr($str_id, $c, 1) == strval($n)){
								$cnt++;
								$id_len += $n;
							}
						}
						$code = $code.fill_zeros(dec_to_bin($cnt), 3);
					}
				}
				$code = $code.fill_zeros(dec_to_bin($id_len), 6);
				//Unir ID con bits nulos
				$bits_null = array(7, 8, 34, 35, 36, 37, 38, 57, 58, 59, 60);
				$bits_array = array();
				$code_index = -1;
				for ($i = 0; $i < 71; $i++){
					$sentinel = false;
					for ($n = 0; $n < count($bits_null); $n++){
						if ($i == $bits_null[$n]){
							array_push($bits_array, -1);
							$sentinel = true;
							break;
						}
					}
					if ($sentinel == false){
						$code_index++;
						array_push($bits_array, substr($code, $code_index, 1));
					}
				}
				//Definir anillos de guía
				$ring_array = array();
				$tmp = $hqr_radius - ($hqr_margin * 0.5) * 2;
				for ($r = $ring_num; $r > 0; $r--){
					array_push($ring_array, $tmp - $ring_radius * 0.5);
					//draw_circle(0, 0, $tmp, 2, $color_blue);
					$tmp -= $ring_radius;
				}
				//Dibujar bits
				$b = -1;
				$lim = 360;
				for ($index = 0; $index < $ring_num; $index++){ //Arreglar bits
					$ring_perim = $ring_array[$index] * 2 * M_PI;
					$ring_bits = floor($ring_perim / $ring_radius);
					$angle_step = $lim / $ring_bits;
					$angle_count = -$angle_step;
					for ($n = 0; $n < $ring_bits; $n++){
						$b++;
						$angle_count += $angle_step;
						$rp = rotate_point($ring_array[$index], 0, $angle_count);
						if ($bits_array[$b] == 1){
							draw_circle_filled($rp[0], $rp[1], $ring_radius * 0.5, $color_gray);
						}
						//draw_text($rp[0], $rp[1], $ring_radius * 0.15, $b, $color_red); //Ver número de cada bit
					}
				}
				//Crear círculo auxiliar
				$circle_radius = ($ring_array[0] - $ring_array[2]) * 0.75;
				draw_circle_filled(0, $ring_array[2], $circle_radius, $color_gray);

				//Dibujar nombre
				if (strlen($code) == 60){
					$text_box = imagettfbbox(40, 0, "SourceSansPro.ttf", $full_name);
					$text_width = $text_box[2]-$text_box[0];
					draw_text(-($text_width / 2), -600, 40, $full_name, $color_gray);
					//draw_text(-1100, 750, 45, $code, $color_red); //Ver código completo
				}

			}

		//Cargar y destruir recurso
			imagepng($img, "../images/participants/tmp_".$str_id.".png");
			$ftp_connect = ftp_ssl_connect("hawksoftware.com.mx");
		  $ftp_login = ftp_login($ftp_connect, "hawkdemy@hawksoftware.com.mx", "6poder6leoncito6");
			
			ftp_close($ftp_connect);
			header('Location:'  . '../');



			//imagedestroy($img);
		?>
