<?php

namespace App\Services;

use Illuminate\Http\Request;

class PerPageService
{
    public function getPerPage(Request $request) : ?int
    {
        $route = $request->route();
        $controller = $route->action['controller'];
        return session($controller . "_per_page");
    }
}
