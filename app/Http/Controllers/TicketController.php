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
            'name' => 'required|max:35',
            'nra' => 'required|max:24',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|email',
            'address' => 'required',
            'campus' => 'required',
        ]);

        if($request->ticket == '2' || $request->ticket == '3') {
            $request->validate([
                'tshirt' => 'required',
                'tshirt_type' => 'required',
                'tshirt_size' => 'required',
            ]);
        }

        $exist = Ticket::where([
            ['customer_nra',$request->nra],
            ['customer_campus',$request->campus],
            ])->first();

        if($exist) {
            return redirect()->back()->with('message-order-ticket', 'NRA ini sudah pesan, hubungi narahubung yang tertera untuk konfirmasi lebih lanjut');
        } else {

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

            if($model) {
                return redirect()->back()->with('message-order-ticket', 'Berhasil pesan tiket');
            
            } else {
                return redirect()->back()->with('message-order-ticket', 'terjadi kesalahan');
            }
    
    
        }

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

    //api
    public function getTickets(Request $request)
    {
         // $encrypt = \Crypt::encrypt($ticket_id);
        // $decrypt = \Crypt::decrypt($ticket_id);

        // return response()->json([
        //     // 'message' => $encrypt,
        //     'decrypt' => $decrypt,
        //     'ori' => $ticket_id,
        // ]);

        $data = Ticket::join('ticket_categories','ticket_categories.id','tickets.ticket_category_id')
        ->join('statuses','statuses.id','tickets.status_id')
        ->where('tickets.customer_name', 'like', "%" . $request->search . "%")
        ->orWhere('tickets.customer_nra', 'like', "%" . $request->search . "%")
        ->orderBy('tickets.updated_at', 'DESC')
        ->get(
            ['tickets.*','ticket_categories.name as ticket','statuses.name as status']
        );
 	 	 	 	 	 	 	 	 	 	 	
        if($data){

            foreach($data as $i) 
            {
                $encrypt = \Crypt::encrypt($i->id);

                $ticket[] = array(
                    'url'=> 'my-ticket/'.$encrypt,
                    'id'=> $i->id,
                    'ticket'=> $i->ticket,
                    'quantity'=> $i->quantity,
                    'customer_name'=> $i->customer_name,
                    'customer_nra'=> $i->customer_nra,
                    'customer_phone'=> $i->customer_phone,
                    'customer_email'=> $i->customer_email,
                    'customer_address'   => $i->customer_address,
                    'customer_campus'   => $i->customer_campus,
                    'merchandise'   => $i->merchandise,
                    'status'   => $i->status,
                    'created_at'   => $i->created_at,
                    'updated_at'   => $i->updated_at,
                );
            }

            return response()->json([
                'message' => 'Success',
                'errors' => false,
                'data' => $ticket
            ]);

        } else {
            return response()->json([
                'message' => 'Failed',
                'errors' => true,
            ]);
        }

    } 
     
    public function scanTicketAttendance(Request $request)
    {
        $nraCampus = explode(',', $request->nra_campus);

        $data = Ticket::where([
            ['customer_nra', $nraCampus[0]],
            ['customer_campus', $nraCampus[1]],
        ])->first();

        if($data){
            return response()->json([
                'message' => 'Success',
                'errors' => false,
                'ticket' => $data
            ]);

        } else {
            return response()->json([
                'message' => 'Failed',
                'errors' => true,
            ]);
        }

    }
     
    public function scanTicketShow(Request $request)
    {
        //
    }

}
