<?php
namespace MonNameSpace;
/**
 * Class Autoloader
 */
class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class){
    	$class_name = str_replace('MonNameSpace\\' ,'/', $class);
        require  'model/' . $class_name . '.php';
    }

}