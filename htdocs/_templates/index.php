
<?php 
if(Session::isauthenticated()) {
    Session::loadtemplate("index/calltoaction");
}else{
    Session::loadtemplate("index/login");
}

Session::loadtemplate("index/photogram") ; ?>
