<?php


namespace App\Repositories;

use App\Repositories\Interface\RepositoryInterface;

class GenericRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        //
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function all()
    {
        return $this->model::all();
    }

    public function find($id)
    {
        return $this->model::find($id);
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model::find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model::find($id)->delete();
    }
}
