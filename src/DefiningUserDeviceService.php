<?php
declare(strict_types=1);

namespace M2Collective\DefiningUserDevice;

use Detection\Exception\MobileDetectException;
use Detection\MobileDetect;

final class DefiningUserDeviceService implements DefiningUserDevice
{
    /**
     * @var bool
     */
    protected bool $isDesktop = false;

    /**
     * @var bool
     */
    protected bool $isMobile = false;

    /**
     * @var bool
     */
    protected bool $isTablet = false;

    /**
     * @param MobileDetect $mobileDetect
     * @throws MobileDetectException
     */
    public function __construct(MobileDetect $mobileDetect)
    {
        if(!$mobileDetect->isMobile() && !$mobileDetect->isTablet()) {
            $this->isDesktop = true;
        } else {
            if($mobileDetect->isMobile() && !$mobileDetect->isTablet()) {
                $this->isMobile = true;
            } else {
                if($mobileDetect->isMobile() && $mobileDetect->isTablet()) {
                    $this->isTablet = true;
                }
            }
        }
    }

    /**
     * @return bool
     */
    public function isDesktop(): bool
    {
        return $this->isDesktop;
    }

    /**
     * @return bool
     */
    public function isMobile(): bool
    {
        return $this->isMobile;
    }

    /**
     * @return bool
     */
    public function isTablet(): bool
    {
        return $this->isTablet;
    }
}
