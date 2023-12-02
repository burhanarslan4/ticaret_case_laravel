<?php

namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository
{
    public function createInvoice(array $data)
    {
        return Invoice::create($data);
    }
}
