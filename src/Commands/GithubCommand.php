<?php

namespace AlexisConception\Github\Commands;

use Illuminate\Console\Command;

class GithubCommand extends Command
{
    public $signature = 'github';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
