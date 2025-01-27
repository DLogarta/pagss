<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HelpdeskActionMail extends Mailable
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
    public $status;
    public $assigned_to;
    public $reason;

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
     * @param string $status
     * @param string|null $assigned_to
     * @param string|null $reason
     */
    public function __construct($case, $name, $employee_id, $email, $phone, $topic, $priority_level, $description, $status, $assigned_to = null, $reason = null)
    {
        $this->case = $case;
        $this->name = $name;
        $this->employee_id = $employee_id;
        $this->email = $email;
        $this->phone = $phone;
        $this->topic = $topic;
        $this->priority_level = $priority_level;
        $this->description = $description;
        $this->status = $status;
        $this->assigned_to = $assigned_to;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->generateSubject();
        $view = $this->determineView();

        return $this->subject($subject)
            ->view($view);
    }

    /**
     * Generate the email subject based on the status.
     *
     * @return string
     */
    private function generateSubject(): string
    {
        return match ($this->status) {
            'respond' => 'Helpdesk Report Responded [Case: ' . $this->case . ']',
            'make_fake' => 'Helpdesk Report Marked as Fake [Case: ' . $this->case . ']',
            'done' => 'Helpdesk Report Resolved [Case: ' . $this->case . ']',
            'delete' => 'Helpdesk Report Archived [Case: ' . $this->case . ']',
            'undo' => 'Helpdesk Report Status Reverted [Case: ' . $this->case . ']',
            default => 'Helpdesk Report Update [Case: ' . $this->case . ']',
        };
    }

    /**
     * Determine the view based on the status.
     *
     * @return string
     */
    private function determineView(): string
    {
        return match ($this->status) {
            'respond' => 'emails.helpdesk_emails.respond',
            'make_fake' => 'emails.helpdesk_emails.mark_fake',
            'done' => 'emails.helpdesk_emails.done',
            'delete' => 'emails.helpdesk_emails.delete',
            'undo' => 'emails.helpdesk_emails.undo',
            default => 'emails.helpdesk_emails.default',
        };
    }
}
