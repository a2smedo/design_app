<?php

namespace App\View\Components;


use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $data['notifications_count'] = Notification::count();
        $data['notifications'] = Notification::groupBy('title')->get();

        $dMint = Carbon::now();
        $currentMin = 0;
        foreach ($data['notifications'] as $val) {

            $currentMin = $dMint->diffInMinutes($val->created_at);
        }

        $data['currentMin'] = $currentMin;

        return view('components.navbar')->with($data);
    }
}
