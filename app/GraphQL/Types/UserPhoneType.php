<?php


namespace App\GraphQL\Types;


use App\Models\UserPhone;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserPhoneType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'UserPhone',
        'description'   => 'A user phone numbers',
        'model'         => UserPhone::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The id of the phone number',
            ],
            'phoneNumber' => [
                'type' => Type::string(),
                'description' => 'The phone num of user',
            ]
        ];
    }
}
