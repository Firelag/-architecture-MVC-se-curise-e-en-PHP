<?php

class View{
    private $_file;
    private $_t;

    public function __construct($action)
    {
        $this->_file = 'view/view'.$action.'.php';
    }
// Génere et affiche la vue   
    public function generate($data)
    {
        $content = $this->generateFile($this->_file, $data);

        $view = $this->generateFile('view/template.php', array('t'=> $this->_t,'content'=> $content));

        echo $view;
    }
//Genere et renvoie le resultat
    private function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);

            ob_start();

            require $file;

            return ob_get_clean();

        }
        else
            throw new Exception('Fichier '.$file.' introuvable');
    }
}


?>