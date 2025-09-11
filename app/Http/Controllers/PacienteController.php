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
    {       $dados = Paciente::All();


          //php artisan serve

      return view('paciente.list',['dados'=> $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paciente.form');
    }


    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'nome'=>'required',
            'cpf'=>'required',
        ],[
            'nome.required' => 'O :attribute é obrigatório',
            'cpf.required' => 'O :attribute é obrigatório',
        ]);

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
        //dd($request->all(), $id);
         $request->validate([
            'nome'=>'required',
            'cpf'=>'required',
            'crm'=>'required',
            'email'=>'required',
        ],[
            'nome.required' => 'O :attribute é obrigatório',
            'cpf.required' => 'O :attribute é obrigatório',
            'crm.required' => 'O :attribute é obrigatório',
            'email.required' => 'O :attribute é obrigatório',
        ]);

        Paciente::updateOrCreate(['id' => $id], $request->all());

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
        if(!empty($request->valor)){
            $dados = Paciente::where(
                $request->tipo,
                'like',
                "%$request->valor%" //filtra no pesquisar
            )->get();
        } else{
            $dados = Paciente::All();
        }
        return view('paciente.list', ["dados" => $dados]);
        }
}
