<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

#[AsController]
class IndexController
{
    public function __construct(
        private readonly Environment $twig,
    ) {
    }

    #[Route(
        path: '/',
        methods: [Request::METHOD_GET],
    )]
    public function __invoke(): Response
    {
        $x = $this->twig->render('foo.html.twig');
        $y = $this->twig->render('test/foo.html.twig');

        return new Response($x . $y);
    }
}
