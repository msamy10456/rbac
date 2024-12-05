<?php

namespace App\Core\Enums;

enum PriorityEnum: string
{

    case Low = "low";

    case Medium = "medium";

    case High = "high";


    public function statusMessage(): string|null
    {
        return match ($this) {
            self::Low => "<span class='badge badge-primary'>Low</span>",
            self::Medium => "<span class='badge badge-warning'>Medium</span>",
            self::High => "<span class='badge badge-danger'>High</span>",
            default => null
        };
    }

}
