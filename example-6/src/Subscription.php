<?php

namespace App;

class Subscription
{
  // protected Gateway $gateway;

  public function __construct(protected Gateway $gateway)
  {
    // $this->gateway = $gateway;
  }

  public function create(User $user)
  {
    $this->gateway->create();

    $user->markAsSubscribed();
  }
}