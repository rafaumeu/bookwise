<?php

declare(strict_types = 1);

namespace App\Middlewares;

class AuthMiddleware
{
    public function handle(): void
    {
        if (! auth()) {
            redirect('/login');
        }
    }
}
