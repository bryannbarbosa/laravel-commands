<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class Export extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exports {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export all API Routes with required parameters in a JSON File';

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
      $result = $this->match('Route::get(abcde),function(');
      var_dump($result);
    }

    public function match($string)
    {
      preg_match_all("/Route::[\w]+\([\w]+\)\,[\w\s]+[\w\s]\(/", $string, $base);
      return $base[0];
    }
}
