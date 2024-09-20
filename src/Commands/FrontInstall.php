<?php

namespace Vncore\Front\Commands;

use Illuminate\Console\Command;
use Throwable;
use DB;
use Illuminate\Support\Facades\Storage;

class FrontInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vncore:front-install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vncore front install';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \DB::connection(VNCORE_DB_CONNECTION)->table('migrations')->where('migration', '00_00_00_create_tables_front')->delete();
        // $this->call('migrate', ['--path' => '/vendor/vncore/front/src/DB/migrations/00_00_00_create_tables_front.php']);
        // $this->info('---------------> Migrate schema Front default done!');

        // $this->call('db:seed', ['--class' => '\Vncore\Front\DB\seeders\DataFrontDefaultSeeder', '--force' => true]);
        // $this->info('---------------> Seeding database Front default done!');

        $this->welcome();
    }

    private function welcome()
    {
        return Command::SUCCESS;
    }

}
