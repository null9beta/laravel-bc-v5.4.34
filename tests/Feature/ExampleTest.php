<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use PHPUnit\Framework\Assert as PHPUnit;

class ExampleTest extends TestCase
{

    public function testCreateTest()
    {
        $response = $this->post('/api/user');

        $response->assertExactJson([
            'uuid' => '840e3056-ca69-42f8-9590-4a87b6a3dd65',
            'email' => 'some@email'
        ]);
    }

    public function testRunOptionsBeforeCreateTest()
    {
        $headers = [
            'access-control-request-headers' => 'content-type',
            'access-control-request-method' => 'POST',
            'origin' => 'http://localhost',
            'content-type' => 'application/json',
            'accept' => 'application/json',
        ];

        $server = $this->transformHeadersToServerVars($headers);
        $response = $this->call('OPTIONS', '/api/user', [], [], [], $server);

        $response->assertStatus(Response::HTTP_OK);
        PHPUnit::assertEmpty($response->getContent(), "Message body shall be empty");
    }
}
