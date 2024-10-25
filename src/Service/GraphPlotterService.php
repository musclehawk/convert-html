<?php
namespace App\Service;

use App\ValueObject\NumericColumn;
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

class GraphPlotterService
{
    public function plotGraph(NumericColumn $column, string $outputPath): void
    {
        $graph = new Graph\PieGraph(400, 300);
        $graph->SetScale('textlin');

        $linePlot = new Plot\PiePlot($column->getNumbers());
        $graph->Add($linePlot);

        $graph->title->Set("Numeric Column Plot");
        $graph->xaxis->title->Set("Index");
        $graph->yaxis->title->Set("Value");

        $graph->Stroke($outputPath);
    }
}
