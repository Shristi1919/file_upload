<?php

namespace Tests\Feature;

use App\Models\User;
use App\Repository\PostRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class PostFeatureTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $postRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->postRepository = new PostRepository();
    }

    private function loginUser(User $user)
    {
        // Simulate logging in by setting the session
        Session::put('loginId', $user->id);
    }

    public function testAuthenticatedUserCanCreatePost()
    {
        $user = User::factory()->create();

        // Authenticate the user
        $this->loginUser($user);

        $postData = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];

        // Use a fully qualified URL to ensure correct routing
        $response = $this->postJson(route('posts.storetest'), $postData);

        // Check if the response status is 201 Created
        $response->assertStatus(201);

        // Check if the response contains the title and content
        $response->assertJsonFragment([
            'title' => $postData['title'],
            'content' => $postData['content'],
        ]);

        // Verify the post was added to the database
        $this->assertDatabaseHas('posts', [
            'title' => $postData['title'],
            'content' => $postData['content'],
            'user_id' => $user->id,
        ]);
    }

    public function testAuthenticatedUserCanUpdatePost()
    {
        $user = User::factory()->create();
        $this->loginUser($user);

        // Create a post owned by the authenticated user
        $postData = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'user_id' => $user->id,
        ];
        $post = $this->postRepository->create($postData);

        // Update data
        $updatedData = [
            'title' => 'Updated Title',
            'content' => 'Updated content.',
        ];

        // Send PUT request to update the post
        $response = $this->putJson(route('posts.updatetest', $post->id), $updatedData);

        // Assert response status and content
        $response->assertStatus(200)
            ->assertJsonFragment($updatedData);

        // Verify the updated data in the database
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $updatedData['title'],
            'content' => $updatedData['content'],
        ]);
    }

    public function testAuthenticatedUserCanDeletePost()
    {
        $user = User::factory()->create();
        $this->loginUser($user);

        // Create a post owned by the authenticated user
        $postData = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'user_id' => $user->id,
        ];
        $post = $this->postRepository->create($postData);

        // Send DELETE request to delete the post
        $response = $this->deleteJson(route('posts.destroytest', $post->id));

        // Assert response status and message
        $response->assertStatus(200)
            ->assertJson(['message' => 'Post deleted successfully']);

        // Verify the post is no longer in the database
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

}
