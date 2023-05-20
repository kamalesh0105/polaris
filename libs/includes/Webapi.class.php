<?

class webapi{

    public function __construct()
    {
        if(php_sapi_name()=="cli"){
            //echo "cli";
            global $_site_config;
            $_site_config_path="/var/www/dbconfig.json";
            $_site_config=file_get_contents($_site_config_path);
           // echo $_site_config;
           
        }elseif(php_sapi_name()=="apache2handler"){
            global $_site_config;
            $_site_config_path=dirname(is_link($_SERVER['DOCUMENT_ROOT']) ? readlink($_SERVER['DOCUMENT_ROOT']) : $_SERVER['DOCUMENT_ROOT'])."/dbconfig.json";
            $_site_config=file_get_contents($_site_config_path);
            
        }
        //print("server api:".php_sapi_name());
        Database::get_connection();
    }

    public function initiate_session()
    {
      
        //Session::start();
        
    
    }

}