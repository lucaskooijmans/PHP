<?php

namespace Tests\Browser;

use App\Models\Ad;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomepageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    use DatabaseTruncation;
    public function testLatestAds(): void
    {
        $this->browse(function (Browser $browser) {
            $expectedAds = Ad::orderBy('created_at', 'desc')->take(3)->get();
            $browser->visit('/')
                ->assertSee($expectedAds[0])
                ->assertSee($expectedAds[1])
                ->assertSee($expectedAds[2]);
        });
    }
}
