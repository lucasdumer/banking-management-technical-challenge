<?php

use App\Domain\Error\BadRequestException;
use App\Domain\Error\NotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Domain\Error\BusinessException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            return response()->json([
                'message' => 'Not found.'
            ], 404);
        });
        $exceptions->render(function (Exceptions $e, Request $request) {
            return response()->json([
                'message' => 'Internal server error.'
            ], 500);
        });
        $exceptions->render(function (NotFoundException $e, Request $request) {
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        });
        $exceptions->render(function (BadRequestException $e, Request $request) {
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        });
        $exceptions->render(function (BusinessException $e, Request $request) {
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        });
    })->create();
