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
      $collection = Route::getRoutes();
      $routes = [];
      $count = 0;

      foreach($collection as $index => $item)
      {
        if($item->middleware()[0] == $this->argument('type'))
        {
          if($item->getActionName() == 'Closure')
          {
            $type = $this->argument('type');
            $path = base_path("routes/${type}.php");
            $content = $this->open($path);
            $requests = $this->getRequests($content);
            $params = $this->getParams($content, $requests);
              array_push($routes, [
                "name" => $item->uri(),
                "method" => $item->methods[0],
                "controller" => $item->getActionName(),
                "type" => $item->middleware()[0],
                "variable" => $requests[$count],
                "params" => $params
            ]);
            $count++;
          }
        }

      }
    }

    public function getRequests($string)
    {
      $requests = [];
      preg_match_all("/Request[\s][$][\w]+/", $string, $all);
      $data = $all['0'];
      for($i = 0; $i < count($data); $i++)
      {
        preg_match_all("/[$][\w]+/", $data[$i], $array);
        $match = $array[0];
        $requests[$i] = $match[0];
      }
      return $requests;
    }

    public function getParams($string, $requests)
    {
      $params = [];
      $match = [];
      for($i = 0; $i < count($requests); $i++)
      {
        preg_match_all("/[$][\w]+[\-][\>][\w]+[\(][\w]+[\)]/", $requests[$i], $match);
        $params[$i] = 'example';
      }
      var_dump($params);
      return $params;

    }

    public function open($file)
    {
      $content = file_get_contents($file);
      preg_match_all("~(?:#|//)[^\r\n]*|/\*.*?\*/~s", $content, $comments);
      foreach($comments as $comment)
      {
        $content = str_replace($comment, '', $content);
      }
      return $content;
    }
}
