<?php

namespace App\Contracts;

interface MouseHouse extends House {
    public function hasMice() : bool;
}
