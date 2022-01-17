<?php

namespace App\Tests;

use App\Domain\Agenda;
use App\Domain\Command\SuppressionRdVCommand;
use App\Domain\Command\SuppressionRdVHandler;
use PHPUnit\Framework\TestCase;

class TouristeTest extends TestCase
{
    public function test_supprimer_un_rdv_utilise_agenda()
    {
        $agenda=$this->createMock(Agenda::class);
        $agenda->expects($this->once())->method("supprimerRdv");

        $touristeId = 1;
        $rdvId = 1;

        $suppressionRdVHandler=new SuppressionRdVHandler($agenda);
        $suppressionRdVCommand = new SuppressionRdVCommand($touristeId,$rdvId);

        $suppressionRdVHandler->handle($suppressionRdVCommand);
    }
}
