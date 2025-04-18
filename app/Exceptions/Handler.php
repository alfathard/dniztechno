<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */

    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
            // if ($e instanceof AuthenticationException) {
            //     return redirect('/login');
            // }
            // return parent::render($e);
        });
    }

    // public function render($request, Throwable $exception){
    //     if ($exception instanceof AuthenticationException) {
    //         return redirect('/login');
    //     }
    //     return parent::render($request, $exception);
    // }

    // protected function prepareException(Throwable $e)
    // {
    //     if ($e instanceof ModelNotFoundException) {
    //         $e = new NotFoundHttpException($e->getMessage(), $e);
    //     } elseif ($e instanceof AuthorizationException) {
    //         $e = new AccessDeniedHttpException($e->getMessage(), $e);
    //     } elseif ($e instanceof TokenMismatchException) {
    //           return redirect()->route('login');
    //     }
    //     return $e;
    // }
}
