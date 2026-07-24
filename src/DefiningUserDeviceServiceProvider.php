<?php
declare(strict_types=1);

namespace M2Collective\DefiningUserDevice;

use Illuminate\Support\ServiceProvider;
use M2Collective\DefiningUserDevice\Commands\ConfigPublishCommand;
use M2Collective\DefiningUserDevice\Views\Directives\DefiningUserDesktopDevice;
use M2Collective\DefiningUserDevice\Views\Directives\DefiningUserMobileDevice;
use M2Collective\DefiningUserDevice\Views\Directives\DefiningUserTabletDevice;
use M2Collective\ViewDirectives\Providers\RegisterDirectives;

final class DefiningUserDeviceServiceProvider extends ServiceProvider
{
    use RegisterDirectives;

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/defining-user-device.php',
            'defining-user-device'
        );

        $this->app->singleton(
            DefiningUserDevice::class,
            DefiningUserDeviceService::class
        );
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->registerDirectives([
            new DefiningUserDesktopDevice(
                config(
                    'defining-user-device.directives.definingUserDesktopDevice.openingTag',
                    'openingDefiningUserDesktopDevice'
                ),
                config(
                    'defining-user-device.directives.definingUserDesktopDevice.logicalTag',
                    'logicalDefiningUserDesktopDevice'
                ),
                config(
                    'defining-user-device.directives.definingUserDesktopDevice.closingTag',
                    'closingDefiningUserDesktopDevice'
                ),
            ),
            new DefiningUserMobileDevice(
                config(
                    'defining-user-device.directives.definingUserMobileDevice.openingTag',
                    'openingDefiningUserMobileDevice'
                ),
                config(
                    'defining-user-device.directives.definingUserMobileDevice.logicalTag',
                    'logicalDefiningUserMobileDevice'
                ),
                config(
                    'defining-user-device.directives.definingUserMobileDevice.closingTag',
                    'closingDefiningUserMobileDevice'
                ),
            ),
            new DefiningUserTabletDevice(
                config(
                    'defining-user-device.directives.definingUserTabletDevice.openingTag',
                    'openingDefiningUserTabletDevice'
                ),
                config(
                    'defining-user-device.directives.definingUserTabletDevice.logicalTag',
                    'logicalDefiningUserTabletDevice'
                ),
                config(
                    'defining-user-device.directives.definingUserTabletDevice.closingTag',
                    'closingDefiningUserTabletDevice'
                ),
            ),
        ]);

        $this->publishes([
            __DIR__ . '/../config/defining-user-device.php' => config_path('defining-user-device.php'),
        ], 'm2collective:defining-user-device:publish-config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ConfigPublishCommand::class,
            ]);
        }
    }
}
