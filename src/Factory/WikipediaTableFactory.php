<?php
namespace App\Factory;

use App\Entity\Table;
use Symfony\Component\DomCrawler\Crawler;

class WikipediaTableFactory
{
    public function createFromPageContent(string $htmlContent): ?Table
    {
        $crawler = new Crawler($htmlContent);
        $tableCrawler = $crawler->filter('table.wikitable'); // Adjust the filter based on your table class

        if ($tableCrawler->count() === 0) {
            return null; // No table found
        }

        $rows = [];
        $tableCrawler->filter('tr')->each(function (Crawler $rowCrawler) use (&$rows) {
            $cells = $rowCrawler->filter('td')->each(function (Crawler $cellCrawler) {
                return trim($cellCrawler->text());
            });
            $rows[] = $cells;
        });

        return new Table($rows);
    }
}
