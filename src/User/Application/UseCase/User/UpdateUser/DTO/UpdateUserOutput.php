<?php

namespace User\Application\UseCase\User\UpdateUser\DTO;

use User\Domain\Model\User;

class UpdateUserOutput
{

    public function __construct(public readonly array $userData)
    {
    }

    public static function createFromModel(User $user): self
    {
        return new static([
            'id'=> $user->id(),
            'name'=>$user->name(),
            'surname'=>$user->surname(),
            'city'=>$user->city(),
            'category'=>$user->category(),
            'age'=>$user->age(),
            'email'=>$user->email(),
            'active'=>$user->active(),
            'password'=>$user->getPassword()
        ]);
    }
}