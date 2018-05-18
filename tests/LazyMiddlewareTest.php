<?php

namespace Chubbyphp\Tests\Lazy;

use Chubbyphp\Lazy\LazyMiddleware;
use Interop\Container\ContainerInterface as InteropContainerInterface;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface as PsrContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * @covers \Chubbyphp\Lazy\LazyMiddleware
 */
final class LazyMiddlewareTest extends TestCase
{
    public function testInvokeInteropt()
    {
        $container = $this->getInteroptContainer([
            'service' => function (Request $request, Response $response, callable $next = null) {
                return $response;
            },
        ]);

        $request = $this->getRequest();
        $response = $this->getResponse();

        $middleware = new LazyMiddleware($container, 'service');

        self::assertSame($response, $middleware($request, $response));
    }

    public function testInvokePsr()
    {
        $container = $this->getPsrContainer([
            'service' => function (Request $request, Response $response, callable $next = null) {
                return $response;
            },
        ]);

        $request = $this->getRequest();
        $response = $this->getResponse();

        $middleware = new LazyMiddleware($container, 'service');

        self::assertSame($response, $middleware($request, $response));
    }

    /**
     * @param array $services
     *
     * @return InteropContainerInterface
     */
    private function getInteroptContainer(array $services): InteropContainerInterface
    {
        /** @var InteropContainerInterface|\PHPUnit_Framework_MockObject_MockObject $container */
        $container = $this->getMockBuilder(InteropContainerInterface::class)->setMethods(['get'])->getMockForAbstractClass();

        $container
            ->expects(self::any())
            ->method('get')
            ->willReturnCallback(function (string $id) use ($services) {
                return $services[$id];
            })
        ;

        return $container;
    }

    /**
     * @param array $services
     *
     * @return PsrContainerInterface
     */
    private function getPsrContainer(array $services): PsrContainerInterface
    {
        /** @var PsrContainerInterface|\PHPUnit_Framework_MockObject_MockObject $container */
        $container = $this->getMockBuilder(PsrContainerInterface::class)->setMethods(['get'])->getMockForAbstractClass();

        $container
            ->expects(self::any())
            ->method('get')
            ->willReturnCallback(function (string $id) use ($services) {
                return $services[$id];
            })
        ;

        return $container;
    }

    /**
     * @return Request|\PHPUnit_Framework_MockObject_MockObject
     */
    private function getRequest(): Request
    {
        return $this->getMockBuilder(Request::class)->setMethods([])->getMockForAbstractClass();
    }

    /**
     * @return Response|\PHPUnit_Framework_MockObject_MockObject
     */
    private function getResponse(): Response
    {
        return $this->getMockBuilder(Response::class)->setMethods([])->getMockForAbstractClass();
    }
}
