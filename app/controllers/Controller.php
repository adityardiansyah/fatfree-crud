<?php

class Controller{
    protected $f3;
    protected $db;

    public function __construct()
    {
        $this->f3 = Base::instance();
        $this->db = new DB\SQL($this->f3->get('db_dns').$this->f3->get('db_name'),$this->f3->get('db_user'), $this->f3->get('db_pass'));
    }

    public function afterroute()
    {
        echo Template::instance()->render('layout/index.htm');
    }
}