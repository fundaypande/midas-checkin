# FUTURE STEP
+ [DONE] Verifikasi email 
+ [DONE] Reset password by email
+ [DONE] Change password in admin panel
+ [ALMOST DONE] Backup database (TESTING FROM WINDOWS) - Pencarian mysqldump
+ Membuat bot telegram
+ Membuat setting website [50% - Belum ada viewnya]
+ Perbaiki post dan page

+ Send email

# BUG
+ Pisahkan login dan logout view
+ Sidebar menu jika di hidden, hover menunya tidak sesuai



# DOCUMENTATION:

Laravel version: 5.8.35

Untuk mengambil package dependency dari npm gunakan:
"stisla-start": "yarn install --production=false",
"stisla-dev": "yarn install --prod",

A. LOGIN
Login menggunakan fitur auth dari laravel. Database user dibuat dari migration. Kemudian diisi data oleh seeder dengan menjalankan perintah:
"php artisan db:seed"  karena class yang digunakan adalah UserSeeder.php
Class UserSeeder dipanggil melalui DatabaseSeeder.php
Login:
email: admin@admin.com
password: admin

A1. REGISTER
Untuk register, seluruh user yang registrasi mandiri akan diberikan role_id : 3 dengan nama role 'User'.


B. ROLE
Setiap user memiliki role. Role pertama kali di buat adalah role Super Admin. Role ini akan langsung menjadi role dari admin yang dibuat dari seeder.
Nama table di database: 'roles'.

Role default utama terdiri dari 3 role yakni:
1. Super Admin
2. Admin
3. User

Role tidak menggunakan middleware. Role hanya membatasi setiap akses user ke setiap function di controller.
Setiap function memiliki ID_FEATURE yang terdata di database. Setiap user memiliki data ID_FEATURE. 
Maka setiap user yang akan mengakses function di controller akan dicek apakah user tersebut punya ID_FEATURE untuk mengakses function tersebut.

Role user akan dicek untuk menghindari user tidak memiliki role_id. Hal ini bisa terjadi jika ROLE yang diberikan kepada user tersebut
telah dihapus oleh admin. Logikanya, jika role sudah dihapus, artinya setiap user yang memiliki role tersebut tidak boleh login lagi.
Hal tersebut dibatasi di file LoginController.php dengan function authenticated()

C. FEATURE
Setiap fitur khusus yang ada di sistem akan di definisikan di database. Fitur-fitur tersebut akan dijabarkan oleh setiap role.
Intinya, setiap role dapat memiliki banyak feature, dan ketika mengakses salah satu feature maka akan di cek apakah rolenya memiliki feature yang ingin diakses
Jika tidak maka, pengguna akan didirect back, jika punya maka akan diarahkan ke feature yang diminta
Tabel dalam database:
+ features : Untuk menyimpan nama-nama fitur
+ feature_masters : Untuk mengelompokkan fitur. Sebagai master fitur
+ feature_categories : Untuk menkategorikan fitur ke menu di sidebar

D. GLOBAL ALERT
Global alert sudah di definisikan di setiap user melalui template blade di file 'master-admin.blade.php'.
Alert menggunakan session di laravel dengan nama session:
+ alert-success
+ alert-danger
+ alert-warning

E. USERS MANAGEMENT
Fitur ini bisa melakukan update role user, menambah user, menghapus user dan mereset password user.
Menghapus user secara softDelete. Jadi akun user tidak benar-benar di hapus. Melainkan di sembunyikan dari data.
+ Reset Password akan dikembalikan ke password: '123456'
Pengecekan otomatis ketika input email dilakukan dengan ajvascript.
Idenya adalah menyimpan data-data seluruh email ke array, kemudian mencocokkan inputan email dengan data2 pada array tersebut
Contoh filenya ada di users.blade.php dengan metode setField
Controller yang menangani pengambilan data email ada di ProfileCont.php

