<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  padding: 6px;
}
</style>
</head>
<body>
<?php
$result1 ='';
$result2 =''; 
$time=2;
foreach ($voterReports as $voterReport) {
if ($time%2==0) {
$result1 .='<tr>';
$result1 .='<td>'.$voterReport->code.'</td>';
$result1 .='<td>'.$voterReport->part_no.'</td>';
$result1 .='<td>'.$voterReport->Total_Votes.'</td>';
$result1 .='<td>'.$voterReport->Mapped_Votes.'</td>';
$result1 .='</tr>'; 
} 
if ($time%2!=0) {
$result2 .='<tr>'; 
$result2 .='<td>'.$voterReport->code.'</td>';
$result2 .='<td>'.$voterReport->part_no.'</td>';
$result2 .='<td>'.$voterReport->Total_Votes.'</td>';
$result2 .='<td>'.$voterReport->Mapped_Votes.'</td>';
$result2 .='</tr>';
}
$time++; 
}
?>
<table>
<tbody>
<tr>
<td style="width: 662px;background-color: #767d78;color: #fff;text-align: center;"><b>Part Wise--Voter Mapped</b></td>
</tr>
</tbody>
</table>
<table class="table" style="margin-top: 10px">
<tbody>
<tr>
<td>
<table class="table">
<thead>
<tr> 
<th>Assembly Code</th>
<th>Part No.</th>
<th>Total Voter</th>
<th>Total Mapped</th>
</tr>
</thead>
<tbody>
<?php echo $result1; ?>

</tbody>
</table>
</td>
<td>
<table class="table">
<thead>
<tr>
<th>Assembly Code</th>
<th>Part No.</th>
<th>Total Voter</th>
<th>Total Mapped</th>
</tr>
</thead>
<tbody>
<?php echo $result2; ?>

</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</body>
</html>
