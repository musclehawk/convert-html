<?php
namespace App\Entity;

class WikipediaPage
{
    // The HTML content of the Wikipedia page
    private string $htmlContent;
    
    public function __construct(string $htmlContent)
    {
        $this->htmlContent = $htmlContent;
    }

    public function getHtmlContent(): string
    {
        return $this->htmlContent;
    }
}
