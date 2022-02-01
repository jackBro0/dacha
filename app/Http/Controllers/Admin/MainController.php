<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dacha;
use App\Models\RentDacha;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $dacha_count = Dacha::query()->count();
        $location_count = Category::query()->count();
        $order = RentDacha::query()->count();
        return view('admin.pages.index', compact('dacha_count', 'location_count', 'order'));
    }
}
