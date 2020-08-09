<?php

declare(strict_types=1);


namespace App\Component\Steps;


use App\Component\Migration\Helper\MigrationHelper;
use App\Component\Migration\ImportAttributes;

class FIlmStep implements StepInterface
{
    static function execute():void
    {
        MigrationHelper::importAll('film', 'App\Component\Migration\ImportFilms::insert', 500);
        ImportAttributes::importExternalThesaurusString('censorship', 'censorship', 'film_has_censorship', 'film_attribute', 'film', 1000 );
        ImportAttributes::importExternalThesaurusString('state', 'state', 'film_has_state', 'film_attribute', 'film', 1000 );    }

}