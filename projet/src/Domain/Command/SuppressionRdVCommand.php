<?php

namespace App\Domain\Command;

class SuppressionRdVCommand
{

    private int $touristeId;
    private int $rdvId;

    public function __construct(int $touristeId, int $rdvId)
    {
        $this->touristeId = $touristeId;
        $this->rdvId = $rdvId;
    }

    /**
     * @return int
     */
    public function getTouristeId(): int
    {
        return $this->touristeId;
    }

    /**
     * @return int
     */
    public function getRdvId(): int
    {
        return $this->rdvId;
    }
}