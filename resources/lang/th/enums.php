<?php declare(strict_types=1);

use App\Enums\UserType;
use App\Enums\VisibleStatus;
use App\Enums\WorkStatus;

return [

    WorkStatus::class => [
        WorkStatus::PERFORMWORK => 'ปฏิบัติงาน',
        WorkStatus::RESIGN => 'ลาออก',
        WorkStatus::RETIREMENT => 'เกษียณอายุการทำงาน',
    ],

];
