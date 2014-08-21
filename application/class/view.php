<?php

require_once PATH_BASE . '\application\libs\smarty\Smarty.class.php';

class ViewClass extends Smarty {

    private $path;

    public function __construct() {
        parent::__construct();

        $this->path = PATH_BASE.'\application';

        $this->template_dir = $this->path . '\template\\';
        $this->config_dir   = $this->path . '\config\\';
        $this->compile_dir  = $this->path . '\temp\templates_c\\';
        $this->cache_dir    = $this->path . '\temp\cache\\';
    }

}
