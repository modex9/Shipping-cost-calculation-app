<?php

namespace App\Services;

use App\Contracts\MouseHouse;

class SidlauskaiHomeService implements MouseHouse {
    public function hasMice() : bool {
        return true;
    }
}
