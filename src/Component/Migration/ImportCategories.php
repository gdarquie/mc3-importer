<?php

declare(strict_types=1);

namespace App\Component\Migration;

use App\Component\Migration\Helper\CategoryHelper;
use Ramsey\Uuid\Uuid;

/**
 * Class ImportCategories
 * @package App\Component\Migration
 */
class ImportCategories implements ImporterInterface
{
    static public function insert($pgsql, $code, $mysql):void
    {
        $uuid = Uuid::uuid4()->toString();
        $date = new \DateTime();
        $date = $date->format('Y-m-d H:i:s');

        $params = [
            // set correct values
            'title' => ($code['title']) ? $code['title'] : null,
            'code' => ($code['content']) ? $code['content'] : null,
            'model' => null,
            'description' => ($code['description']) ? $code['description'] : null,
            'createdAt' => ($code['date_creation']) ? $code['date_creation'] : $date,
            'updatedAt' => ($code['last_update']) ? $code['last_update'] : $date,
            'uuid' => $uuid
        ];

        CategoryHelper::insertCategory($params, $pgsql);
    }

}