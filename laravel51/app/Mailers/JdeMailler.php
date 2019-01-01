<?php

namespace Jde\Mailers;

use Jde\User;
use Illuminate\Contracts\Mail\Mailer;

class JdeMailer
{

    /**
     * The Laravel Mailer instance.
     *
     * @var Mailer
     */
    protected $mailer;

    /**
     * The sender of the email.
     *
     * @var string
     */
    protected $from = 'jde@jde.com';

    /**
     * The recipient of the email.
     *
     * @var string
     */
    protected $to;

    /**
     * The view for the email.
     *
     * @var string
     */
    protected $view;

    /**
     * The data associated with the view for the email.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Create a new app mailer instance.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Deliver the email notification.
     *
     * @param  User $user
     * @return void
     */
    public function sendEmailNotificationTo(User $user)
    {
        $this->to = $user->email;

        $this->view = 'emails.notification';

        $this->data = compact('user');

        $this->deliver();
    }

    /**
     * Deliver the email.
     *
     * @return void
     */
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {

            $message->from($this->from, 'JDE professionals')

                    ->subject('invitation')
                    
                    ->to($this->to);
        });
    }
}
