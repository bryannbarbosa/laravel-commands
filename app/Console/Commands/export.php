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
    //   if($this->argument('type'))
    //   {
    //     $collection = Route::getRoutes();
    //     $path = base_path('routes/'. $this->argument('type') . '.php');
    //     $routes = [];
    //     foreach ($collection as $item) {
    //       if($item->middleware()[0] == $this->argument('type'))
    //       {
    //         array_push($routes, [
    //           "name" => $item->uri(),
    //           "method" => $item->methods[0],
    //           "controller" => $item->getActionName(),
    //           "type" => $item->middleware()[0]
    //         ]);
    //     }
    //   }
    //   var_dump($routes);
    // }
  }
}
