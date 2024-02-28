<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use  App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailRegion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public  $queries;
    
    public function __construct($queries)
    {
      $this->queries= $queries;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    { 
       
        
        {foreach( $this->queries as $query)
            {
               Mail::to($query->email)->send(new SendMail());
            }
        }

    
    }
}
