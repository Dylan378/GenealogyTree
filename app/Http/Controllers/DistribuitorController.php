<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistribuitorController extends Controller
{
    public function show(Request $request)
    {
        $parent = Distributor::with('children.children')
            ->find($request->get('parent_id', Distributor::first()->id));

        return view('genealogy', compact('parent'));
    }
}
