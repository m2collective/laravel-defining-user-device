<?php
declare(strict_types=1);

namespace M2Collective\DefiningUserDevice\Commands;

use Illuminate\Console\Command;

final class ConfigPublishCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'm2collective:defining-user-device:publish-config';

    /**
     * @var string
     */
    protected $description = 'Publishing the config files';

    /**
     * @return void
     */
    public function handle() : void
    {
        $this->call('vendor:publish', [
            '--tag' => 'm2collective:defining-user-device:publish-config'
        ]);
    }
}
