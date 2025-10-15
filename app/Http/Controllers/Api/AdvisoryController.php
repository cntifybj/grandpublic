<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvisoryResource;
use App\Models\Advisory;
use Illuminate\Http\Request;

class AdvisoryController extends Controller
{
    public function landscape()
    {
        return AdvisoryResource::collection(Advisory::where('position', 'app-home-page')
            ->where('visible', true)
            ->get());
    }

    public function portrait()
    {
        return AdvisoryResource::collection(Advisory::where('position', 'app-mygp-page')
            ->where('visible', true)
            ->get());
    }
}
