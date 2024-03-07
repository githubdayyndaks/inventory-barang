<?php

namespace App\Events;

use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PeminjamanCreated
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $peminjaman;

    public function handle(PeminjamanCreated $event)
    {
        // Lakukan logika notifikasi untuk peminjaman barang yang terjadi pada model Barang
        $barang = $event->barang;
        $namaPeminjam = $barang->User->name;
        $notif = $namaPeminjam . ' telah melakukan peminjaman barang ' . $barang->nama_barang;

        // Simpan notifikasi ke dalam sesi pengguna lain
        session()->push('notifikasi', $notif);
        session()->put('jumlah_notifikasi', session()->get('jumlah_notifikasi', 0) + 1);
    }
}

