<?php
use PHPUnit\Framework\TestCase;
use App\ValueObject\URL;

class URLTest extends TestCase
{
    public function testValidURL()
    {
        $url = new URL("https://example.com");
        $this->assertEquals("https://example.com", $url->getUrl());
    }

    public function testInvalidURL()
    {
        $this->expectException(\InvalidArgumentException::class);
        new URL("invalid-url");
    }
}
