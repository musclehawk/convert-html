<?php
namespace App\ValueObject;

class URL
{
    private string $url;

    public function __construct(string $url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException("Invalid URL");
        }
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
