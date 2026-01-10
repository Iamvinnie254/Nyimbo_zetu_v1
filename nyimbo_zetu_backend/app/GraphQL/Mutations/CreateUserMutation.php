<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Hash;        
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;



class CreateUserMutation{
    public function createUser($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)

    {
        $user=User::create([
            'email' => $args['email'],
            'first_name' => $args['first_name'],
            'last_name' => $args['last_name'],
            'phone_number' => $args['phone_number'],
            'address' => $args['address'],
            'password' => Hash::make($args['password']),
            'image' => $args['image'],
        ]);
        return [
            'user' => $user,
            'message' => 'User created successfully',
        ];
    
       
    }
}