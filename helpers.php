<?php

if (!function_exists('roundToQuarterHour'))
{
	function roundQuarterHour($time, $format = 'H:i:s')
	{
  		return date($format,  15*60*round(strtotime($time)/60/15));
	}
}