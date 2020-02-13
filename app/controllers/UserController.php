<?php

class UserController extends Controller{

    public function index()
    {
        $user = new User($this->db);
        $this->f3->set('users', $user->all());
        $this->f3->set('view','pages/users.htm');
    }

    public function save()
    {
        $name = $this->f3->get('POST.name');
        $age = $this->f3->get('POST.age');
        $address = $this->f3->get('POST.address');
        $username = $this->f3->get('POST.username');
        $password = $this->f3->get('POST.password');
        $is_active = $this->f3->get('POST.is_active');

        $user = new User($this->db);
        $user->name = $name;
        $user->age = $age;
        $user->address = $address;
        $user->username = $username;
        $user->password = $password;
        $user->is_active = $is_active;
        $user->save();

        $this->f3->reroute('/users');
    }

    public function delete()
    {
        $id = $this->f3->get('PARAMS.id');
        $user = new User($this->db);
        $user->load(array('id=?', $id));
        $user->erase();

        $this->f3->reroute('/users');
    }

    public function find()
    {
        $id = $this->f3->get('PARAMS.id');
        $user = new User($this->db);
        $response = $user->load(array('id=?', $id));
        echo json_encode($response);
    }
}