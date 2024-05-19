<?php

namespace App\Services;

use App\Contracts\MouseHouse;

class NormalHouseService implements MouseHouse {
    public function hasMice() : bool {
        return false;
    }
}
