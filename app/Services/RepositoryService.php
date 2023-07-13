<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class RepositoryService
{
    protected $user;

    public function __construct(User $user)
    {
        // set the user
        $this->user = new Repository($user);
    }

    public function index()
    {
        return $this->user->all();
    }

    public function store(Request $request)
    {
        // create record and pass in only fields that are fillable
        return $this->user->create($request->only($this->user->getModel()->fillable));
    }

    public function show($id)
    {
        return $this->user->show($id);
    }

    public function update(Request $request, $id)
    {
        // update user and only pass in the fillable fields
        $this->user->update($request->only($this->user->getModel()->fillable), $id);

        return $this->user->show($id);
    }

    public function destroy($id)
    {
        return $this->user->delete($id);
    }
}
