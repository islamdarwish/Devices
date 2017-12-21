<?php
namespace App\Repositories;

use App\User;

class UserRepository
{

    /**
     * @var User
     */
    private $model;

    public function __construct(User $model)
    {

        $this->model = $model;
    }
    public function findByEmailOrCreate($email, $data)
    {
        $user = $this->model->where('email', $email)->first();
        if($user){
            return $user;
        }else{
            return $this->model->create($data);
        }
    }
}