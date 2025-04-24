<?php

namespace App\Policies;

use App\Models\CodeGenModel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CodeGenModelPolicy
{
    public function view(User $user, CodeGenModel $codeGen)
    {
        return $user->id === $codeGen->user_id;
    }

    public function update(User $user, CodeGenModel $codeGen)
    {
        return $user->id === $codeGen->user_id;
    }

    public function delete(User $user, CodeGenModel $codeGen)
    {
        return $user->id === $codeGen->user_id;
    }
}
