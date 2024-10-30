<?php
require 'vendor/autoload.php';

use App\Application\GraphGenerator;
use App\Repository\WikipediaRepository;
use App\Factory\WikipediaTableFactory;
use App\Service\BrowsershotService;

const URL = 'https://en.wikipedia.org/wiki/Women%27s_high_jump_world_record_progression';
const SOURCE_PATH = 'table.html';
const OUTPUT_PATH = 'table.png';

$graphGenerator = new GraphGenerator(
    new WikipediaRepository(),
    new WikipediaTableFactory(),
    new BrowsershotService()
);

$graphGenerator->generateGraphFromWikipediaTable(
    URL,
    SOURCE_PATH,
    OUTPUT_PATH
);
