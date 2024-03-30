<?php

namespace Tests\Browser;

use App\Models\Ad;
use App\Models\AdType;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomepageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    use DatabaseMigrations;
    protected function setUp(): void
    {
        parent::setUp();
        // Voer je seeders uit
        $this->artisan('db:seed');
    }

    public function testLatestAds(): void
    {

        $this->browse(function (Browser $browser) {
            $expectedAds = Ad::orderBy('created_at', 'desc')->take(3)->get();
            $browser->visit('/ad')
                ->waitForText($expectedAds[0]->title)
                ->assertSee($expectedAds[1]->title)
                ->assertSee($expectedAds[2]->title);
        });
    }

    public function testReviews()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/ad/2')
                ->waitFor('[id="title"]')
                ->click('[id="review-button"]')
                ->waitFor('[id="title"]')
                ->type('[id="title"]', 'title#1')
                ->type('[id="description"]', 'description#1')
                ->select('[id="score"]')
                ->click('[id="submit-button"]')
                ->waitFor('[id="title"]')
                ->assertSee('title#1');
        });
    }
}
