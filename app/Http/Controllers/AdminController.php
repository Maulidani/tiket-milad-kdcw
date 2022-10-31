<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketCategory;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ticket::all();

        if($data)
        {
            return response()->json([
                'message' => 'Success',
                'data' => $data,
            ]);

        } else 
        {
            return response()->json([
                'message' => 'Success',
                'data' => $data,
            ]);

        }
       
    }

}
