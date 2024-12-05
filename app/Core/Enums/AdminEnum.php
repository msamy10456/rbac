<?php

namespace App\Core\Enums;

enum StatusEnum: string
{

    case manager = "manager";

    case Admin = "admin";



    public function statusMessage(): string|null
    {
        return match ($this) {
            self::manager => "<span class='badge badge-success'>manager</span>",
            self::Admin => "<span class='badge badge-primary'>Admin</span>",
            default => null
        };
    }

}
