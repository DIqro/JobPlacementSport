<?php

namespace Tests\Browser\Auth;

use Tests\DuskTestCase;
use App\Models\M_member;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends DuskTestCase
{

    /** @test */
    public function guest_can_register(){

        $this->browse(function(Browser $browser){
            $browser->visit('/registrasi')
                    ->type('name', 'tester')
                    ->type('email', 'tester@test.com')
                    ->type('alamat', 'Ngalam')
                    ->type('tgl_lahir', '1997-11-04')
                    ->type('password', '123456')
                    ->type('password_confirmation', '123456')
                    ->press('Signup')
                    ->assertSee('Akun anda berhasil dibuat. Silahkan login');
        });
    }

    /** @test */
    public function guest_can_login(){

        $member = factory(M_member::class)->create([
            'email' => 'tester2@test.com'
        ]);

        $this->browse(function(Browser $browser) use ($member){
            $browser->visit('/login')
                    ->type('email', $member->email)
                    ->type('password', 'secret')
                    ->press('Signin')
                    ->assertPathIs('/');
        });
    }
}
