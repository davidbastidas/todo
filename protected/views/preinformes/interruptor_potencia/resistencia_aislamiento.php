<?php $array = json_decode( $datos, true );
$style_centro='style="text-align: center;"';
$style_centro_middel='style="text-align: center;vertical-align: middle;"';
$estilo_ok='style="color:green;font-weight:bold;text-decoration:underline;text-align: center;"';
$estilo_bad='style="color:red;font-weight:bold;text-decoration:underline;text-align: center;"';
$table_conversion=array();
$data=array('c'=>'5', 'f'=>'41', 'oil'=>'0.36', 'solid'=>'0.50');
array_push($table_conversion, $data);

$data=array('c'=>'10', 'f'=>'50', 'oil'=>'0.50', 'solid'=>'0.63');
array_push($table_conversion, $data);
$data=array('c'=>'15', 'f'=>'59', 'oil'=>'0.75', 'solid'=>'0.81');
array_push($table_conversion, $data);
$data=array('c'=>'20', 'f'=>'68', 'oil'=>'1.00', 'solid'=>'1.00');
array_push($table_conversion, $data);
$data=array('c'=>'25', 'f'=>'77', 'oil'=>'1.40', 'solid'=>'1.25');
array_push($table_conversion, $data);
$data=array('c'=>'30', 'f'=>'86', 'oil'=>'1.98', 'solid'=>'1.58');
array_push($table_conversion, $data);
$data=array('c'=>'35', 'f'=>'95', 'oil'=>'2.80', 'solid'=>'2.00');
array_push($table_conversion, $data);
$data=array('c'=>'40', 'f'=>'104', 'oil'=>'3.95', 'solid'=>'2.50');
array_push($table_conversion, $data);
$data=array('c'=>'45', 'f'=>'113', 'oil'=>'5.60', 'solid'=>'3.15');
array_push($table_conversion, $data);
$data=array('c'=>'50', 'f'=>'122', 'oil'=>'7.85', 'solid'=>'3.98');
array_push($table_conversion, $data);

$temperatura = json_decode( $temperaturas, true );
$calculo="";
?>
<h4>Resistencia de Aislamiento</h4>
<table class="border">
	<thead>
		<tr>
			<th <?php echo $style_centro?>>FASE</th>
			<th <?php echo $style_centro?>>Linea</th>
			<th <?php echo $style_centro?>>Tierra</th>
			<th <?php echo $style_centro?>>Lectura G&#937;</th>
			<th <?php echo $style_centro?>>Lectura G&#937;&#64;20&#176;C</th>
			<th <?php echo $style_centro?>>Estado IT</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td <?php echo $style_centro_middel?> rowspan="4">R</td>
			<td <?php echo $style_centro?>>1</td>
			<td <?php echo $style_centro?>>2</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['r_lectura12']?>
			</td>
			<?php
			if($array['tabla'][0]['r_gc12']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['r_gc12']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['r_gc12']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>1</td>
			<td <?php echo $style_centro?>>G</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['r_lectura1g']?>
			</td>
			<?php
			if($array['tabla'][0]['r_gc1g']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['r_gc1g']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['r_gc1g']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>2</td>
			<td <?php echo $style_centro?>>G</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['r_lectura2g']?>
			</td>
			<?php
			if($array['tabla'][0]['r_gc2g']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['r_gc2g']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['r_gc2g']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>1</td>
			<td <?php echo $style_centro?>>G</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['r_lectura1gb']?>
			</td>
			<?php
			if($array['tabla'][0]['r_gc1gb']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['r_gc1gb']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['r_gc1gb']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Closed</td>
		</tr>
		
		<tr>
			<td <?php echo $style_centro_middel?> rowspan="4">S</td>
			<td <?php echo $style_centro?>>3</td>
			<td <?php echo $style_centro?>>4</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['s_lectura34']?>
			</td>
			<?php
			if($array['tabla'][0]['s_gc34']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['s_gc34']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['s_gc34']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>3</td>
			<td <?php echo $style_centro?>>G</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['s_lectura3g']?>
			</td>
			<?php
			if($array['tabla'][0]['s_gc3g']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['s_gc3g']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['s_gc3g']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>4</td>
			<td <?php echo $style_centro?>>G</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['s_lectura4g']?>
			</td>
			<?php
			if($array['tabla'][0]['s_gc4g']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['s_gc4g']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['s_gc4g']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>3</td>
			<td <?php echo $style_centro?>>G</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['s_lectura3gb']?>
			</td>
			<?php
			if($array['tabla'][0]['s_gc3gb']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['s_gc3gb']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['s_gc3gb']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Closed</td>
		</tr>

		<tr>
			<td <?php echo $style_centro_middel?> rowspan="4">T</td>
			<td <?php echo $style_centro?>>5</td>
			<td <?php echo $style_centro?>>6</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['t_lectura56']?>
			</td>
			<?php
			if($array['tabla'][0]['t_gc56']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['t_gc56']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['t_gc56']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>5</td>
			<td <?php echo $style_centro?>>G</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['t_lectura5g']?>
			</td>
			<?php
			if($array['tabla'][0]['t_gc5g']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['t_gc5g']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['t_gc5g']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>6</td>
			<td <?php echo $style_centro?>>G</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['t_lectura6g']?>
			</td>
			<?php
			if($array['tabla'][0]['t_gc6g']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['t_gc6g']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['t_gc6g']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>5</td>
			<td <?php echo $style_centro?>>G</td>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][0]['t_lectura5gb']?>
			</td>
			<?php
			if($array['tabla'][0]['t_gc5gb']>=5){?>
			<td <?php echo $estilo_ok?>>
				<?php echo $array['tabla'][0]['t_gc5gb']?>
			</td>
			<?php
			}else{?>
			<td <?php echo $estilo_bad?>>
				<?php echo $array['tabla'][0]['t_gc5gb']?>
			</td>
			<?php }?>
			<td <?php echo $style_centro?>>Closed</td>
		</tr>

	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>