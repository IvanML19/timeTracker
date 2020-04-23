<?php

declare(strict_types = 1);

namespace Timetracker\Backend\Controller\Timetracker;


use Symfony\Component\HttpFoundation\JsonResponse;

final class TimetrackerGetController
{
    public function __invoke()
    {
        return new JsonResponse(
            [
                'status' => 'ok',
            ]
        );
    }
}