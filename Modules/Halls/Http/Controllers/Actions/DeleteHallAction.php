<?php

namespace Modules\Halls\Http\Controllers\Actions;

use Modules\Halls\Entities\Hall;

class DeleteHallAction
{
    public function execute($id)
    {
        $hall = Hall::find($id);

        if ($hall) {
            $hall->delete();
        }

        return null;
    }
}
