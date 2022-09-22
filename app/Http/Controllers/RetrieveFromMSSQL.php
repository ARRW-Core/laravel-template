<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RetrieveFromMSSQL extends Controller
{
    //db connection sqlsvr
    public function index() {
        return dd(DB::connection('sqlsrv')->select("SELECT dbo.ras_Users.DIN, dbo.ras_Users.UserName, ras_AttRecord.Clock, ras_AttTypeItem.ItemId
FROM dbo.ras_AttRecord
INNER JOIN dbo.ras_Users ON ras_AttRecord.DIN = ras_Users.DIN
INNER JOIN dbo.ras_AttTypeItem ON ras_AttRecord.AttTypeId = ras_AttTypeItem.ItemId
INNER JOIN dbo.ras_Dept ON ras_Users.DeptId = ras_Dept.DeptId"));
    }
}
