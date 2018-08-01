<?php namespace Minichat;


class MiniChat {
    private $config;

    public function __construct(){

        $this->config = include(__DIR__."/../config/app.php");
    }
 }
 ?>