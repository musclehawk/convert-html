<?php
namespace App\Factory;

use Symfony\Component\DomCrawler\Crawler;

class WikipediaTableFactory
{
    // Adjust the filter based on your table class
    public const HTML_FILTER = 'table.wikitable';

    public function createFromPageContent(string $htmlContent, string $sourcePath): bool
    {
        $crawler = new Crawler($htmlContent);
        // Extract the first table
        $tableHtml = $crawler->filter(self::HTML_FILTER)->first()->outerHtml();

        if (!empty($tableHtml)) {
            // Save the table HTML into a file
            file_put_contents($sourcePath, $tableHtml);
            return true;
        }

        return false;
    }
}
