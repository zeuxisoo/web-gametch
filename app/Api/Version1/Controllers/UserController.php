<?php
namespace App\Api\Version1\Controllers;

use App\Api\Version1\Bases\ApiController;
use App\Api\Version1\Transformers\UserTransformer;

class UserController extends ApiController {

    public function me() {
        return $this->response->item($this->auth->user(), new UserTransformer);
    }

}
