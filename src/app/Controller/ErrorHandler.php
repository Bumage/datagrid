<?php

declare(strict_types=1);

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ErrorHandler
{

    public static function render(string $errorMsg): void
    {
        $loader = new FilesystemLoader('./src/templates');
        $twig = new Environment($loader);

        echo $twig->render('criticalError.html.twig', [
            'error' => $errorMsg
        ]);
    }
}
