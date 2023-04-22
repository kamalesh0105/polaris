<head><script src="/app/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>Photogram by me</title>
    <link href="/app/assets/dist/css/bootstrap.min.css" rel="stylesheet">

<?// print_r($_SERVER['PHP_SELF']);
print_r($_SERVER['DOCUMENT_ROOT']);?>
<?if(file_exists($_SERVER['DOCUMENT_ROOT']."/app/css/".basename($_SERVER['PHP_SELF'],".php").".css")){echo "success"?>
        <link href="/app/css/<?=basename($_SERVER['PHP_SELF'],".php");?>.css" rel="stylesheet">

<?}else{echo "  error";}?>

<?//}else{echo"error";}?>
<? //print_r(basename($_SERVER["PHP_SELF"],".php"));?>
    
</head>