<?php
declare(strict_types=1);

namespace M2Collective\DefiningUserDevice;

use Illuminate\Support\ServiceProvider;
use M2Collective\BladeDirective\Concerns\RegisterBladeDirectives;
use M2Collective\DefiningUserDevice\Views\Directives\IsDesktopDirective;
use M2Collective\DefiningUserDevice\Views\Directives\IsMobileDirective;
use M2Collective\DefiningUserDevice\Views\Directives\IsTableDirective;

final class DefiningUserDeviceServiceProvider extends ServiceProvider
{
    use RegisterBladeDirectives;

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(
            DefiningUserDevice::class,
            DefiningUserDeviceManager::class
        );
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->registerBladeDirectives([
            new IsDesktopDirective(),
            new IsMobileDirective(),
            new IsTableDirective(),
        ]);
    }
}
