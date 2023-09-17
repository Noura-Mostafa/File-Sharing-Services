<?php

namespace App\Jobs;

use App\Models\File;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ExpiredFiles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $files = File::whereDate('expiration' ,'<' , now())->cursor();
        
        foreach ($files as $file) {
            if (Storage::disk('local')->exists($file->filepath)) {
                // Delete the file from the storage disk
                Storage::disk('local')->delete($file->filepath);
            }

            // Delete the file record from the database
            $file->delete();
        }
    }
}
