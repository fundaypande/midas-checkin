<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_reservations')->insert([
            'user_id' => 1,
            'room_type_id' => 1,
            'tipe_reservation' => 'Reservation',
            'nama_depan' => 'pande',

            'nama_belakang' => 'pande',
            'company_name' => 'sudana',
            'address' => 'kubutamabahan',
            'email' => 'funday@gmail.com',
            'phone_number' => '1213123',
            'telephone_num' => '13123',
            'tanggal_checkin' => '2021-04-20',
            'tanggal_checkout' => '2021-05-23',
            'no_room' => '001',
            'room_rate' => '45000',
            'total_pax' => '45000',
            'billing_instruction' => 'yes',
            'remarks' => 'pande',
            'ttd' => 'pande',
            'created_at' => '2021-05-26 21:03:47'
        ]);

        DB::table('m_reservations')->insert([
            'user_id' => 1,
            'room_type_id' => 1,
            'tipe_reservation' => 'Reservation',
            'nama_depan' => 'pande',

            'nama_belakang' => 'pande',
            'company_name' => 'sudana',
            'address' => 'kubutamabahan',
            'email' => 'funday@gmail.com',
            'phone_number' => '1213123',
            'telephone_num' => '13123',
            'tanggal_checkin' => '2021-04-20',
            'tanggal_checkout' => '2021-05-23',
            'no_room' => '001',
            'room_rate' => '45000',
            'total_pax' => '45000',
            'billing_instruction' => 'yes',
            'remarks' => 'pande',
            'ttd' => 'pande',
            'created_at' => '2021-05-20 21:03:47'
        ]);

        DB::table('m_reservations')->insert([
            'user_id' => 2,
            'room_type_id' => 1,
            'tipe_reservation' => 'Reservation',
            'nama_depan' => 'pande',

            'nama_belakang' => 'pande',
            'company_name' => 'sudana',
            'address' => 'kubutamabahan',
            'email' => 'funday@gmail.com',
            'phone_number' => '1213123',
            'telephone_num' => '13123',
            'tanggal_checkin' => '2021-04-20',
            'tanggal_checkout' => '2021-05-23',
            'no_room' => '001',
            'room_rate' => '45000',
            'total_pax' => '45000',
            'billing_instruction' => 'yes',
            'remarks' => 'pande',
            'ttd' => 'pande',
            'created_at' => '2021-05-20 21:03:47'
        ]);

        DB::table('m_reservations')->insert([
            'user_id' => 3,
            'room_type_id' => 1,
            'tipe_reservation' => 'Reservation',
            'nama_depan' => 'pande',

            'nama_belakang' => 'pande',
            'company_name' => 'sudana',
            'address' => 'kubutamabahan',
            'email' => 'funday@gmail.com',
            'phone_number' => '1213123',
            'telephone_num' => '13123',
            'tanggal_checkin' => '2021-04-20',
            'tanggal_checkout' => '2021-05-23',
            'no_room' => '001',
            'room_rate' => '45000',
            'total_pax' => '45000',
            'billing_instruction' => 'yes',
            'remarks' => 'pande',
            'ttd' => 'pande',
            'created_at' => '2021-05-20 21:03:47'
        ]);
    }
}
