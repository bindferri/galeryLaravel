<?php

namespace Api\Galery\Controllers;

use Api\Galery\Models\Galery;
use Api\Galery\Requests\CreateGaleryRequest;
use Api\Galery\Requests\UpdateGaleryRequest;
use Api\Galery\Services\GaleryService;
use Api\Users\Models\User;
use Illuminate\Support\Facades\Gate;
use Infrastructure\Abstracts\Controller;

class GaleryController extends Controller
{
    private $galeryService;

    public function __construct(GaleryService $galeryService)
    {
        $this->galeryService = $galeryService;
    }

    public function getAll()
    {
        $sendData = $this->galeryService->getByUser();
//        $sendData = $this->galeryService->getAll();

        return $this->response($sendData);
    }

    //TODO checkowner
    public function getById($galeryId)
    {
        $resourceOptions = $this->parseResourceOptions();

        $sendData = $this->galeryService->getById($galeryId, $resourceOptions);

        return $sendData->id;

        return $this->response($sendData);
    }

    //TODO Image unique name
    public function create(CreateGaleryRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->galeryService->storeImage($data['image']);
        $sendData['galery'] = $this->galeryService->create($data);

        return $this->response($sendData, 201);
    }

    public function update($galeryId, UpdateGaleryRequest $request)
    {
        $owner = Galery::find($galeryId)->users_id;

        if (!Gate::denies('check-owner',[auth()->id(),$owner])) exit;

        $data = $request->validated();

        $data['image'] = $this->galeryService->updateImage($galeryId,$data['image']);

        $sendData['galery'] = $this->galeryService->update($galeryId, $data);

        return $this->response($sendData);
    }

    public function delete($galeryId)
    {
        $galery = $this->galeryService->getById($galeryId);

        if (!Gate::denies('check-owner',[auth()->id(),$galery->users_id])) exit;

        $this->galeryService->deleteImage($galery);

        $this->galeryService->delete($galeryId);

        return $this->response(null, 204);
    }
}
