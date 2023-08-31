<?php

namespace App\Listeners;

use App\Models\File;
use App\Models\Downloaded;
use App\Events\DownloadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DownloadedLog
{

    public function __construct()
    {
    }


    public function handle(DownloadFile $event): void
    {
        $ip = '3.3.6.9';
        $apiKey = '0ecb6b33329a4c7aa1aacc9329ca3b88';

        $url = "https://api.ipgeolocation.io/ipgeo?apiKey=$apiKey&ip=$ip&fields=country_code2,country_name";

        $response = Http::get($url);
        $data = $response->json();

        $file = $event->file;
        Downloaded::create([
            'file_id' => $file->id,
            'time' => now(),
            'country_name' => $data['country_name'],
            'country_code' => $data['country_code2'],
            'ip' => $ip,
            'user_agent' => request()->header('User-Agent'),
            'created_at' => now()
        ]);

        File::where('id', $event->file->id)->increment('download_count');
    }
}
