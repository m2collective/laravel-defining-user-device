<?php
declare(strict_types=1);

namespace M2Collective\DefiningUserDevice\Facades;

use Illuminate\Support\Facades\Facade;
use M2Collective\DefiningUserDevice\DefiningUserDevice as DefiningUserDeviceContract;

/**
 * @method static bool isDesktop()
 * @method static bool isMobile()
 * @method static bool isTablet()
 *
 * @see \M2Collective\DefiningUserDevice\DefiningUserDeviceManager
 */
final class DefiningUserDevice extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return DefiningUserDeviceContract::class;
    }
}
