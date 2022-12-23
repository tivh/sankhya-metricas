<?php

namespace App\Http\Controllers;

use App\Exports\SheetsVendedor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\VendedorExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;

class MedidasController extends Controller
{
    public function index()
    {
    }
}
