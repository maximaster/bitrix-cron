<?php

declare(strict_types=1);

namespace Maximaster\BitrixCron;

use CAgent;
use CMain;
use JetBrains\PhpStorm\NoReturn;
use Maximaster\BitrixLoader\BitrixLoader;

class AgentsRunner
{
    private BitrixLoader $loader;

    public function __construct(BitrixLoader $loader)
    {
        $this->loader = $loader;
    }

    #[NoReturn]
    public function run(): void
    {
        $this->loader->prologBefore(function (): void {
            $this->loader->defineConsoleScriptConstants();
            define('CHK_EVENT', true);
            define('BX_NO_ACCELERATOR_RESET', true);
            define('BX_WITH_ON_AFTER_EPILOG', true);
        });

        @set_time_limit(0);
        @ignore_user_abort(true);

        CAgent::CheckAgents();
        define('BX_CRONTAB_SUPPORT', true);
        define('BX_CRONTAB', true);
        CMain::FinalActions();
    }
}
