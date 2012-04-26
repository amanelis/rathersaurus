<?php
include("db.php");
include("globals.php");
include("functions.php");
$id = $_GET['id'];

if(!isset($id) || empty($id)){
        die("Please select your image!");
}else{
        $query = mysql_query("SELECT * FROM ad_default WHERE id='".$id."'");
        $row = mysql_fetch_array($query);
        $content = $row['image'];
        $type = $row['application'];

        header("Content-type: $type");
        echo $content;
}
?>
