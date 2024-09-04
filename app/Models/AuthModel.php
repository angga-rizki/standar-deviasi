<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model {

    protected $table = 'user';

    public function getUser($username) {        
        return $this->asObject()
                        ->where(['username' => $username])
                        ->first();
    }
}
