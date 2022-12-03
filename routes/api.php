<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\Status;

use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketStatusController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('get-tickets', 'App\Http\Controllers\TicketController@getTickets');
Route::post('scan-ticket-show', 'App\Http\Controllers\TicketController@scanTicketShow');
Route::post('scan-ticket-attendance', 'App\Http\Controllers\TicketController@scanTicketAttendance');
Route::post('edit-ticket', 'App\Http\Controllers\TicketController@editTicket');
Route::post('delete-ticket', 'App\Http\Controllers\TicketController@deleteTicket');
Route::post('get-data', 'App\Http\Controllers\TicketController@getData');
Route::post('login', 'App\Http\Controllers\TicketController@login');
