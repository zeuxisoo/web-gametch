<?php
namespace App\Repositories;

use App\Bases\AppRepository;
use App\Models\User;

class UserRepository extends AppRepository {

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function createWithRole($input, $role) {
        $user = (new User)->create($input);
        $user->attachRole($role);

        return $user;
    }

}
