<?php

declare(strict_types = 1);

namespace Timetracker\Backend\Controller\Timetracker;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Timetracker\Backend\Timetracker\Application\TimetrackerCreator;

final class TimetrackerPutController
{
    /** @var TimetrackerCreator */
    private $creator;

    public function __construct(TimetrackerCreator $timetrackerCreator)
    {
        $this->creator = $timetrackerCreator;
    }

    public function __invoke(Request $request): Response
    {
        $name = $request->get('name');
        $duration = $request->get('duration');

        $this->creator->__invoke($name, $duration);

        return new Response('', Response::HTTP_CREATED);
    }
}