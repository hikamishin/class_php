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
//STEP 1
$link =@mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            '',  // 密碼
            'school');  // 預設使用的資料庫名稱

//STEP2
$sql ="SELECT * FROM student";
//STEP3
$result=mysqli_query($link, $sql);

echo "<table border='1'>";
while( $row = mysqli_fetch_assoc($result) ){
    echo "<tr>";
   echo "<td>".$row["No."]."</td><td>".$row["cName"]."</td><td>".$row["eName"]."</td><td>".$row['No']."'>刪除</a></td><td><a href='update.php?sNo=".$row['No']."'>更新</a></td>";
    echo "</tr>";
}
echo "</table>";

//STEP5
mysqli_close($link);
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