<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
class UsersExport implements FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public $users;
    public function __construct($users){
        $this->users=$users;
    }
    public function view(): View
    {
        return view('exports.users', [
            'users' => $this->users
        ]);
    }
}
