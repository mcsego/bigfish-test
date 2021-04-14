<?php


namespace App\GraphQL\Queries;


use App\Models\User;
use App\Repositories\User as UserRepository;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserQuery extends Query
{

    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    protected $attributes = [
        'name' => 'users',
    ];


    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('User'))));
    }


    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::id(),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        if (isset($args['id'])) {
            return User::where('id' , $args['id'])->get();
        }
        if (isset($args['email'])) {
            return User::where('email', $args['email'])->get();
        }
        return $this->userRepository->getAllUser();

    }
}
