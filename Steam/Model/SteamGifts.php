<?php declare(strict_types = 1);

namespace Vairogs\Addon\Auth\OpenID\Steam\Model;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Stringable;
use Vairogs\Addon\Auth\OpenID\Steam\Contracts\User;

/**
 * @ORM\MappedSuperclass()
 */
class SteamGifts extends Steam implements Stringable
{
    /**
     * @ORM\Column(type="string", nullable=true, unique=true)
     */
    protected ?string $username = null;

    /**
     * @return string
     */
    #[Pure] public function __toString(): string
    {
        return $this->getUsername() ?? $this->getOpenID();
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     *
     * @return SteamGifts
     */
    public function setUsername(?string $username): User
    {
        $this->username = $username;

        return $this;
    }
}
