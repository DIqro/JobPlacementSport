<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JPSTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(){
        parent::setUp();
        $this->job = factory('App\Models\M_lowker')->create();
        $this->member = factory('App\Models\M_member')->create(); 
    }

    public function make_job($fields = []){
        $this->actingAs($this->member);
        return factory('App\Models\M_lowker')->make($fields);
    }

    /** @test */
    public function member_can_see_jobs_page(){
        $this->actingAs($this->member);
        $this->get('/')->assertSee($this->job->judul);
    }

    /** @test */
    public function member_can_see_single_jobs_page(){
        $this->actingAs($this->member);
        $this->get('/lowker/'. $this->job->id_lowker)->assertSee($this->job->deskripsi);
    }

    /** @test */
    public function guest_cant_create_a_job(){
        $this->get('/lowker/tambah-lowker')->assertRedirect('/');
    }

    /** @test */
    public function member_can_create_a_job(){
        $job = $this->make_job(); 
        $this->post('/lowker/tambah-lowker', $job->toArray())->assertRedirect('/');

        // $this->get('/lowker/'. $job->id_lowker)->assertSee($job->judul);
    }

    /** @test */
    public function job_requires_title(){
        $job = $this->make_job(['judul' => null]);
        $this->post('/lowker/tambah-lowker', $job->toArray())->assertSessionHasErrors('judul');
    }

    /** @test */
    public function member_can_update_profile(){
        $this->actingAs($this->member);
        $newName = 'Andeci';
        $newAlamat = 'Ngalam';
        $newTgl = '1991-01-01';

        $redirect = '/profil';
        $this->json('POST', '/update-profil', [
            'nama' => $newName,
            'alamat' => $newAlamat,
            'tgl_lahir' => $newTgl
        ])->assertRedirect($redirect);
    }

}
