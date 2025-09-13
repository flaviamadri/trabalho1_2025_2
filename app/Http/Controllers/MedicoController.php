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

        return view('medico.list', ['dados' => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medico.form');
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'crm' => 'required',
            'especialidade' => 'nullable',
            'telefone' => 'nullable',
            'email' => 'required',
        ], [
            'nome.required' => 'O nome é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'crm.required' => 'O CRM é obrigatório',
            'email.required' => 'O E-mail é obrigatório',
        ]);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

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
        $this->validateRequest($request);
        $data = $request->all();

        Medico::updateOrCreate(['id' => $id], $data);

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
                "%$request->valor%"
            )->get();
        } else {
            $dados = Medico::All();
        }

        return view('medico.list', ['dados' => $dados]);
    }
}
