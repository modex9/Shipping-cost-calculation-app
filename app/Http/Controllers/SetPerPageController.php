<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;
use Illuminate\Http\Request;

class SetPerPageController extends Controller
{
    public function setPerPage(Request $request, $perPage)
    {
        $controller = $request->get('controller');
        session([$controller . "_per_page" => $perPage]);
        return back();
    }
}
