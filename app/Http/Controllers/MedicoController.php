<?php

namespace App\Http\Controllers;

use App\Models\EspecialidadeMedico;
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
        $especialidades = EspecialidadeMedico::orderBy('nome')->get();

        return view('medico.form', ['especialidades' => $especialidades]);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'crm' => 'required',
            'especialidade_medico_id' => 'nullable',
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
        $especialidades = EspecialidadeMedico::orderBy('nome')->get();
        return view('medico.form', ['dado' => $dado, 'especialidades' => $especialidades]);
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
        
        if ($request->tipo === 'especialidade') {

            $dados = Medico::whereHas('especialidade', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->valor . '%');
            })->get();
        } else {

            $dados = Medico::where(
                $request->tipo,
                'like',
                "%" . $request->valor . "%"
            )->get();
        }
    } else {
        $dados = Medico::all();
    }

    return view('medico.list', ["dados" => $dados]);
}

}
