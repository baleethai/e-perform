<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static PERFORMWORK()
 * @method static static RESIGN()
 * @method static static RETIREMENT()
 */
final class WorkStatus extends Enum implements LocalizedEnum
{
    const PERFORMWORK = 1;
    const RESIGN = 2;
    const RETIREMENT = 3;
}
