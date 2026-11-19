<?php

namespace Tests\Unit;

use App\Auth\StringTokenGuard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

class StringTokenGuardTest extends TestCase
{
    public function test_non_string_credentials_do_not_reach_the_provider()
    {
        $provider = $this->createMock(UserProvider::class);
        $provider->expects($this->never())->method('retrieveByCredentials');
        $guard = new StringTokenGuard($provider, new Request(['api_token' => 123]));

        $this->assertNull($guard->user());
        $this->assertFalse($guard->validate(['api_token' => 123]));
    }

    public function test_string_credentials_still_reach_the_provider()
    {
        $provider = $this->createMock(UserProvider::class);
        $provider->expects($this->once())->method('retrieveByCredentials')
            ->with(['api_token' => 'unit-test']);
        $guard = new StringTokenGuard($provider, new Request(['api_token' => 'unit-test']));

        $this->assertSame('unit-test', $guard->getTokenForRequest());
        $guard->user();
    }
}
