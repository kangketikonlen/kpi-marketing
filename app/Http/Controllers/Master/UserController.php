<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    protected string $url = "/master/user";
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request): View
    {
        $data['query'] = $request->input('query');
        $data['users'] = $this->service->get_user_by_role(2);
        return view('pages.master.user.index', $data);
    }

    public function create(): View
    {
        return view('pages.master.user.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        $this->service->store_user($formFields);

        return redirect($this->url)->with('alert', ['message' => 'Data has been saved!', 'status' => 'success']);
    }

    public function edit(User $user): View
    {
        $data['user'] = $user;
        return view('pages.master.user.edit', $data);
    }

    public function update(User $user, UpdateUserRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        $this->service->update_user($user, $formFields);

        return redirect($this->url)->with('alert', ['message' => 'Data has been updated!', 'status' => 'success']);
    }

    public function reset_password(User $user): RedirectResponse
    {
        $newPassword = $this->service->reset_password($user);

        return redirect($this->url)->with('alert', ['message' => 'Password has been reset, your new password is ' . $newPassword, 'status' => 'success']);
    }

    public function delete(User $user): RedirectResponse
    {
        $this->service->delete_user($user);

        return redirect($this->url)->with('alert', ['message' => 'Data has been deleted!', 'status' => 'danger']);
    }

    public function options(Request $request): string|false
    {
        $query = $request->input('q');
        $data = $this->service->option_user($query);
        return json_encode($data);
    }
}
