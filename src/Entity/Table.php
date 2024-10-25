<?php
namespace App\Entity;

class Table
{
    private array $rows;

    public function __construct(array $rows)
    {
        $this->rows = $rows;
    }

    public function getRows(): array
    {
        return $this->rows;
    }
}
