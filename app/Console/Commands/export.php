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
    protected $path;

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
      $type = $this->argument('type');
      $path = base_path("routes/${type}.php");
      $content = $this->open($path);
      $result = $this->getRequest($content);
      var_dump($result);
    }

    public function getRequest($string)
    {
      $requests = [];
      preg_match_all("/Request[\s][$][\w]+/", $string, $base);

      for($i = 0; $i < count($base[0]); $i++)
      {
        preg_match_all("/[$][\w]+/", $base[0][$i], $array);
        $requests[$i] = $array[0][0];
      }
      return $requests;
    }

    public function open($file)
    {
      $content = file_get_contents($file);
      return $content;
    }
}
