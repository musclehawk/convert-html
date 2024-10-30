<?php
namespace App\Application;

use App\Repository\WikipediaRepository;
use App\Factory\WikipediaTableFactory;
use App\Service\BrowsershotService;
use App\ValueObject\URL;

class GraphGenerator
{
    public function __construct(
        private WikipediaRepository $wikipediaRepository,
        private WikipediaTableFactory $tableFactory,
        private BrowsershotService $browsershotService,
    ) {
    }

    public function generateGraphFromWikipediaTable(string $urlString, string $sourcePath, string $outputPath): void
    {
        $url = new URL($urlString);
        $page = $this->wikipediaRepository->getPageContent($url);

        $isCreatedSuccess = $this->tableFactory->createFromPageContent($page->getHtmlContent(), $sourcePath);

        if (!$isCreatedSuccess) {
            throw new \RuntimeException('No table created on the page');
        }

        $this->browsershotService->render($sourcePath, $outputPath);
    }
}
