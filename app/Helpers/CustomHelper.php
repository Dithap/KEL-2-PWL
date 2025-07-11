<?php

use App\Models\BookLoan;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

if (! function_exists('is_role')) {
    function is_role($roles) {
        if (Auth::check()) {
            return in_array(Auth::user()->role_id, (array) $roles) || Auth::user()->role_id === '4';
        }
        return false;
    }
}

if (! function_exists('encrypt_id')) {
    function encrypt_id($id)
    {
        return Hashids::encode($id);
    }
}

if (! function_exists('decrypt_id')) {
    function decrypt_id($hash)
    {
        $decoded = Hashids::decode($hash);
        return $decoded ? $decoded[0] : null;
    }
}

if (! function_exists('store_file')) {
    function store_file($file = null, $path, $disk = 'public')
    {
        if (filled($file) && $file && $file instanceof \Illuminate\Http\UploadedFile) {
            $randomFilename = Str::random(35).time().'.'.$file->getClientOriginalExtension();
            $originalFileName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();

            $file->storeAs($path, $randomFilename, $disk);

            return [
                'randomFileName' => $randomFilename,
                'originalFileName' => $originalFileName,
                'isSuccess' => true,
            ];
        } else {
            return [
                'randomFileName' => null,
                'originalFileName' => null,
                'isSuccess' => false,
            ];
        }
    }
}

if (!function_exists('display_file')) {
    function display_file($dir, $filename)
    {
        $path = storage_path("app/public/uploads/{$dir}/{$filename}");

        if(!filled($filename)){
            return '<p class="text-center">Belum ditambahkan.</p>';
        }

        if (!file_exists($path)) {
            return '<p class="text-center">File tidak ditemukan.</p>';
        }

        $mimeType = mime_content_type($path);
        $fileUrl = asset("storage/uploads/{$dir}/{$filename}");

        if (str_contains($mimeType, 'image')) {
            return "<img src='{$fileUrl}' alt='File Image' class='img-fluid'>";
        } elseif ($mimeType === 'application/pdf') {
            return "<iframe src='{$fileUrl}' width='100%' height='600px'></iframe>";
        }

        return '<p class="text-center">Format file tidak didukung</p>';
    }
}

if (! function_exists('delete_file')) {
    function delete_file($path)
    {
        // Menggunakan public_path untuk file yang berada di dalam storage/public
        $fullPath = public_path('storage/' . $path);

        if (File::exists($fullPath)) {
            File::delete($fullPath);
            return true;
        }

        return false;
    }
}

if (! function_exists('is_file_exists')) {
    function is_file_exists($path)
    {
        return File::exists(public_path('storage/' . $path));
    }
}

if (! function_exists('titlefy')) {
    function titlefy($text) {
        if(filled($text)){
            return Str::title($text);
        }else{
            return false;
        }
    }
}

if (!function_exists('shorten_text')) {
    function shorten_text($text, $maxLength = 100) {
        if (strlen($text) > $maxLength) {
            return substr($text, 0, $maxLength) . '...';
        }

        return $text;
    }
}

if (!function_exists('idn_date')) {
    function idn_date($tanggal, $format = 'd F Y')
    {
        return Carbon::parse($tanggal)->locale('id')->translatedFormat($format);
    }
}

if (!function_exists('get_loan')) {
    function get_loan($idBook, $idBorrower)
    {
        return BookLoan::where('book_id', '=', $idBook)->where('borrower_id', '=', $idBorrower)->first();
    }
}
