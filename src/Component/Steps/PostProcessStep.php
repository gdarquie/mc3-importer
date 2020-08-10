<?php

declare(strict_types=1);


namespace App\Component\Steps;


use App\Component\MySQL\Clean\MySQLClean;
use App\Component\PostgreSQL\Clean\PgSQLClean;

class PostProcessStep implements StepInterface
{
    static function execute()
    {
        MySQLClean::finish();
        PgSQLClean::finish();
    }

}