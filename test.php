<?
$filePath=dirname(__FILE__)."./common/newDB.php";
$string='<?
    putenv("DB_USERNAME=DOOT");
';
file_put_contents($filePath,$string);
//file_put_contents($filePath,'<? \n');
echo 'success!';
?>
