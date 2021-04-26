<?php

namespace Tests\Unit\GraphQL;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateUser()
    {
        $newUser = $this->graphql($this->createQueryString());
        $usersAfterCreate = $this->graphql($this->getQueryString());
        $this->assertEquals('Csegő', $usersAfterCreate->json('data.users.data.0.name'));
        $this->assertEquals('123123123123', $usersAfterCreate->json('data.users.data.0.userPhone.phoneNumber'));
        $updatedUser = $this->graphql($this->updateQueryString($usersAfterCreate->json('data.users.data.0.id')));
        $usersAfterUpdate = $this->graphql($this->getQueryString());
        var_dump($usersAfterUpdate);

        $this->assertEquals('Csegő2', $usersAfterUpdate->json('data.users.data.0.name'));
        $this->assertEquals('456753454', $usersAfterUpdate->json('data.users.data.0.userPhone.phoneNumber'));
        $this->assertCount(1, $usersAfterUpdate->json('data.users.data'));
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
              id
              name
              userPhone {phoneNumber}
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

    public function updateQueryString($id): string
    {
        return '
        mutation {
            updateUser(
            input: {
                id: '. $id .'
                name: "Csegő2"
                userPhone: {update:{id:'. $id . ' phoneNumber: "456753454"}}

            }
          ) {
            id
          }
        }
        ';
    }
}
