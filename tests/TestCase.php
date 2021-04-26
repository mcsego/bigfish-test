<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function graphql($query)
    {
        return $this->post("/graphql", ['query' => $query]);
    }
}
