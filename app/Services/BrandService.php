<?php

namespace App\Services;

use App\helper\Helper;
use App\Repositories\GenericRepository;
use App\Models\Brand; // Import Brand model

class BrandService
{
    protected $brandRepository;

    public function __construct(GenericRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository->setModel(Brand::class);
    }

    public function all()
    {
        return $this->brandRepository->all();
    }

    public function find($id)
    {
        return $this->brandRepository->find($id);
    }

    public function create(array $data, $id = null)
    {
        if (isset($data['image'])) {
            $data['image'] = Helper::uploadFile($data['image'], 'brands');
        }
        return $this->brandRepository->create($data);
    }

    public function update(array $data, $id)
    {
        if (isset($data['image'])) {
            $data['image'] = Helper::uploadFile($data['image'], 'brands');
        }
        else 
        {
            $data['image'] = $this->brandRepository->find($id)->image ?? null;
        }
        return $this->brandRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->brandRepository->delete($id);
    }
}
