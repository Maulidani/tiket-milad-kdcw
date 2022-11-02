<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\Status;

use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketStatusController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', TicketController::class);
Route::resource('ticket', TicketController::class);

Route::post('ticket-status', function (Request $request) {

    $request->validate([
        'nra' => 'required',
    ]);

    $status = Ticket::join('statuses','statuses.id','tickets.status_id')
        ->join('ticket_categories','ticket_categories.id','tickets.ticket_category_id')
        ->where('tickets.customer_nra', $request->nra)->first(['tickets.*', 'ticket_categories.name']);

    if($status) {
        return back()->with('message-status-ticket', $status);

    } else {
        return back()->with('message-status-ticket', 'error');
    }

});

Route::resource('admin', AdminController::class);

Route::get('my-ticket', function() {
    return view('eticket');
});

Route::post('my-ticket-checking', function (Request $request) {

    $status = Ticket::join('statuses','statuses.id','tickets.status_id')
    ->join('ticket_categories','ticket_categories.id','tickets.ticket_category_id')
    ->where('tickets.id', $request->ticket_id)->first(['tickets.*', 'ticket_categories.name']);

    if($status) {
        return redirect('/my-ticket')->with('message-my-ticket', $status);
    } else {
        return back()->with('message-status-ticket', 'error');
    }

});
