<?php
namespace App\ValueObject;

class NumericColumn
{
    private array $numbers;

    public function __construct(array $numbers)
    {
        foreach ($numbers as $number) {
            if (!is_numeric($number)) {
                throw new \InvalidArgumentException("Column contains non-numeric values");
            }
        }
        $this->numbers = $numbers;
    }

    public function getNumbers(): array
    {
        return $this->numbers;
    }
}
