<?php


namespace Addons\DevSqlRecord\Commands;

use Addons\DevSqlRecord\Constants\Constant;
use Illuminate\Console\Command;

class AppCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = Constant::APP_SIGN . ' {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $action = $this->argument('action');
        $method = 'action' . ucfirst($action);
        $this->{$method}();
    }

    protected function actionInstall()
    {
    }

    protected function actionUninstall()
    {
    }

    protected function actionUpgrade()
    {
    }

}