
<?php 
if(Session::isauthenticated()) {
    Session::loadtemplate("index/calltoaction");
}else{
    //use this to automatically redirect to login if session has'nt been set
    // <script>
    //window.location.href = "<?=get_config('base_path').'login.php';"
    //</script>


     Session::loadtemplate("index/login");
}
Session::loadtemplate("index/photogram") ; ?>
