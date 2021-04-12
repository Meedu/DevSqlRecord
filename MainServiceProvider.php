<?php


namespace Addons\DevSqlRecord;

use Addons\DevSqlRecord\Commands\AppCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class MainServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->commands([
            AppCommand::class,
        ]);

        DB::listen(function ($query) {
            $sql = str_replace("?", "'%s'", $query->sql);
            $log = "开发者工具-SQL日志记录|[{$query->time}ms] " . vsprintf($sql, $query->bindings);
            Log::info($log);
        });
    }

    public function register()
    {
    }

}