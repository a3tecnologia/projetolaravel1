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

    // método index ===================================================
    public function index()
    {        
        $plans = Plan::orderBy('id', 'DESC')->Paginate() ;
        
        return view('admin.pages.plans.index',[
            'plans' => $plans,
        ]);
    }

    // método create ===================================================
    public function create()
    {
        return view('admin.pages.plans.create');
    }

    // esse método 'store' é o responsável pelo cadastro no banco de dados
    // Request é uma função do laravel para receber os dados do form e repassar para variável $request
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $data['url'] = str::kebab($request->name);
        $this->repository->create($data);

        // redirecionamento via rota (name)
        return redirect()->route('index')
        ->with('message', 'Plano criado com sucesso!');;
    }

    // método edit ===================================================
    public function edit($url)
    {
        //Pego o plano pela url 
        $plan = $this->repository->where('url', $url)->first();

         if(!$plan)
            return redirect()->back();

        // se encontrar um plano, vai pra view edit
        return view('admin.pages.plans.edit', [
            // aqui passo para dentro da view o plano que irei editar
            'plan' => $plan
        ]);
    }

    // método update ===================================================
    public function update(Request $request, $url)
    {
        // recupero o plano pela url
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();
        
        $plan->update($request->all());

        return redirect()
        ->route('index')
        ->with('message', 'Plano alterado com sucesso!');

    }

    // método show ===================================================
    public function show($url)
    {
         $plan = $this->repository->where('url', $url)->first();

         if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    // método destroy ===================================================
    public function destroy($url)
    {
         $plan = $this->repository->where('url', $url)->first();

         if(!$plan)
            return redirect()->back();

            $plan->delete();

        // redirecionamento via rota (name)
        return redirect()
        ->route('index')
        ->with('message', 'Plano excluído com sucesso!');
    }

    // método search ===================================================
    public function search(Request $request)
    {
        
        // filter é o nome do campo filter no form da index
        $filters = $request->except('_token');
        
        $plans = $this->repository->search($request->filter);
        
        return view('admin.pages.plans.index',[
            'plans' => $plans,
            'filters' => $filters
        ]);
    }
}
