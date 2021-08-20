<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {        
        $plans = Plan::orderBy('id', 'DESC')->Paginate(10);
        
        return view('admin.pages.plans.index',[
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    // Request é uma função do laravel para receber os dados do form e repassar para variável $request
    public function store(Request $request)
    {
        $data = $request->all();
        $data['url'] = str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }
}
