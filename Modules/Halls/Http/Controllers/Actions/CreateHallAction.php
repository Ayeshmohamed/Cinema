<?php

namespace Modules\Halls\Http\Controllers\Actions;

use Modules\Halls\Entities\Hall;

class CreateHallAction
{
    public function execute(array $data)
    {
        $hall = Hall::create($data);

        return $hall;
    }
}
