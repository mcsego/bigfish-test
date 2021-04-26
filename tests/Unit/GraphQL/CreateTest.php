<?php

namespace Tests\Unit\GraphQL;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{

    use RefreshDatabase;

    public function testCreateUser()
    {
        $newUser = $this->graphql($this->createQueryString());
        $usersAfterCreate = $this->graphql($this->getQueryString());
        $usersAfterCreate->assertStatus(200);
        $this->assertEquals('Csegő', $usersAfterCreate->json('data.users.data.0.name'));
        $this->assertCount(1, $usersAfterCreate->json('data.users.data'));
    }

        /**
         * @return array[]
         */


    public function getQueryString(): string
    {
        return "
        {
          users {
            data {
              name
            }
          }
        }
        ";
    }

    public function createQueryString(): string
    {
        return '
        mutation {
            createUser(
            input: {
              name: "Csegő"
              email: "csego2@gmail.com"
              dateOfBirth: "1992-05-31"
              isActive: 1
              userPhone: {create: {phoneNumber: "123123123123"}}
            }
          ) {
            id
          }
        }
        ';
    }

}
