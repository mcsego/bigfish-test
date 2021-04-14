<?php


namespace App\GraphQL\Queries;


use App\Models\User;
use App\Repositories\User as UserRepository;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Closure;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserPhoneQuery
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

//    protected $attributes = [
//        'name' => 'userPhones',
//    ];
//
//
//    public function type(): Type
//    {
//        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('UserPhone'))));
//    }
//
//
//    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
//    {
//    }
}
