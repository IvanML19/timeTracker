<?php

declare(strict_types = 1);

namespace Timetracker\Backend\Controller\Timetracker;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class TimetrackerPutController
{
    public function __invoke(string $id, Request $request)
    {
        return new JsonResponse(
            [
                'status' => 'ok put',
                'id' => $id
            ], 201
        );
    }
}