<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use SerializesModels;

    public $data;

    /**
     * Buat instansi baru dari pesan email.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Bangun pesan email.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        return $this->subject('New Contact Message')
                    ->view('email.contact') // Menentukan view untuk body email
                    ->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'messages' => $this->data['message'],
                    ]);
    }
}
