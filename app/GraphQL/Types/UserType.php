<?php


namespace App\GraphQL\Types;


use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphqlType;

class UserType extends GraphqlType
{
    protected $attributes = [
        'name'          => 'User',
        'description'   => 'A user',
        'model'         => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The id of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The name of user',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of user',
            ],
            'userPhones' => [
                'type' => Type::listOf(GraphQL::type('UserPhone')),
                'description' => 'The name of user'
            ],
            'dateOfBirth' => [
                'type' => Type::string(),
                'description' => 'The email of user',
            ],
            'isActive' => [
                'type' => Type::int(),
                'description' => 'The email of user',
            ],
            'createdAt' => [
                'type' => Type::string(),
                'description' => 'The email of user',
            ],
            'updatedAt' => [
                'type' => Type::string(),
                'description' => 'The email of user',
            ]
        ];
    }
}
