<?php 

declare(strict_types=1);

namespace App\Enums;

enum TransactionTypes: string
{
    case DISCOUNT = 'discount';
    case DEPOSIT = 'deposit';
    case PAYMENT = 'payment';
    case CREDIT = 'credit';
    case REFUND = 'refund';

    public static function types(): array
    {
        return [
            self::DISCOUNT,
            self::DEPOSIT,
            self::PAYMENT,
            self::CREDIT,
            self::REFUND,
        ];
    }
}