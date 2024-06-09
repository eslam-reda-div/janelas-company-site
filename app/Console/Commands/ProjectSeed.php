<?php

namespace App\Console\Commands;

use App\Services\FileService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class projectSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the database with the exported data.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tables = DB::select('SHOW TABLES');

        if (empty($tables)) {
            $this->info('No tables found in the database.');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            foreach ($tables as $table) {
                $tableName = reset($table);
                DB::statement('DROP TABLE IF EXISTS '.$tableName);
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            $this->info('All tables dropped successfully.');
        }

        $fileService = new FileService;

        DB::unprepared($fileService->readfile(base_path(env('DB_EXPORT_FILE_NAME'))));

        $this->info('Database seeded!');
    }
}
