<?php

namespace Tests\Browser\Auth;

use Tests\DuskTestCase;
use App\Models\M_member;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class JobTest extends DuskTestCase
{

    /** @test */
    public function member_can_create_a_job(){

        $member = factory(M_member::class)->create([
            'email' => 'tester3@test.com'
        ]);

        $this->browse(function(Browser $browser) use ($member){
            $browser->loginAs($member)
                    ->visit('/lowker/tambah-lowker')
                    ->type('judul', 'Title Test')
                    ->type('nama_lembaga', 'Test')
                    ->type('kategori', 'Test')
                    ->type('syarat', 'Test')
                    ->type('masa_berlaku', 'Test')
                    ->type('gaji', '10000000')
                    ->type('deadline', '2018-12-12')
                    ->type('alamat', 'Test')
                    ->type('kontak', '007')
                    ->type('deskripsi', 'Test')
                    ->press('Tambah Lowongan')
                    ->assertSee('Lowker berhasil ditambahkan dan sedang menunggu validasi Admin')
                    ->assertPathIs('/lowker/tambah-lowker');
        });
    }

    /** @test */
    public function member_can_update_profile(){

        $member = factory(M_member::class)->create([
            'email' => 'tester4@test.com'
        ]);

        $this->browse(function (Browser $browser) use ($member){
            $browser->loginAs($member)
                    ->visit('/profil')
                    ->clickLink('Edit Profil')
                    ->type('nama', 'Andeci')
                    ->press('Ubah Profil')
                    ->assertSee('Data profil berhasil di update')
                    ->assertPathIs('/profil');
        });
    }

}
