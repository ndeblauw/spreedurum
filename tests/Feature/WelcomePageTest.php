<?php

use App\Models\Article;
use App\Models\User;

it('shows the latest 2 articles on the welcome page', function () {
    // Arrange: create authors and 3 articles
    User::factory(10)->create();

    $first  = Article::factory()->create(['created_at' => now()->subDays(2)]);
    $second = Article::factory()->create(['created_at' => now()->subDay()]);
    $third  = Article::factory()->create(['created_at' => now()]);

    // Act: visit the welcome page
    $response = $this->get('/');

    // Assert: page is successful
    $response->assertOk();

    // Assert: latest two articles are visible
    $response->assertSee($third->title);
    $response->assertSee($second->title);

    // Assert: oldest article is not visible
    $response->assertDontSee($first->title);
});
