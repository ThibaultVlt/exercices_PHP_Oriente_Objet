<?php
namespace Classes;

class Autoload
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function autoload($class)
    {
        //On récupère dans $class la totalité du namespace de la classe concernée
        //On retire App\
        $class = str_replace(__NAMESPACE__ . '\\', '' , $class);
        //On remplace les \ par /
        $class = str_replace('\\', '/', $class);
        //On vérifie si le fichier existe
        $fichier = __DIR__ . '/' . $class . '.php';
        if(file_exists($fichier)){
            require_once $fichier;
        }
    }
}//Laisser à la fin
