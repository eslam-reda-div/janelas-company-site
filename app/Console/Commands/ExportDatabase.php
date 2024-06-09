<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export the database to a file.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = env('DB_EXPORT_FILE_NAME');

        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s --databases %s --add-drop-database --add-drop-table --complete-insert --extended-insert --lock-tables -f > %s',
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_HOST'),
            env('DB_DATABASE'),
            $filename
        );

        exec($command);

        $this->info('Database exported successfully to '.$filename);
    }
}
