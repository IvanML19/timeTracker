<?php

declare(strict_types = 1);

namespace Timetracker\Backend\Controller\Timetracker;


use Symfony\Component\HttpFoundation\JsonResponse;

final class TimetrackerDeleteController
{
    public function __invoke(string $id)
    {
        return new JsonResponse(
            [
                'status' => 'ok delete',
                'id' => $id
            ]
        );
    }
}