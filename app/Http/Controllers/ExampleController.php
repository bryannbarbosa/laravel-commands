<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExampleController extends Controller
{
    public function index(Request $request, Response $response)
    {
      return $response->json(['response' => 'example']);
    }
}
