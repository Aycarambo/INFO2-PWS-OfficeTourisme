<?php

namespace App\Domain;

interface Agenda
{
    public function supprimerRdv($touristeId,$rdvId);
}