F. HISTORY
Fitur ini dapat menyimpan seluruh aktifitas yang dilkaukan oleh user mulai dari create, update, delete dan restore data yang ada di database.
Class utamanya adalah History.php yang berisikan fungsi-fungsi untuk merekam aktifitas pengguna.
Filter untuk history menggunakan:
+ Action
+ User
+ Feature
+ Rentang Tanggal
Filter langsung berada di HistoryCont.php menggunakan datatable

G. FEATURE CATEGORY
Fitur ini adalah untuk mengkategorikan fitur-fitur yang nantinya akan tampil di menu. Sehingga di menu akan terorganisir
fitur-fitur yang ada pada sistem

H. FEATURE MASTER
Fitur ini adalah fitur untuk membuat feature. Jadi setiap feature baru akan didaftarkan terlebih dahulu di database.
Untuk membuat fitur harus terlebih dahulu memiliki feature master di tabel 'feature_masters'
Sehingga pada fitur ini yang ditampilkan diawal adalah data feature master, kemudian ketika klik detail
maka akan diarahkan ke fitur-fitur yang sesuai dengan featur master yang dipilih

I. GLOBAL VARIABEL.
Global variabel adalah variabel2 yang dapat diakses di seluruh view yang ada di sistem.
GLobal variabel umum digunakan di sidebar untuk mendefinisikan menu2 yang dapat diakses oleh pengguna.
Pendefinisian ada di App\Provicer\ComposerServiceProvider.php
Data global variabel ada di app/Http/ViewComposers/UserComposer.php
Pendaftaran ComposerServiceProvider dilakukan di config/app.php

J. SETTING WEBSITE 
Setting website adalah data umum sebuah website yang tersimpan di database dengan table 'settings' berisikan:
1. Title
2. Tag Line
3. Logo
4. Favicon

K. RESET PASSWORD VIA EMAIL
Rset password dilakukan secara manual di AccountsController.php
Token dibuat di tabel reset_passwords. Ketika berhasil diriset maka semua data email di tabel tersebut akan dihapus. Artinya tokennya sudah tidak ada.

L. BACKUP LARAVEL 
Bakcup menggunakan package 'laravel backup' dari spatie 
https://github.com/spatie/laravel-backup
Ikuti instalasi guide disini https://docs.spatie.be/laravel-backup/v6/installation-and-setup/ 
Backup default menggunakan email. Untuk konfigurasi email tujuan. Cek di file backup.php (setelah mengikuti instruksi)
ISSUE:: mysql dump tidak ditemukan. Setting bisa dilakukan di file 'database.php'
Setting bagian binnary untuk mencari data mysqldump nya
'dump' => [
    'dump_binary_path' => '/Application/XAMPP/xamppfiles/bin/mysqldump', // only the path, so without `mysqldump` or `pg_dump`
    'use_single_transaction',
    'timeout' => 60 * 5, // 5 minute timeout
    'add_extra_option' => '--optionname=optionvalue',
]
Di macbook susah ditemukan!
Sudah di definisikan di kernel.php Bisa dicek


## GLOBAL DATA 

1. VIEW WITH BACK REDIRECT VARIABLE TO ALL VIEW PANEL
    + alert-success
    + alert-warning
    + alert-danger


# COMMAND
FULL CRUD Ada di fitur feature category dengan dile FeatureCatCont.php Bisa dijadikan role CRUD

php artisan migrate:fresh --seed
php artisan db:seed --class=UserSeeder

Set cookie: Cookie::queue(Cookie::make('cookieName', 'value', $minutes));

Get cookie: $value = $request->cookie('cookieName'); or $value = Cookie::get('cookieName');

Forget/remove cookie: Cookie::queue(Cookie::forget('cookieName'));

Check if cookie exist: Cookie::has('cookiename'); or $request->hasCookie('cookiename') will return true or false

Untuk membuat html bekerja di datatable server
->rawColumns(['action', 'act', 'status-act', 'created-act'])

Cek ketersediaan request:
$checked = $request->has('delete') ? 1 : 0;

# Tutorial
Signature PAD Laravel https://www.asepit.com/cara-membuat-tandatangan-signature-pad-di-laravel https://www.itsolutionstuff.com/post/laravel-signature-pad-example-tutorialexample.html

real 
https://github.com/thread-pond/signature-pad







