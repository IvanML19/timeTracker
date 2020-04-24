<?php

declare(strict_types = 1);

namespace Timetracker\Frontend\Controller\Home;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class HomeGetController
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(): Response
    {
        return new Response($this->twig->render('home.html.twig', []));

    }
}