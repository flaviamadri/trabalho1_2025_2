<?php

namespace App\Http\Controllers;

use App\Models\EspecialidadeMedico;
use App\Models\Medico;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $especialidades = EspecialidadeMedico::orderBy('nome')->get();

        return view('medico.form', ['especialidades' => $especialidades]);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'crm' => 'required',
            'especialidade_medico_id' => 'required',
            'telefone' => 'nullable',
            'email' => 'required',
            'imagem' => 'nullable|image|mimes:png,jpg,jpeg',
        ], [
            'nome.required' => 'O nome é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'especialidade_medico_id.required' => 'A especialidade do medico é obrigatório',
            'crm.required' => 'O CRM é obrigatório',
            'email.required' => 'O E-mail é obrigatório',
            'imagem.image' => 'O :attribute deve ser enviado',
            'imagem.mimes' => 'O :attribute deve ser das extensões:PNG,JPEG,JPG',
        ]);

    }

    public function store(Request $request)
    {
        $this->validateRequest($request);


        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdiHs') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/medico/";

            $imagem->storeAs(
                $diretorio,
                $nome_imagem,
                'public'
            );
            $data['imagem'] = $diretorio . $nome_imagem;
        }

            Medico::create($request->all());
            return redirect('medico');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medico = Medico::with('pacientes')->findOrFail($id);
        return view('medicos.show', compact('medico'));

        $medico = Medico::with('consultas')->findOrFail($id);
        return view('medicos.show', compact('medico'));
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
         $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdiHs') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/medico/";

            $imagem->storeAs(
                $diretorio,
                $nome_imagem,
                'public'
            );
            $data['imagem'] = $diretorio . $nome_imagem;
        }

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

    public function report()
    {

        //select * from Aluno order by nome
        //$dados = Aluno::All()
        $dados = Medico::orderBy('nome')->get();
        //$dados = Aluno::where('nome', 'like', "a%")->get();

        $data = [
            'titulo' => 'Relatório - Listagem de Médicos',
            'dados' =>  $dados,
        ];

        $pdf = Pdf::loadView('medico.report', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->download('relatorio_listagem_medicos.pdf');
    }
    public function listarPacientes($id)
    {
        $medico = Medico::with('consultas.paciente')->findOrfail($id);

        return view('medico.list_pacientes', compact('medico'));
    }


}
