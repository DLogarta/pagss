<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $case;
    public $name;
    public $employee_id;
    public $email;
    public $phone;
    public $topic;
    public $priority_level;
    public $description;
    public $location;

    /**
     * Create a new message instance.
     *
     * @param string $case
     * @param string $name
     * @param string $employee_id
     * @param string $email
     * @param string $phone
     * @param string $topic
     * @param string $priority_level
     * @param string $description
     * @param string $location
     */
    public function __construct($case, $name, $employee_id, $email, $phone, $topic, $priority_level, $description, $location)
    {
        $this->case = $case;
        $this->name = $name;
        $this->employee_id = $employee_id;
        $this->email = $email;
        $this->phone = $phone;
        $this->topic = $topic;
        $this->priority_level = $priority_level;
        $this->description = $description;
        $this->location = $location;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Helpdesk Report [Case: ' . $this->case . ']')
            ->view('emails.helpdesk_emails.report_created');
    }
}
