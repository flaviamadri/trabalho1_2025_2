<?php

namespace App\Http\Controllers;

use App\Models\TipoSanguineo;
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
        {
        $tiposanguineos = TipoSanguineo::orderBy('nome')->get();

        return view('paciente.form', ['tiposanguineo' => $tiposanguineos]);
    }
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'nascimento' => 'required',
            'tiposanguineo_paciente_id' => 'required',
            'telefone' => 'required',
            'email' => 'required',
        ], [
            'nome.required' => 'O nome é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'nascimento.required' => 'A data de nascimento é obrigatório',
            'tiposanguineo_paciente_id' => 'A tipo sanguíneo é obrigatório',
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
        $tiposanguineo = TipoSanguineo::orderBy('nome')->get();
        return view('paciente.form', ['dado' => $dado, 'tipossanguineo' => $tiposanguineo]);
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
            if ($request->tipo === 'tiposanguineo') {

                $dados = Paciente::whereHas('tiposanguineo', function ($q) use ($request) {
                    $q->where('nome', 'like', '%' . $request->valor . '%');
                })->get();
            } else {
            $dados = Paciente::where(
                $request->tipo,
                'like',
                "% . $request->valor . %"
            )->get();
        } } else {
            $dados = Paciente::All();
        }

        return view('paciente.list', ['dados' => $dados]);
    }
}

