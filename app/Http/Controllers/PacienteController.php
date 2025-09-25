<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Paciente::All();

        return view('paciente.list', ['dados' => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paciente.form');
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'nascimento' => 'required',
            'telefone' => 'required',
            'email' => 'required',
        ], [
            'nome.required' => 'O nome é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'nascimento.required' => 'A data de nascimento é obrigatório',
            'telefone.required' => 'O telefone é obrigatório',
            'email.required' => 'O E-mail é obrigatório',
        ]);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        Paciente::create($request->all());

        return redirect('paciente');
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
        $dado = Paciente::findOrFail($id);
        //dd($dado)
        return view('paciente.form', ['dado' => $dado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateRequest($request);
        $data = $request->all();

        Paciente::updateOrCreate(['id' => $id], $data);

        return redirect('paciente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dado = Paciente::findOrFail($id);
        $dado->delete();
        return redirect('paciente');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {

            $dados = Paciente::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Paciente::All();
        }

        return view('paciente.list', ['dados' => $dados]);
    }
}
