<?php

namespace Api\Galery\Services;


use Api\Galery\Exceptions\GaleryNotFoundException;
use Api\Galery\Repositories\GaleryRepository;

class GaleryService
{
    private $galeryRepository;

    public function __construct(
        GaleryRepository $galeryRepository
    ) {
        $this->galeryRepository = $galeryRepository;
    }

    public function getAll($options = [])
    {
        return $this->galeryRepository->getWithCount($options);
    }

    public function getById($galeryId)
    {
        $galery = $this->getRequestedGalery($galeryId);
        
        return $galery;
    }

    public function create($data)
    {
        $data['users_id'] = auth()->id();

        $galery = $this->galeryRepository->create($data);

        return $galery;
    }

    public function update($galeryId, array $data)
    {
        $galery = $this->getRequestedGalery($galeryId);

        $this->galeryRepository->update($galery, $data);
    }

    public function delete($galeryId)
    {
        $galery = $this->getRequestedGalery($galeryId, ['select' => ['id']]);

        $this->galeryRepository->delete($galeryId);

        return $galery;
    }

    private function getRequestedGalery($galeryId, array $options = [])
    {
        $galery = $this->galeryRepository->getById($galeryId, $options);

        if (is_null($galery)) {
            throw new GaleryNotFoundException;
        }

        return $galery;
    }

    public function storeImage($image){
        $image = $image->store('public/galery_assets');
        $imageName = explode('/', $image);
        return $imageName[array_key_last($imageName)];
    }

    public function deleteImage($galery){
        if ($galery->image && file_exists(storage_path() . '/app/public/galery_assets/' . $galery->image)){
            unlink(storage_path() . '/app/public/galery_assets/' . $galery->image);
        }
    }

    public function updateImage($galeryId,$image){
        $galery = $this->getById($galeryId);

        $this->deleteImage($galery);

        return $this->storeImage($image);
    }

    public function getByUser(){
        return $this->galeryRepository->getModel()->where('users_id',auth()->id())->get();
    }
}
