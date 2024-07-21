<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $data = Ticket::with(['movieSchedule', 'bill'])->paginate(20);
        return view('admin.ticket.index', compact('data'));
    }
    public function updateStatus(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = $request->status;
        $ticket->save();
        return redirect()->back();
    }
}
