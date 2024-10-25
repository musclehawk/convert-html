<?php
require 'vendor/autoload.php';

use App\Application\GraphGenerator;
use App\Repository\WikipediaRepository;
use App\Factory\WikipediaTableFactory;
use App\Service\GraphPlotterService;

$graphGenerator = new GraphGenerator(
    new WikipediaRepository(),
    new WikipediaTableFactory(),
    new GraphPlotterService()
);

$graphGenerator->generateGraphFromWikipediaTable(
    'https://en.wikipedia.org/wiki/Women%27s_high_jump_world_record_progression',
    'output.png'
);
