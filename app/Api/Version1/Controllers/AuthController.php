<?php
namespace App\Api\Version1\Controllers;

use Hash;
use JWTAuth;
use Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Api\Version1\Bases\ApiController;
use App\Api\Version1\Requests\AuthSignUpRequest;
use App\Api\Version1\Requests\AuthSignInRequest;
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

    public function signin(AuthSignInRequest $request) {
        $input   = $request->only('account', 'password');
        $account = $input['account'];

       if (filter_var($account, FILTER_VALIDATE_EMAIL) !== false) {
            $input['email'] = $account;
        }else{
            $input['username'] = $account;
        }

        unset($input['account']);

        try {
            $token = JWTAuth::attempt($input);

            if (!$token) {
                throw new AccessDeniedHttpException('invalid credentials');
            }
        } catch (JWTException $e) {
            throw new HttpException('Could not create token');
        }

        return $this->response->array([
            'user'  => Auth::user(),
            'token' => $token,
        ]);
    }

}
