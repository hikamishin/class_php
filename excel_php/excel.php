<html>
<head>
<meta charset="utf-8">
<?php
header("Pragma: public");
header("Expires: 0");
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: inline; filename="applicant.xls";');
header('Content-Transfer-Encoding: binary');
?>
</head>
<body>
<?php
echo "<table>";
echo "<tr>";
echo "<td>NO.</td>";
echo "<td>中文姓名</td>";
echo "<td>英文姓名</td>";
echo "<td>性別</td>";
echo "<td>國籍</td>";
echo "<td>部別</td>";
echo "<td>系所</td>";
echo "</tr>";
echo "</table>";
?>
</body>
</html>