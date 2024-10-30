<?php
namespace App\Service;

use Spatie\Browsershot\Browsershot;

class BrowsershotService
{
    public function render(string $sourcePath, string $targetPath): void
    {
        Browsershot::html(file_get_contents($sourcePath))
            ->windowSize(800, 600)
            ->save($targetPath);
    }
}
