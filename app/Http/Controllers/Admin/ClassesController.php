<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classes;
use App\Models\Traits\TourismTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassesController extends Controller
{
    use TourismTrait;

    public function show()
    {
        return $this->getClasses();
    }
}
