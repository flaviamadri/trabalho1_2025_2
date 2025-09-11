<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Medico::All();

        //php artisan serve

        return view('medico.list', ['dados' => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medico.form');
    }


    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'crm' => 'required',
            'email' => 'required',
        ], [
            'nome.required' => 'O :attribute é obrigatório',
            'cpf.required' => 'O :attribute é obrigatório',
            'crm.required' => 'O :attribute é obrigatório',
            'email.required' => 'O :attribute é obrigatório',
        ]);

        Medico::create($request->all());

        return redirect('medico');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = Medico::findOrFail($id);
        //dd($dado)
        return view('medico.form', ['dado' => $dado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all(), $id);
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'crm' => 'required',
            'email' => 'required',
        ], [
            'nome.required' => 'O :attribute é obrigatório',
            'cpf.required' => 'O :attribute é obrigatório',
            'crm.required' => 'O :attribute é obrigatório',
            'email.required' => 'O :attribute é obrigatório',
        ]);

        Medico::updateOrCreate(['id' => $id], $request->all());

        return redirect('medico');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dado = Medico::findOrFail($id);
        $dado->delete();
        return redirect('medico');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Medico::where(
                $request->tipo,
                'like',
                "%$request->valor%" //filtra no pesquisar
            )->get();
        } else {
            $dados = Medico::All();
        }
        return view('medico.list', ["dados" => $dados]);
    }
}
