<?php

namespace App\Console\Commands\Affiliate;

use Illuminate\Console\Command;
use DB;
use Exception;

class Remove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:affiliate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all affiliates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            echo '- Start '.$this->signature.PHP_EOL;

            DB::table('affiliates')->truncate();
            DB::table('affiliates_categories')->truncate();
            DB::table('categories')->truncate();

            echo '- Finished '.$this->signature;
        } catch (Exception $e) {
            echo 'Er is een fout opgetreden. '.$this->signature.

            $path = $_SERVER["DOCUMENT_ROOT"]."/storage/logs/email_error.log";
            $logfile = fopen($path,'a+');
            $data = "\n".date('Y-m-d H:i:s').": for -> $this->signature cronjob".$e."\n\n";
            fwrite($logfile,$data);
            fclose($logfile);
        }
    }
}
