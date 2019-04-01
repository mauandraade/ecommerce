<?php

namespace Hcode;

use Rain\Tpl; // classe rain proprio do tpl que é uma classe o rain e o namespace

class Page{
    private $tpl;
    private $options = [];
    private $default = [
        "data" =>[]
    ];

    public function __construct($opts = array()){
       
       $this->options = array_merge($this->default, $opts);// array_merge mescla dois array
       
        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/ecommerce/vendor/views/",// document root vai trazer o diretorio root
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/ecommerce/vendor/views-cache/",
            "debug"         => false // definido como falso para melhorar a velocidade 
           );
               
           Tpl::configure($config);
           	// create the Tpl object
             $this->tpl = new Tpl;
             $this->setData($this->options["data"]);
             $this->tpl->draw("header");     
    }

    private function setData($data = array())
    {
        foreach ($this->options["data"] as $key => $value) {
            $this->tpl->assign($key, $value);
        }
    }

    public function setTpl($name, $data = array(), $returnHTML = false)
    {
        $this->setData($data);

        return $this->tpl->draw($name, $returnHTML);
    }


    public function __destruct(){
        if ($this->options["footer"] === true) $this->tpl->draw("footer");
    }
}// fim slass


?>