<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteUnwantedDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-databases';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $sql = sprintf("
        SELECT CONCAT('DROP DATABASE `', schema_name, '`;') as cmd
        FROM information_schema.schemata
        WHERE schema_name NOT IN ('mysql', 'information_schema', 'performance_schema', 'sys', '%s');
    ", config('database.connections.mysql.database'));

        $databases = DB::select($sql);

        foreach ($databases as $database) {
            DB::statement($database->cmd);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
