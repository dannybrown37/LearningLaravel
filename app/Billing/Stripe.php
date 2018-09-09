<?php


namespace App\Billing;


class Stripe
{

  protected $key;
  public function __contruct($key)
  {
    $this->key = $key;
  }
}
