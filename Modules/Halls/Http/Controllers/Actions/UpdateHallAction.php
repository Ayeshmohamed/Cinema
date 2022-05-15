<?php

namespace Modules\Halls\Http\Controllers\Actions;

use Modules\Halls\Entities\Hall;

class UpdateHallAction
{
    public function execute($id, array $data)
    {
        $hall = Hall::find($id);

        if ($hall) {
            $hall->update($data);
        }

        return $hall;
    }
}
