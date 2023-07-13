<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Repository;
use App\Services\RepositoryService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model;

    public function __construct(RepositoryService $model)
    {
        // set the model
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->index();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:500'
        ]);

        // create record and pass in only fields that are fillable
        return $this->model->store($request);
    }

    public function show($id)
    {
        return $this->model->show($id);
    }

    public function update(Request $request, $id)
    {
        // update model and only pass in the fillable fields
        $this->model->update($request, $id);

        return $this->model->show($id);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
