<?php

declare(strict_types=1);

class TokenAuthenticationMiddleware implements Middleware
{
    public function __invoke(Request $request, $next): Response
    {
        if (! Configuration::getConfig('authentication', 'token')) {
            return $next($request);
        }

        // Add token as request attribute
        $request = $request->withAttribute('token', $request->get('token'));

        if (! $request->getAttribute('token')) {
            return new Response(render(__DIR__ . '/../templates/token.html.php', [
                'message' => 'Missing token',
            ]), 401);
        }
        if (! hash_equals(Configuration::getConfig('authentication', 'token'), $request->getAttribute('token'))) {
            return new Response(render(__DIR__ . '/../templates/token.html.php', [
                'message' => 'Invalid token',
            ]), 401);
        }

        return $next($request);
    }
}
