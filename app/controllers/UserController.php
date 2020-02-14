<?php

class UserController extends Controller{
    use Validate;

    public function getRules()
    {
        return [
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'username' => 'required',
            'password' => 'required',
        ];
    }
    public function index()
    {
        $user = new User($this->db);
        $this->f3->set('users', $user->all());
        $this->f3->set('view','pages/users.htm');
    }

    public function save()
    {
        $data = $this->f3->get('POST');
        $user = new UserController();
        $result = $user->check($data);

        if($result != TRUE){
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
        }else{
            $session = new Session();
            $this->f3->set('SESSION.message','Kolom harus di isi');
            $get_session = $this->f3->get('SESSION.message');
            $this->f3->set('message', $get_session);
            $this->f3->set('view','pages/users.htm');
            // $this->f3->reroute('/users');
        }
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