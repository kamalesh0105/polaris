
<?php 
if(Session::isauthenticated()) {
    Session::loadtemplate("index/calltoaction");
}

Session::loadtemplate("index/photogram") ; ?>
