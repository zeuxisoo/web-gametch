<?php
namespace App\Api\Version1\Controllers;

use Hash;
use App\Api\Version1\Bases\ApiController;
use App\Api\Version1\Requests\AuthSignUpRequest;
use App\Api\Version1\Transformers\UserTransformer;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;

class AuthController extends ApiController {

    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository) {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function signup(AuthSignUpRequest $request) {
        $input             = $request->only('username', 'email', 'password');
        $input['password'] = Hash::make($input['password']);

        $role = $this->roleRepository->findByName('user');
        $user = $this->userRepository->createWithRole($input, $role);

        return $this->response->item($user, new UserTransformer);
    }

}
