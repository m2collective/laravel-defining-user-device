<?php
declare(strict_types=1);

namespace M2Collective\DefiningUserDevice;

interface DefiningUserDevice
{
    /**
     * @return bool
     */
    public function isDesktop(): bool;

    /**
     * @return bool
     */
    public function isMobile(): bool;

    /**
     * @return bool
     */
    public function isTablet(): bool;
}
