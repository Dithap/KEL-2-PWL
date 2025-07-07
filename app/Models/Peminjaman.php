<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $fillable = [
        'user_id',
        'judul_buku',
        'kode_buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_harus_kembali',
        'status',
        'catatan'
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
        'tanggal_harus_kembali' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isLate(): bool
    {
        return $this->status === 'dipinjam' && now()->isAfter($this->tanggal_harus_kembali);
    }

    public function getDaysLateAttribute(): int
    {
        if ($this->isLate()) {
            return now()->diffInDays($this->tanggal_harus_kembali);
        }
        return 0;
    }
}
