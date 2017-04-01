<?php

namespace App\Http\Controllers\Admin;

use App\Models\Traits\TourismTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use TourismTrait;

    public function index()
    {
        $classes = [];
        $classes = $this->getClasses();
        return view('admin.index');
    }

}
