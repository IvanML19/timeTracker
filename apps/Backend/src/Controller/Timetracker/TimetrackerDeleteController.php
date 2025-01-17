<?php

declare(strict_types = 1);

namespace Timetracker\Backend\Controller\Timetracker;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Timetracker\Backend\Timetracker\Application\TimetrackerDeleter;
use Timetracker\Backend\Timetracker\Infrastructure\Persistence\NotFoundException;

final class TimetrackerDeleteController
{
    /** @var TimetrackerDeleter */
    private $deleter;

    public function __construct(TimetrackerDeleter $timetrackerDeleter)
    {
        $this->deleter = $timetrackerDeleter;
    }

    public function __invoke(string $id): JsonResponse
    {
        try {
        $this->deleter->__invoke($id);

        return new JsonResponse('', Response::HTTP_OK);

        } catch (NotFoundException $e) {
            return new JsonResponse([
                    'status' => 'ko',
                    'error' => $e->getMessage()
                ], Response::HTTP_NOT_FOUND
            );
        } catch (Throwable $e) {
            return new JsonResponse([
                    'status' => 'ko',
                    'error' => $e->getMessage()
                ], Response::HTTP_BAD_REQUEST
            );
        }
    }
}