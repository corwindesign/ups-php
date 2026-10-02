<?php

namespace UPS\Tracking;

use PHPUnit\Framework\TestCase;
use UPS\Tracking\Configuration;
use UPS\Tracking\Request\TrackingApi;
use UPS\Tracking\Request\DefaultApi;

class TrackingApiTest extends TestCase
{
    private TrackingApi $api;

    public function setUp(): void
    {
        $config = new Configuration();
        $config->setHost('https://onlinetools.ups.com');
        $this->api = new TrackingApi(null, $config);
    }

    public function testGetSingleTrackResponseUsingGETRequestPath()
    {
        $request = $this->api->getSingleTrackResponseUsingGETRequest(
            '1Z12345E0205271688',
            'trans-123',
            'testing-src'
        );

        $this->assertSame('GET', $request->getMethod());
        $uri = (string) $request->getUri();
        $this->assertStringContainsString('/track/v1/details/1Z12345E0205271688', $uri);
        $this->assertSame('trans-123', $request->getHeaderLine('transId'));
        $this->assertSame('testing-src', $request->getHeaderLine('transactionSrc'));
    }

    public function testGetSingleTrackResponseByReferenceUsingGETRequestPath()
    {
        $request = $this->api->getSingleTrackResponseByReferenceUsingGETRequest(
            'PO-987654',
            'trans-456',
            'testing-src'
        );

        $this->assertSame('GET', $request->getMethod());
        $uri = (string) $request->getUri();
        $this->assertStringContainsString('/track/v1/reference/details/PO-987654', $uri);
        $this->assertSame('trans-456', $request->getHeaderLine('transId'));
        $this->assertSame('testing-src', $request->getHeaderLine('transactionSrc'));
    }

    public function testReferenceTrackingAPIRequestPath()
    {
        $request = $this->api->referenceTrackingAPIRequest(
            'PO-112233',
            'trans-789',
            'testing-src'
        );

        $this->assertSame('GET', $request->getMethod());
        $uri = (string) $request->getUri();
        $this->assertStringContainsString('/track/v1/reference/details/PO-112233', $uri);
        $this->assertSame('trans-789', $request->getHeaderLine('transId'));
        $this->assertSame('testing-src', $request->getHeaderLine('transactionSrc'));
    }

    public function testDefaultApiInheritsTrackingApi()
    {
        $defaultApi = new DefaultApi();
        $this->assertInstanceOf(TrackingApi::class, $defaultApi);
    }
}
