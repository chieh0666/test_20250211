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
            'name' => '安安',
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

    public function MerchandiseEditPage($merchandise_id)
    {
        $merchandise = Merchandise::where('id', $merchandise_id);
        if ($merchandise->count() === 0) {
            redirect('/');
        } else {
            $merchandise = $merchandise->first();
            
            $binding = [
                'title' => '編輯商品',
                'announcement' => '編輯商品',
                'merchandise' => $merchandise
            ];
            return view('merchandise.edit', $binding);
        }
    }
    public function MerchandiseEditProcess($merchandise_id)
    {
        $input = request()->all();

        unset($input['_token']);
        // dd($input);

        Merchandise::where('id', $merchandise_id)
            ->update($input);

        return redirect('/merchandise/' . $merchandise_id . '/edit');
    }
}
