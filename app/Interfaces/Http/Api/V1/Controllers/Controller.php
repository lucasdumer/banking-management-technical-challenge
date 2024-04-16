<?php

namespace App\Interfaces\Http\Api\V1\Controllers;

use Illuminate\Http\Response;

abstract class Controller
{
    protected function successCreated(array $json): Response
    {
        return new Response($json, Response::HTTP_CREATED);
    }

    protected function successGet(array $json): Response
    {
        return new Response($json, Response::HTTP_OK);
    }
}
