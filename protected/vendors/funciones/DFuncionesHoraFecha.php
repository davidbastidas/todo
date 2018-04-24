<?php

	function dateDiff($start, $end) {
	
		$start_ts = strtotime($start);
		
		$end_ts = strtotime($end);
		
		$diff = $end_ts - $start_ts;
		
		return round($diff / 3600);
	
	}
	
	//echo dateDiff("2009-12-17 21:11:02", "2009-12-18 21:11:02");
	//echo dateDiff("2013-09-09 09:33:07", "2013-09-09 09:35:46");
	function RestarHoras($horaini,$horafin)
	{
	    $horai=substr($horaini,0,2);
	    $mini=substr($horaini,3,2);
	    //$segi=substr($horaini,6,2);
	 
	    $horaf=substr($horafin,0,2);
	    $minf=substr($horafin,3,2);
	    //$segf=substr($horafin,6,2);
	 
	    $ini=((($horai*60)*60)+($mini*60)/*+$segi*/);
	    $fin=((($horaf*60)*60)+($minf*60)/*+$segf*/);
	 
	    $dif=$fin-$ini;
	 
	    $difh=floor($dif/3600);
	    $difm=floor(($dif-($difh*3600))/60);
	    //$difs=$dif-($difm*60)-($difh*3600);
	    return date("H:i:s",mktime($difh,$difm));
	    //return date("H-i-s",mktime($difh,$difm,$difs));
	}

 	function sumahoras ($hora1,$hora2){
		$hora1=explode(":",$hora1);
		$hora2=explode(":",$hora2);
		$horas=(int)$hora1[0]+(int)$hora2[0];
		$minutos=(int)$hora1[1]+(int)$hora2[1];
		$segundos=(int)$hora1[2]+(int)$hora2[2];
		$horas+=(int)($minutos/60);
		$minutos=(int)($minutos%60)+(int)($segundos/60);
		$segundos=(int)($segundos%60);
		return (intval($horas)<10?'0'.intval($horas):intval($horas)).':'.($minutos<10?'0'.$minutos:$minutos).':'.($segundos<10?'0'.$segundos:$segundos);
	}
	function restarCantidadhoras ($hora1,$hora2){
		$hora1=explode(":",$hora1);
		$hora2=explode(":",$hora2);
		$horas=(int)$hora1[0]-(int)$hora2[0];
		$minutos=(int)$hora1[1]-(int)$hora2[1];
		$segundos=(int)$hora1[2]-(int)$hora2[2];
		if($segundos<0){
			/*
			 * Como nos da un resultado negativo, en el minuendo (3 h 20’ 30’’) 
			 * vamos a quitar 1 minuto de los minutos 
			 * y se lo vamos a sumar a los segundos.
			*/
			$segundos=(int)$hora1[2]+60;
			$minutos=$minutos-1;
			//Volvemos a restar los segundos:
			$segundos=$segundos-(int)$hora2[2];
		}
		if($minutos<0){
			/*
			 * Tenemos el mismo problema que antes. Como nos da un resultado negativo, en el minuendo (3 h 19’ 80’’)
			 *  vamos a quitar 1 hora de las horas y se la vamos a sumar a los minutos. El minuendo quedaría (2 h 79’ 80’’).
			 * */
			$minutos=(int)$hora1[1]+60;
			$horas=$horas-1;
			//Volvemos a restar los minutos:
			$minutos=$minutos-(int)$hora2[1];
		}
		$horas+=(int)($minutos/60);
		$minutos=(int)($minutos%60)-(int)($segundos/60);
		$segundos=(int)($segundos%60);
		return (intval($horas)<10?'0'.intval($horas):intval($horas)).':'.($minutos<10?'0'.$minutos:$minutos).':'.($segundos<10?'0'.$segundos:$segundos);
	}
?>