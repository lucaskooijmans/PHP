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
            $browser->loginAs(User::find(6))
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

    public function testAdvertiserFavorite()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(6))
                ->visit('/ad/2');
                $username = $browser->text('[id="username"]');
                $browser
                ->waitFor('[id="title"]')
                ->click('[id="user_link"]')
                ->waitFor('[id="advertiser_name"]')
                ->click('[id="favorite_advertiser"]')
                ->mouseover('[id="dropdown"]')
                ->click('[id="favorite_advertisers"]')
                ->waitFor('[id="title_favorite_advertisers"]')
                ->assertSee($username);
        });
    }
    public function testAdvertiserUnFavorite()
    {
        $this->testAdvertiserFavorite();
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(6))
                ->visit('/ad/2');
            $username = $browser->text('[id="username"]');
            $browser
                ->waitFor('[id="title"]')
                ->click('[id="user_link"]')
                ->waitFor('[id="unfavorite_advertiser"]')
                ->click('[id="unfavorite_advertiser"]')
                ->mouseover('[id="dropdown"]')
                ->click('[id="favorite_advertisers"]')
                ->waitFor('[id="title_favorite_advertisers"]')
                ->assertDontSee($username);
        });
    }

    public function testCreateAdvertisement()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                ->visit('/')
                ->mouseover('[id="dropdown"]')
                ->click('[id="create_advertisement"]')
                ->waitFor('[id="page_title"]')
                ->type('[id="title"]', 'testAdvertisement#1')
                ->type('[id="description"]', 'This is a test advertisement#1')
                ->type('[id="price"]', '12')
                ->type('[id="postalcode"]', '1234AB')
                ->radio('[id="category_selector"]', 'car')
                ->radio('[id="type_selector"]', 'Buy')
                ->click('[id="submit_button"]')
                ->waitForText('testAdvertisement#1')
                ->assertSee('testAdvertisement#1');
        });
    }

}
