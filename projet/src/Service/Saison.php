<?php

namespace App\Service;

class Saison
{
    private $haute = True;

    public function isHaute(): bool
    {
        return $this->haute;
    }

    public function invert()
    {
        $this->haute = !$this->haute;
    }
}