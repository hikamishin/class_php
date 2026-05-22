<?php

require_once('tcpdf/tcpdf.php');



ob_start();
// // create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set font
$pdf->SetFont('msungstdlight', '', 10);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();


$html = 'TEST';
// // output the HTML content
$pdf->writeHTML($html);
//file send to file address
$path = "/123info.pdf";
//Close and output PDF document
$pdf->Output(__DIR__ .$path, 'D');
//$pdf->Output($No."-tableinfo.pdf", 'D');
ob_end_flush();

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