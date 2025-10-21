<?php

namespace App\Tests\EndToEnd;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use App\Kernel;

class BoardTest extends ApiTestCase
{
    protected static function getKernelClass(): string
    {
        return Kernel::class;
    }


    /**
     * @throws TransportExceptionInterface
     */
    public function test_create_board():void
    {
        //act
        $client = static::createClient();
        $response = $client->request('POST', '/create-board', [
            'json' => [
                'name'  => 'Test board',
                'description' => 'demo',
            ],
        ]);
        //assert
        $body = $response->toArray();
        self::assertResponseStatusCodeSame(201);
        self::assertSame('Board created successfully!', $body['message']);

    }
}
