<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Engine\{TestRequest, TestResponse, ResponseInterface};

final class HomepageControllerTest extends TestCase
{
    public function testIndexRendersWelcomePage(): void
    {
        $logger = new NullLogger();
        $twig = new \Twig_Environment(new \Twig_Loader_Filesystem(__DIR__ . '/../templates'));

        $request = new TestRequest('GET', '/');
        $response = new TestResponse($twig, $logger);

        $controller = new HomepageController($request, $response, $logger);
        $controller->index();

        $this->assertContains('Huzzah!', $response->body);
    }
}
