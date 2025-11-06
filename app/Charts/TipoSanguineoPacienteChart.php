<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class TipoSanguineoPacienteChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $dados = DB::table('pacientes')
            ->join('tipo_sanguineos', 'pacientes.tiposanguineo_paciente_id', '=', 'tipo_sanguineos.id')
            ->select('tipo_sanguineos.nome as tipos', DB::raw('COUNT(pacientes.id) as total'))
            ->groupBy('tipo_sanguineos.nome')
            ->orderBy('total', 'desc')
            ->get();

        $qtdPacientes = [];
        $nomeTipoSanguineo = [];

        foreach ($dados as $item) {
            $nomeTipoSanguineo[] = $item->tipos;
            $qtdPacientes[] = $item->total;
        }

        return $this->chart->pieChart()
            ->setTitle('Tipos Sanguíneos dos Pacientes')
            ->setSubtitle('Distribuição por tipo sanguíneo')
            ->setDataset($qtdPacientes)
            ->setLabels($nomeTipoSanguineo);
    }
}

