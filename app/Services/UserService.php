<?php

namespace App\Services;

use App\Models\User;

/**
 * Class UserService.
 */
class UserService
{
    protected $service;

    public function __construct(User $service)
    {
        $this->service = $service::query();
    }

    public function get_user_by_role(int $role)
    {
        $this->service->where('role_id', $role);
        return $this->service->paginate(10)->appends(request()->query());
    }

    public function store_user(array $formFields)
    {
        $formFields['role_id'] = 2;
        $formFields['password'] = bcrypt($formFields['password']);
        $this->service->create($formFields);
    }

    public function update_user(User $user, array $formFields)
    {
        $user->update($formFields);
    }

    public function reset_password(User $user)
    {
        $countData = $this->service->count();
        $serialCode = str_pad(strval($countData + 1), 4, "0", STR_PAD_LEFT);
        $newPassword = "USR" . $serialCode . "P";

        $hashedPassword['password'] = bcrypt($newPassword);
        $user->update($hashedPassword);

        return $newPassword;
    }

    public function delete_user(User $user)
    {
        $user->delete();
    }

    public function option_user(string|null $query)
    {
        $this->service->select('id', 'name as description');
        return $this->service->where('name', 'like', '%' . $query . '%')->get();
    }
}
