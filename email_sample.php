<?php
$to_email="sahi2959@gmail.com";
$subject="test mail";
$msg="hi bro";
$header1="sdf";
$res = mail($to_email,$subject,$msg,$header1);
if ($res == TRUE)
{
    echo "yes";
}
else
{
    echo "no";
}
?>