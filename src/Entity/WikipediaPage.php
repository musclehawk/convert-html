<?php
namespace App\Entity;

class WikipediaPage
{
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
