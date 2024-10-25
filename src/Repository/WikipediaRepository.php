<?php
namespace App\Repository;

use App\ValueObject\URL;
use Goutte\Client;
use App\Entity\WikipediaPage;

class WikipediaRepository
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getPageContent(URL $url): WikipediaPage
    {
        $crawler = $this->client->request('GET', $url->getUrl());
        return new WikipediaPage($crawler->html());
    }
}
