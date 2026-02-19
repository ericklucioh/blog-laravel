<?php

namespace App\ValueObjects;

class Seo
{
    public function __construct(
        public string $title,
        public string $description,
        public string $image,
        public string $canonical
    ) {}
}
