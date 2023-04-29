<?
$name="getUser";
$property=preg_replace("/[^0-9a-zA-Z]/","",substr($name,3));
echo $property;
$property=strtolower(preg_replace('/\B([A-Z])/','_$1',$property));
echo $property;

?>