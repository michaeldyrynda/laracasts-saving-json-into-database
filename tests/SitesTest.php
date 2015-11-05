<?php

use Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateSiteTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /** @test */
    public function it_converts_features_to_json()
    {
        $site = factory(App\Site::class)->create([
          'features' => 'feature 1, feature 2, feature 3',
        ]);

        // Test the accessor-less output is correctly converted to JSON
        $this->assertJsonStringEqualsJsonString(
          '["feature 1","feature 2","feature 3"]',
          $site->getOriginal('features')
        );

        // Ensure that we get a CSV of features
        $this->assertEquals('feature 1, feature 2, feature 3', $site->features);

        // Ensure that we can get an array of features
        $this->assertEquals([ 'feature 1', 'feature 2', 'feature 3', ], $site->features_array);
    }


    /** @test */
    public function it_creates_a_valid_site_with_features()
    {
        $this->visit('/sites/create')
          ->submitForm('Create Site', [
            'name' => 'My first test site',
            'features' => 'First great feature, Another great feature, One more feature',
          ])
          ->seePageIs('/sites')
          ->see('My first test site')
          ->see('First great feature, Another great feature, One more feature')
          ->see('["First great feature","Another great feature","One more feature"]');
    }

    /** @test */
    public function it_edits_an_existing_site()
    {
        $site = factory(App\Site::class)->create();

        $this->visit('/sites/' . $site->id . '/edit')
          ->submitForm('Edit Site', [
            'name' => 'Changed site name',
            'features' => 'feature 1, feature 2, feature 3',
          ])
          ->seePageIs('/sites/' . $site->id . '/edit')
          ->see('Changed site name')
          ->see('feature 1, feature 2, feature 3');

        $this->assertNotEquals($site->name, 'Changed site name');
        $this->assertNotEquals(
          $site->features,
          '["feature 1","feature 2","feature 3"]'
        );
    }
}
