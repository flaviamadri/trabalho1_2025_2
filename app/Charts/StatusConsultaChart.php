<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class StatusConsultaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $dados = DB::table('consultas')
            ->join('status_consultas', 'consultas.status_consulta_id', '=', 'status_consultas.id')
            ->select('status_consultas.nome as status', DB::raw('COUNT(consultas.id) as total'))
            ->groupBy('status_consultas.nome')
            ->orderBy('total', 'desc')
            ->get();

        $qtdConsultas = [];
        $nomeStatus = [];

        foreach ($dados as $item) {
            $nomeStatus[] = $item->status;
            $qtdConsultas[] = $item->total;
        }

        return $this->chart->pieChart()
            ->setTitle('Status das Consultas')
            ->setSubtitle('Distribuição por status')
            ->setDataset($qtdConsultas)
            ->setLabels($nomeStatus);
    }
}
