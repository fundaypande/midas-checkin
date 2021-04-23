<?php


    // update tabel
    Schema::table('users', function (Blueprint $table) {
        $table->string('username')->nullable()->change();
        $table->string('provider')->nullable()->change();
        $table->string('provider_id')->nullable()->change();
        $table->string('photo')->nullable()->change();
        $table->string('password')->nullable()->change();
    });

    // menambah kolom
    Schema::table('users', function (Blueprint $table) {
        $table->string('photo');
    });

    // membuat index di migration
    $table->index(['account_id', 'created_at']);

    // memanggil class diri sendiri
    Self::findOrFail($userId);

    // Pengecekan sudah dibaca atau belum
    $readed = MDiscussion::select('readed')
                -> where('profile_id', $data->id)
                -> where('is_admin', null)
                -> where('readed', 0)
                -> first();

?>

// Add tailwind via CDN
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

<!-- TIMER -->
https://stackoverflow.com/questions/20618355/the-simplest-possible-javascript-countdown-timer
