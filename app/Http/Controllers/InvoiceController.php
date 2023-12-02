<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function showInvoice($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
        if (!$invoice) {
            return response()->json(['error' => 'Fatura bulunamadı.'], 404);
        }

        return response()->json($invoice);
    }
}

