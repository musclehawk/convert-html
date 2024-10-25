<?php
namespace App\Application;

use App\Repository\WikipediaRepository;
use App\Factory\WikipediaTableFactory;
use App\Service\GraphPlotterService;
use App\ValueObject\URL;
use App\ValueObject\NumericColumn;

class GraphGenerator
{
    private WikipediaRepository $wikipediaRepository;
    private WikipediaTableFactory $tableFactory;
    private GraphPlotterService $graphService;

    public function __construct(
        WikipediaRepository $wikipediaRepository,
        WikipediaTableFactory $tableFactory,
        GraphPlotterService $graphService
    ) {
        $this->wikipediaRepository = $wikipediaRepository;
        $this->tableFactory = $tableFactory;
        $this->graphService = $graphService;
    }

    public function generateGraphFromWikipediaTable(string $urlString, string $outputPath): void
    {
        $url = new URL($urlString);
        $page = $this->wikipediaRepository->getPageContent($url);

        $table = $this->tableFactory->createFromPageContent($page->getHtmlContent());

        if (!$table) {
            throw new \RuntimeException('No table found on the page');
        }

        $numericValues = [];
        foreach ($table->getRows() as $row) {
            foreach ($row as $cell) {
                // if (is_numeric($cell)) {
                    $numericValues[] = (float)$cell;
                // }
            }
        }

        $numericColumn = new NumericColumn($numericValues);
        $this->graphService->plotGraph($numericColumn, $outputPath);
    }
}
