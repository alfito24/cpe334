<?php

namespace App\Mail;

use App\Models\application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(application $application, $status, $email_data)
    {
        $this->application = $application;
        $this->status = $status;
        $this->email_data = $email_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->email_data['subject'])->view('email_confirmation')
                    ->with([
                        'application' => $this->application,
                        'status' => $this->status
                    ]);
    }
}
