<?php


namespace App\Services;

use App\helper\Helper;
use App\Models\Category;
use App\Repositories\GenericRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(GenericRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository->setModel(Category::class);
    }

    public function all()
    {
        return $this->categoryRepository->all();
    }

    public function find($id)
    {
        return $this->categoryRepository->find($id);
    }

    public function create(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = Helper::uploadFile($data['image'], 'categories');
        }
        return $this->categoryRepository->create($data);
    }

    public function update(array $data, $id)
    {
        if (isset($data['image'])) {
            $data['image'] = Helper::uploadFile($data['image'], 'categories');
        }
        else 
        {
            $data['image'] = $this->categoryRepository->find($id)->image ?? null;
        }
        return $this->categoryRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }
}