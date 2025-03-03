<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PENDING()
 * @method static static APPROVED()
 */
final class ApproveStatus extends Enum
{
    const PENDING = 0;
    const APPROVED = 1;
}
