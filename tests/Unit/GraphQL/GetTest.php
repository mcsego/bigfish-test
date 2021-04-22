<?php

namespace Tests\Unit\GraphQL;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetTest extends TestCase
{

    use RefreshDatabase;

    public function testGetUserList()
    {

        $users = $this->post("/graphql", ['query' => $this->getQueryString()]);

        $users->assertStatus(200);
        $this->assertCount(0 , $users->json('data.users.data'));


    }

    public function getQueryString(): string
    {
        return "
        {
          users {
            data {
              name
              email
              dateOfBirth
            }
          }
        }
        ";
    }
}
