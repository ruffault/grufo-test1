<?php

function generate_calendar($date = '')
{
	if(!$date)
		$date = date('Ymd');

	$page = (isset($_GET['page']) ? $_GET['page'] : '') ;
	$categ = (isset($_GET['categ']) ? $_GET['categ'] : '') ;
	$base_url = "?page=$page&amp;categ=$categ&amp;date=";
	$older_date = olderLogDate();
	$younger_date = youngerLogDate();

	$year = substr($date,0,4);
	$month = substr($date,4,2);
	$days = substr($date,6,2);

	$prev_month=date("Ymd",mktime(0,0,0,$month-1,lastMonthDay($year,$month-1),$year));
	$next_month = date("Ymd",mktime(0, 0, 0, $month + 1, 01, $year));
	
	$first_of_month = gmmktime(0,0,0,$month,1,$year);
	
	$day_names = array( 0 => 'lun',
											1 => 'mar',
											2 => 'mer',
											3 => 'jeu',
											4 => 'ven',
											5 => 'sam',
											6 => 'dim'
										);
	$month_name = array('01' => 'janvier',
											'02' => 'février',
											'03' => 'mars',
											'04' => 'avril',
											'05' => 'mai',
											'06' => 'juin',
											'07' => 'juillet',
											'08' => 'aout',
											'09' => 'septembre',
											'10' => 'octobre',
											'11' => 'novembre',
											'12' => 'décembre'
										 );
	$first_day = 1;
	list($month, $year, $weekday) = explode(',',gmstrftime('%m,%Y,%w',$first_of_month));
	$weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day

	$title   = htmlentities(ucfirst($month_name[$month]))." $year";

	$calendar = "<table id='calendar'>\n<caption>$title</caption>\n<tr>";

	foreach($day_names as $day)
		$calendar .= "<th abbr='$day'>$day</th>";
		
	$calendar .= "</tr>\n<tr>";
	
	if($weekday > 0)
		$calendar .= '<td colspan="'.$weekday.'">&nbsp;</td>'; #initial 'empty' days

	for($day = 1, $days_in_month=gmdate('t', $first_of_month); $day<=$days_in_month; $day++,$weekday++)
	{
		if($weekday == 7)
		{
			$weekday   = 0; #start a new week
			$calendar .= "</tr>\n<tr>";
		}
		if(strlen($day) == 1)
			$day2 = "0$day";
		else
			$day2 = $day;

		$link = "$base_url$year$month$day2";

		$content  = $day;
		
		if ($date != "$year$month$day2")
		{
			if (((int) "$year$month$day2") > ((int) str_replace('-', '',$older_date))-1
			&& ( (int) "$year$month$day2") < ((int) str_replace('-', '',$younger_date))+1 )
			{
				$calendar .= '<td>';
				$calendar .= "<a href='$link'>$content</a>";
				$calendar .= '</td>';
			}
			else
				$calendar .= "<td>$content</td>";			
		}
		else
			$calendar .= "<td id='currentday'>$content</td>";
	}
	
	if($weekday != 7)
		$calendar .= '<td colspan="'.(7 - $weekday).'">&nbsp;</td>';
	
	$calendar .= "</tr><tr>";
	$calendar .= '<td>';

	if (((int) "$year$month") > ((int) str_replace('-', '',substr($older_date,0,7))))
		$calendar .= "<a href='$base_url$prev_month'>&lt;&lt;</a>";
	else
		$calendar .= '&nbsp;';
	$calendar .= '</td>';
	
	$calendar .= "<td>&nbsp;</td>
								 <td>&nbsp;</td>
								 <td>&nbsp;</td>
								 <td>&nbsp;</td>
								 <td>&nbsp;</td>";

	$calendar .= '<td>';
	
	if (((int) "$year$month") < ((int) str_replace('-', '',substr($younger_date,0,7))))
		$calendar .= "<a href='$base_url$next_month'>&gt;&gt;</a>";
	else
		$calendar .= '&nbsp;';

	$calendar .= '</td>';
	
	$calendar .= "</tr>\n</table>\n";
	return $calendar;
}


?>
