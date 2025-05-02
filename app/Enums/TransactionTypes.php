<?php 

declare(strict_types=1);

namespace App\Enums;

enum TransactionTypes: string
{
    case DEPOSIT = 'deposit';
    case WITHDRAWAL = 'withdrawal';
    case TRANSFER = 'transfer';
    case PAYMENT = 'payment';
    case REFUND = 'refund';

    public static function types(): array
    {
        return [
            self::DEPOSIT,
            self::WITHDRAWAL,
            self::TRANSFER,
            self::PAYMENT,
            self::REFUND,
        ];
    }
}