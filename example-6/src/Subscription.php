<?php

namespace App;

class Subscription
{
  // protected Gateway $gateway;

  public function __construct(protected Gateway $gateway, protected Mailer $mailer)
  {
    // $this->gateway = $gateway;
  }

  public function create(User $user)
  {
    $receipt = $this->gateway->create();

    $user->markAsSubscribed();

    $this->mailer->deliver('Your receipt number is: ' . $receipt);
  }
}