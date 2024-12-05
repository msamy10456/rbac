<?php

namespace App\Core\Enums;

enum StatusEnum: string
{

    case In_progress = "in-progress";

    case Completed = "completed";

    case Pending = "pending";


    public function statusMessage(): string|null
    {
        return match ($this) {
            self::Completed => "<span class='badge badge-success'>Completed</span>",
            self::Pending => "<span class='badge badge-warning'>Pending</span>",
            self::In_progress => "<span class='badge badge-primary'>In progress</span>",
            default => null
        };
    }
    public function statusColor(): string|null
    {
        return match ($this) {
            self::Completed => "bg-success",
            self::Pending => "bg-warning",
            self::In_progress => "bg-primary",
            default => null
        };
    }

}
