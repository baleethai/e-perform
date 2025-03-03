<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static NOT_VISIBLE()
 * @method static static IS_VISIBLE()
 */
final class VisibleStatus extends Enum
{
    const NOT_VISIBLE = 0;
    const IS_VISIBLE = 1;

}
