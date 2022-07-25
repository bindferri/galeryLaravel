<?php

namespace Api\Galery\Repositories;

use Api\Galery\Models\Galery;
use Infrastructure\Abstracts\Repository;

class GaleryRepository extends Repository
{
    public function getModel()
    {
        return new Galery();
    }

    public function create(array $data)
    {
        $galery = $this->getModel();

        $galery->fill($data);
        $galery->save();

        return $galery;
    }

    public function update(Galery $galery, array $data)
    {
        $galery->fill($data);

        $galery->save();

        return $galery;
    }
}
