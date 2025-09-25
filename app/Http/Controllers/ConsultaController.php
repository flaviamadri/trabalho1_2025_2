<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\StatusConsulta;
use Illuminate\Database\Console\Migrations\StatusCommand;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Consulta::All();

        return view('consulta.list', ['dados' => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $pacientes = Paciente::all();
        $medicos = Medico::all();
        $status = StatusConsulta::orderBy('nome')->get();

        return view('consulta.form', ['paciente' => $pacientes, 'medico' => $medicos, 'status' => $status]);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'data_consulta' => 'required',
            'descricao' => 'nullable',
            'status_consulta_id' => 'required',
        ], [
            'paciente_id.required' => 'O paciente é obrigatório',
            'medico_id.required' => 'O médico é obrigatório',
            'data_consulta.required' => 'A data da consulta é obrigatória',
            'status_consulta_id' => 'O status da consulta é obrigatório',

        ]);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        Consulta::create($request->all());

        return redirect('consulta');
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
        $dado = Consulta::findOrFail($id);
        //dd($dado)
        return view('consulta.form', ['dado' => $dado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateRequest($request);
        $data = $request->all();

        Consulta::updateOrCreate(['id' => $id], $data);

        return redirect('consulta');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dado = Consulta::findOrFail($id);
        $dado->delete();
        return redirect('consulta');
    }

    public function search(Request $request)
    {

        if (!empty($request->valor)) {

            if ($request->tipo === 'paciente') {
                $dados = Consulta::whereHas('paciente', function ($q) use ($request) {
                    $q->where('nome', 'like', '%' . $request->valor . '%');
                })->get();
            } elseif ($request->tipo === 'medico') {
                $dados = Consulta::whereHas('medico', function ($q) use ($request) {
                    $q->where('nome', 'like', '%' . $request->valor . '%');
                })->get();
            } elseif ($request->tipo === 'status') {
                $dados = Consulta::whereHas('status', function ($q) use ($request) {
                    $q->where('nome', 'like', '%' . $request->valor . '%');
                })->get();
            }else {
                $dados = Consulta::where(
                    $request->tipo,
                    'like',
                    "%" . $request->valor . "%"
                )->get();
            }
        } else {
            $dados = Consulta::all();
        }

        return view('consulta.list', ['dados' => $dados]);
    }
}
