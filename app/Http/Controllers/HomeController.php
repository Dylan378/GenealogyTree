<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $distributor = Distributor::with(['children' => function ($query) {
            $query->take(3);
        }])->first();

        return view('home', ['distributor' => $distributor]);
    }
}
