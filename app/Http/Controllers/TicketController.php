<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketCategory;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Ticket::all();

        $category = TicketCategory::orderBy('price','DESC')->get();
       
        return view('home', [
            'categori' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ticket' => 'required|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required',
            'campus' => 'required',
        ]);

        $model = new Ticket;
        $model->ticket_category_id = $request->ticket;
        $model->quantity = "1";
        $model->customer_name = $request->name;
        $model->customer_nra = $request->nra;
        $model->customer_phone = $request->phone;
        $model->customer_email = $request->email;
        $model->customer_address = $request->address;
        $model->customer_campus = $request->campus;
        $model->merchandise = $request->tshirt.','.$request->tshirt_type.','.$request->tshirt_size;
        $model->status_id = "1";
        $model->save();

        return redirect()->back()->with('message-order-ticket', 'Berhasil pesan tiket');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
