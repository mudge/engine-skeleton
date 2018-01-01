<?php
declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;
use Engine\{TestRequest, TestResponse, RequestInterface, ResponseInterface};

final class HomepageControllerTest extends TestCase
{
    public function testIndexRendersWelcomePage(): void
    {
        $request = $this->buildRequest('GET', '/');
        $response = $this->buildResponse();

        $controller = new HomepageController($request, $response);
        $controller->index();

        $this->assertContains('Huzzah!', $response->body);
    }

    private function buildRequest(string $method, string $uri): RequestInterface
    {
        return new TestRequest($method, $uri);
    }

    private function buildResponse(): ResponseInterface
    {
        $twig = new \Twig_Environment(new \Twig_Loader_Filesystem(__DIR__ . '/../templates'));

        return new TestResponse($twig);
    }
}
