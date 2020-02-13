<?php

class User extends DB\SQL\Mapper{
    protected $db;

    public function __construct(DB\SQL $db)
    {
        parent::__construct($db, 'users');
    }

    public function all()
    {
        $this->load();
        return $this->query;
    }

}