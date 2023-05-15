<?php

namespace Codeat3\JokesResources\Commands;

use Illuminate\Console\Command;

class JokesResourcesCommand extends Command
{
    public $signature = 'jokes-resources';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
