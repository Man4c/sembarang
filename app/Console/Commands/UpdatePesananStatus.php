<?php

namespace App\Console\Commands;

use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdatePesananStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pesanan:update-pesanan-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status pesanan ke "Selesai" jika waktu selesai sudah terlewati';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentTime = Carbon::now(); // Waktu saat ini

        // Cari semua pesanan dengan waktu selesai yang sudah terlewati
        $pesanan = Pesanan::where('status', '!=', 'Selesai')
            ->where('selesai', '<=', $currentTime->toTimeString())
            ->get();

        foreach ($pesanan as $p) {
            $p->status = 'Selesai';
            $p->save();
        }

        $this->info('Status pesanan berhasil diperbarui.');
    }
}
