<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortfolioPageTest extends TestCase
{
    public function test_the_homepage_contains_the_portfolio_sections(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('BUILDING')
            ->assertSee('DIGITAL')
            ->assertSee('SYSTEMS.')
            ->assertSee('Explore Projects')
            ->assertSee('Enter The Lab')
            ->assertSee('Built for real work.')
            ->assertSee('Zinus Ticketing')
            ->assertSee('Maritime Commerce')
            ->assertSee('HSE Asset Management')
            ->assertSee('Still exploring.')
            ->assertSee('Local AI OS')
            ->assertSee('IN DEVELOPMENT')
            ->assertSee('Tools I use.')
            ->assertSee("Let&#039;s build something useful.", false)
            ->assertSee('hello@dimssptr.xyz')
            ->assertSee('https://github.com/dimassputra1616');
    }

    public function test_the_profile_page_loads_successfully(): void
    {
        $response = $this->get('/profile');

        $response
            ->assertOk()
            ->assertSee('Dimas Saputra')
            ->assertSee('Software & Web Developer')
            ->assertSee('Biodata Pribadi')
            ->assertSee('Career Changelog.')
            ->assertSee('Zinus Ticketing')
            ->assertSee('Maritime Commerce')
            ->assertSee('HSE Asset Management')
            ->assertSee('Local AI OS');
    }

    public function test_section_routes_redirect_to_the_expected_destinations(): void
    {
        $this->get('/projects')->assertRedirect('/#projects');
        $this->get('/lab')->assertRedirect('/#lab');
        $this->get('/about')->assertRedirect('/profile');
        $this->get('/contact')->assertRedirect('/#contact');
    }
}
