<?php 

declare(strict_types=1);

namespace App\Enums;

final class TransactionTypes
{
    public const DISCOUNT = 'discount';
    public const DEPOSIT = 'deposit';
    public const PAYMENT = 'payment';
    public const CREDIT = 'credit';
    public const REFUND = 'refund';
}