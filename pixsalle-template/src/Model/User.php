<?php

declare(strict_types=1);

namespace Salle\PixSalle\Model;

use DateTime;

class User
{

  private int $id;
  private ?string $pfp;
  private ?string $username;
  private string $email;
  private string $password;
  private ?int $phone;
  private string $membership;
  private float $money;
  private ?string $portfolio;
  private Datetime $createdAt;
  private Datetime $updatedAt;

  public function __construct(
    ?string $pfp,
    ?string $username,
    string $email,
    string $password,
    ?int $phone,
    string $membership,
    float $money,
    ?string $portfolio,
    Datetime $createdAt,
    Datetime $updatedAt
  ) {
    $this->pfp = $pfp;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
    $this->phone = $phone;
    $this->membership = $membership;
    $this->money = $money;
    $this->portfolio = $portfolio;
    $this->createdAt = $createdAt;
    $this->updatedAt = $updatedAt;
  }

  public function id()
  {
    return $this->id;
  }

  public function pfp()
  {
    return $this->pfp;
  }

  public function username()
  {
    return $this->username;
  }

  public function email()
  {
    return $this->email;
  }

  public function password()
  {
    return $this->password;
  }

  public function phone()
  {
    return $this->phone;
  }

  public function membership()
  {
    return $this->membership;
  }

  public function money()
  {
    return $this->money;
  }

  public function portfolio()
  {
    return $this->portfolio;
  }

  public function createdAt()
  {
    return $this->createdAt;
  }

  public function updatedAt()
  {
    return $this->updatedAt;
  }
}
