<?php

namespace Tests\Feature\Api;

use App\Http\Resources\UserLeaveResource;
use App\Models\UserLeave;
use Tests\TestCase;

class UserLeaveTest extends TestCase
{
    /**
     * Get base Url for the API endpoint
     *
     * @return string
     */
    protected function url(): string
    {
        return '/api/users/leaves';
    }

    /** @test */
    public function must_be_authenticated_to_get()
    {
        $this->getJson($this->url())
            ->assertStatus(401)
            ->assertExactJson([
                'message' => 'Unauthenticated.',
            ]);
    }

    /** @test */
    public function it_returns_leaves()
    {
        /** @var UserLeave $leave */
        $leave = create(UserLeave::class);

        $this->actingAs($leave->user, 'api')
            ->getJson($this->url())
            ->assertSuccessful()
            ->assertJsonFragment((new UserLeaveResource($leave))->jsonSerialize());
    }

    /** @test */
    public function must_be_authenticated_to_post()
    {
        $this->postJson($this->url())
            ->assertStatus(401)
            ->assertExactJson([
                'message' => 'Unauthenticated.',
            ]);
    }

    /** @test */
    public function it_validates_request_in_post_request()
    {
        /** @var UserLeave $leave */
        $leave = create(UserLeave::class);

        $this->actingAs($leave->user, 'api')
            ->postJson($this->url())
            ->assertJsonValidationErrors([
                'leave_type_id',
                'started_at',
                'ended_at',
                'description',
            ]);
    }
}
