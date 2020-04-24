<?php

declare(strict_types = 1);

namespace Timetracker\Backend\Controller\Timetracker;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Timetracker\Backend\Timetracker\Application\TimetrackerGetAll;
use Timetracker\Backend\Timetracker\Infrastructure\Persistence\NotFoundException;

final class TimetrackerGetAllController
{
    /** @var TimetrackerGetAll */
    private $getAllService;

    public function __construct(TimetrackerGetAll $getAllService)
    {
        $this->getAllService = $getAllService;
    }

    public function __invoke()
    {
        try {
            $timetrackers = $this->getAllService->__invoke();

            return new JsonResponse([
                    'status' => 'ok',
                    'data' => ($timetrackers) ?: [],
                ], Response::HTTP_OK
            );
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