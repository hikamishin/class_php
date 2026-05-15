<?php

echo "檔案名稱: ".$_FILES["uFile"]["name"]."<br/>";
echo "暫存檔名: ".$_FILES["uFile"]["tmp_name"]."<br/>";
echo "檔案尺寸: ".$_FILES["uFile"]["size"]."<br/>";
echo "檔案種類: ".$_FILES["uFile"]["type"]."<hr/>";

?>