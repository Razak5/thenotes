<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Models\Note;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;



class sendEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Note $note)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $noteUrl =  config('app.url') . '/notes/' . $this->note->id;  //getting the public facing url of note.
        $emailContent = "Hello, note recieved. view here: {$noteUrl}";

        Mail::raw($emailContent, function ($message) {
            $message->from('thenotes@mailpot.co', "Thenotes")
                ->to($this->note->recipient)
                ->subject('New note from ' . $this->note->user->name);
        });
    }
}
