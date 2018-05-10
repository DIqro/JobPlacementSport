<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\M_member::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nama' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'alamat' => $faker->sentence(),
        'tgl_lahir' => $faker->dateTimeThisMonth(),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\M_lowker::class, function (Faker\Generator $faker) {

    return [
        'id_pemilik' => function(){
        	return factory('App\Models\M_member')->create()->id;
        },
        'judul' => 'Title Test',
        'nama_lembaga' => 'BSC',
        'kategori' => 'Pelatih',
        'syarat' => $faker->sentence(),
        'masa_berlaku' => '-',
        'gaji' => '10000000',
        'deadline' => $faker->dateTimeThisMonth(),
        'alamat' => 'Malang',
        'kontak' => '14045',
        'deskripsi' => $faker->paragraph,
        'status' => 'valid',
        'tgl_post' => $faker->dateTimeThisMonth()
    ];
});

$factory->define(App\Models\M_komentar::class, function (Faker\Generator $faker) {

    return [
        'id_komentator' => function(){
        	return factory('App\Models\M_member')->create()->id;
        },
        'id_lowker' => function(){
        	return factory('App\Models\M_lowker')->create()->id_lowker;
        },
        'isi' => $faker->sentence(),
        'tgl_komen' => $faker->dateTimeThisMonth()
    ];
});