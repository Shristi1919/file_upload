<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserRepository
{
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function getCurrentUserId()
    {
        return Session::get('loginId');
    }
}
