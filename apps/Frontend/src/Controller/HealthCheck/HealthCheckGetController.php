<?php

declare(strict_types = 1);

namespace Timetracker\Frontend\Controller\HealthCheck;

use Symfony\Component\HttpFoundation\JsonResponse;

final class HealthCheckGetController
{
    public function __invoke()
    {
        return new JsonResponse(
            [
                'frontend-status' => 'ok',
            ]
        );
    }
}