<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistribuitorController extends Controller
{
    public function index($parentId = null)
    {
        if ($parentId) {
            $parentDistributor = Distributor::with('children')->findOrFail($parentId);
        } else {
            $parentDistributor = Distributor::with('children')->whereNull('distributor_id')->first();  // Root distributor
        }

        return view('genealogy', [
            'treeData' => $parentDistributor->toJson(),
        ]);
    }
}
