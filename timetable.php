<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1" cellspacing="0" width="80%">
		<tr>
			<td>Time/Day</td> <td>M</td> <td>T</td> <td>W</td> <td>Th</td> <td>F</td>
		</tr>
		<tr>
			<td>07:30 AM</td> <td rowspan="3"></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>08:00 AM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>09:00 AM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>09:30 AM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>10:00 AM</td> <td ></td> <td></td> <td rowspan="3"></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>10:30 AM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>11:00 AM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>11:30 AM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>12:00 PM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>12:30 PM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>01:00 PM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>01:30 PM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>02:00 PM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>02:30 PM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>03:00 PM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>03:30 PM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>04:00 PM</td> <td ></td> <td rowspan="3"></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>04:30 PM</td> <td></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		<tr>
			<td>05:00 PM</td> <td ></td> <td></td> <td></td> <td></td> <td></td>
		</tr>
		
</table>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$('table tr td[rowspan]').each(function(){

    		var indexofThis,indexofColSpan,numRows;
		  
		            indexofThis =$('table tr td[rowspan]').index(this);
		            indexofColSpan = $('td',this).index($('td[rowspan]',this));
		            numRows = $('td[rowspan]',this).attr('rowspan');

		            $('table tr td[rowspan]:gt('+indexofThis+')').each(function(){
		           	 $('td:eq('+indexofColSpan+')',this).remove();
					});
		});



});
</script>
</body>
</html>

