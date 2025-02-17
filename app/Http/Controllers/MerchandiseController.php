<?php

namespace App\Http\Controllers;

use Hash;
use App\Shop\Entity\User;
use App\Shop\Entity\Merchandise;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Mail;

class MerchandiseController extends Controller
{
    public function MerchandiseCreateProcess()
    {
        $merchandise_data = [
            'status' => 'C',
            'name' => '',
            'name_en' => '',
            'introduction' => '',
            'introduction_en' => '',
            'photo' => '',
            'price' => 0,
            'remain_count' => 0,
        ];
        $merchandise_sql_data = Merchandise::create($merchandise_data);
        return redirect('/merchandise/' . $merchandise_sql_data['id'] . '/edit');
    }
}
