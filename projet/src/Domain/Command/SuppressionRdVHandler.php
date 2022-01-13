<?php

namespace App\Domain\Command;

use App\Domain\Agenda;

class SuppressionRdVHandler
{

    private $agenda;

    public function __construct(Agenda $agenda)
    {
        $this->agenda = $agenda;
    }

    public function handle(SuppressionRdVCommand $command)
    {
        $this->agenda->supprimerRdv($command->getTouristeId(),$command->getRdvId());
    }
}