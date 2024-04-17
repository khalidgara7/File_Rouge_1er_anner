<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home()
    {
        $categories = Category::latest()->take(4)->get();
        $services = Service::latest()->take(6)->get();


        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'employee');
        })->latest()->take(4)->get();
        // dd($users);
        return view('front.index', compact('categories', 'services', 'users'));
    }
}
