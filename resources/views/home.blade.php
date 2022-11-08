    <!-- Stage- Bootstrap one page Event ticket booking theme
    Created by pixpalette.com - online design magazine -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Tiket - MILAD 22 KDCW</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">

        <!-- fonts -->
        <link href='http://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        {{-- <div class="loader">
            <div>
                <img src="images/icons/preloader.gif" />
            </div>
        </div> --}}

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5 left-wrapper">
                    <div class="event-banner-wrapper">
                        <!-- <div class="logo">
                            <h1>22nd Anniversary KeDai Computerworks</h1>
                        </div>

                        <h2>
                            Rewrite<br>Blue Folder
                            <span>
                                <h4>Kapal Pinisi, Pantai Losari, 10 December 2022</h4>
                                <h4>Cooming soon, 10 December 2022</h4>
                            </span>
                        </h2> -->
                    </div>
                </div>
                <div class="col-sm-7 right-wrapper">
                    <div class="event-ticket-wrapper">
                        <div class="event-tab">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                
                                @if(session()->has('message-status-ticket'))
                                <li role="presentation"><a href="#buyTicket" aria-controls="buyTicket"
                                        role="tab" data-toggle="tab">Tiket</a></li>
                                
                                @else  
                                <li role="presentation" class="active"><a href="#buyTicket" aria-controls="buyTicket"
                                        role="tab" data-toggle="tab">Tiket</a></li>
                                @endif

                                <li role="presentation"><a href="#venue" aria-controls="venue" role="tab"
                                        data-toggle="tab">Lokasi</a></li>
                                        
                                <li role="presentation"><a href="#merchandise" aria-controls="merchandise" role="tab"
                                        data-toggle="tab">Merchandise</a></li>

                                <li role="presentation"><a href="#termCondition" aria-controls="termCondition"
                                        role="tab" data-toggle="tab">Alur pemesanan</a></li>

                                @if(session()->has('message-status-ticket'))
                                <li role="presentation" class="active"><a href="#my-ticket" aria-controls="my-ticket"
                                        role="tab" data-toggle="tab">Tiket saya</a></li>
                        
                                @else  
                                <li role="presentation"><a href="#my-ticket" aria-controls="my-ticket"
                                        role="tab" data-toggle="tab">Tiket saya</a></li>
                                @endif

                            
                            </ul>


                            <!-- Tab panes -->
                            <div class="tab-content">
                                @if(session()->has('message-status-ticket'))
                                <div role="tabpanel" class="tab-pane fade" id="buyTicket">
                                @else
                                <div role="tabpanel" class="tab-pane fade in active" id="buyTicket">
                                @endif

                                    <div class="row">
                                        @php
                                            $i=0;
                                        @endphp
    
                                        @foreach ($categori as $cgr)
    
                                        @php
                                            $i++;
                                        @endphp

                                            <div class="col-md-6">
                                                <div class="ticketBox" data-id="{{ $cgr }}">
                                                    <div class="inactiveStatus"></div>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <div class="ticket-name">{{ $cgr->name }}
                                                      
                                                            @if($cgr->name =='Platinum')         
                                                                <span>Family<br>1 Tiket untuk 3 orang
                                                            @else
                                                                <span>-<br>1 Tiket untuk 1 orang
                                                            @endif
                                                                </span>

                                                            </div>
                                                        </div>

                                                        <div class="col-xs-6">
                                                            <div class="ticket-price-count-box">
                                                                <div class="ticket-control">
                                                                    <div class="input-group">
                                                                        <span class="input-group-btn">
                                                                            <button type="button"
                                                                                class="btn btn-default btn-number"
                                                                                disabled="disabled" data-type="minus"
                                                                                data-field="quant[{{ $i }}]">
                                                                                <span
                                                                                    class="glyphicon glyphicon-minus"></span>
                                                                            </button>
                                                                        </span>
                                                                        <input type="text" name="quant[{{ $i }}]"
                                                                            class="form-control input-number"
                                                                            value="0" min="0"
                                                                            max="1">
                                                                        <span class="input-group-btn">
                                                                            <button type="button"
                                                                                class="btn btn-default btn-number"
                                                                                data-type="plus" data-field="quant[{{ $i }}]">
                                                                                <span
                                                                                    class="glyphicon glyphicon-plus"></span>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <p class="price">Rp. {{ $cgr->price }}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="ticket-description">
                                                        {!! $cgr->description !!}
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    
                                        <div class="col-md-6">
                                            <div class="ticketBox">
                                                <div class=""></div>

                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <div class="ticket-name">
                                                            <span>Narahubung :</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="ticket-description">
                                                    <p>- Hp./Wa 1 : 088888888<br>- Hp./Wa 2 : 088888888
                                                    <p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="venue">
                                    <h4> Cooming soon !</h4>
                                    <!-- <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam<h4>
                                            <br><img src="images/logo-milad-22.jpeg" style="max-width:100%;">
                                            <br><br>
                                            <img src="images/logo-milad-22.jpeg" style="max-width:100%;">
                                            <br><br>
                                            <img src="images/logo-milad-22.jpeg" style="max-width:100%;">
                                            <br><br> -->

                                            <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=MAkassar&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://formatjson.org/">format json</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="merchandise">
                                    <!-- <h4> Cooming soon !</h4> -->
                                  
                                    <!-- <h4>Merchandise<h4>
                                            <br><img src="images/logo-milad-22.jpeg" style="max-width:100%;">
                                            <br><br>
                                            <img src="images/logo-milad-22.jpeg" style="max-width:100%;">
                                            <br><br>
                                            <img src="images/logo-milad-22.jpeg" style="max-width:100%;">
                                            <br><br> -->

                                    <img src="images/merchandise.jpeg" style="max-width:100%;">

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="termCondition">
                                    <ol>
                                        <h4>
                                            <li>Pembelian tiket resmi secara online melalui
                                                situs web www.com</li>
                                        </h4>
                                        <h4>
                                            <li>Pilih kategori tiket</li>
                                        </h4>
                                        <h4>
                                            <li>Masukkan data diri</li>
                                        </h4>
                                        <h4>
                                            <li>Proses pesanan</li>
                                        </h4>
                                        <h4>
                                            <li>Untuk informasi lebih lanjut, anda akan dihubungi melalui nomor whatsapp yang telah diinput</li>
                                        </h4>
                                    </ol>   
                                    <br><br>
                                </div>

                                @if(session()->has('message-status-ticket'))
                                <div role="tabpanel" class="tab-pane fade in active" id="my-ticket">
                                @else
                                <div role="tabpanel" class="tab-pane fade" id="my-ticket">
                                @endif
                                
                                    <div class="row">
                                            <div class="col-md-8">
                                                <div class="ticketBox" data-id="{{ $cgr }}">
                                                    <div class="inactiveStatus"></div>
                                                    <div class="row">
                                                        <div class="col-xs-10">
                                                            <div class="ticket-name">Cek tiket
                                                    
                                                                <span>
                                                                    Masukkan NRA untuk cek tiket
                                                                    <br><br>    
                                                                    <form method="POST" action="{{ url('ticket-status') }}">
                                                                        @csrf
                                                                        <div class="form">
                                                                            <input type="text" class="form-control" name="nra"
                                                                                placeholder=" NRA" required>
                                                                            <select class="form-control" id="campus" name="campus" required>
                                                                                <option value="" disabled selected >Kampus</option>
                                                                                <option value="dipa">KD DIPA</option>
                                                                                <option value="umi">KD UMI</option>
                                                                            </select>
                                                                            <br>
                                                                            <button type="submit" id="check" class="btn">Cek</button>
                                                                        </div>
                                                                    </form>
                                                                </span>

                                                            </div>
                                                        </div>

                                                    </div>
                                        
                                                    {{-- Message --}}
                                                    @if(session()->has('message-status-ticket'))
                                                        <div class="ticket-description">                                                                
                                                        @if(session()->get('message-status-ticket') == 'error')
                                                            <div class="alert alert-danger">
                                                                <ul><li> {{ 'Tidak tersedia' }} </li></ul>
                                                            </div>
                                                        @else
                                                            <div class="alert alert-success">
                                                                Ticket {{ session()->get('message-status-ticket')->name }}
                                                                #{{ session()->get('message-status-ticket')->id }}
                                                                <ul>
                                                                    @if(session()->get('message-status-ticket')->ticket_status == 'pending')
                                                                      <li style="color:red;">Status : {{ session()->get('message-status-ticket')->ticket_status }}, 
                                                                        Belum menyelesaikan pembayaran </li>
                                                                    @else
                                                                       <li>Status : {{ session()->get('message-status-ticket')->ticket_status }} </li>
                                                                    @endif
                                                                    <li>Nama : {{ session()->get('message-status-ticket')->customer_name }} </li>
                                                                    <li>NRA  : {{ session()->get('message-status-ticket')->customer_nra }} </li>
                                                                    <li>KD  : {{ session()->get('message-status-ticket')->customer_campus }} </li>
                                                                    <!-- <li> <br>
                                                                        @php
                                                                            echo DNS2D::getBarcodeHTML(session()->get('message-status-ticket')->customer_nra, 'QRCODE');
                                                                        @endphp
                                                                    </li> -->
                                                                    
                                                                </ul>
                                                                <br>
                                                                @if(session()->get('message-status-ticket')->ticket_status == 'pending')

                                                                    Selesaikan pembayaran untuk mendapatkan tiket
                                                                    <h5>*hubungi kontak dibawah untuk informasi pembayaran</h5>

                                                                @elseif(session()->get('message-status-ticket')->ticket_status == 'paid')

                                                                    Tiket anda akan dikirim melalui whatsapp
                                                                    <h5>*hubungi kontak dibawah jika tiket belum dikirim</h5>
                                                                @endif

                                                            </div>
                                                           
                                                            @if(session()->get('message-status-ticket')->ticket_status == 'pending')
                                                                <div class="alert alert-success">
                                                                    Narahubung :
                                                                    <ul>
                                                                        <li>Hp./Wa 1 : 088888888</li>
                                                                        <li>Hp./Wa 2 : 088888888</li>
                                                                    </ul>
                                                                </div>
                                                            @else
                                                        
                                                                <div class="alert alert-success">
                                                                    Narahubung :
                                                                    <ul>
                                                                        <li>Hp./Wa 1 : 088888888</li>
                                                                        <li>Hp./Wa 2 : 088888888</li>
                                                                    </ul>
                                                                </div>
                                                                <!-- <form method="post" action="{{ url('my-ticket-checking') }}">
                                                                    @csrf
                                                                    <div class="form">
                                                                        <input type="hidden" class="form-control" name="ticket_id"
                                                                            value="{{ session()->get('message-status-ticket')->id }}" required>

                                                                        <button type="submit" class="btn">Lihat tiket </button>
                                                                    </div>
                                                                </form> -->
                                                            @endif

                                                        @endif

                                                        </div>
                                                    @endif

                                                    @if ($errors->any())
                                                        <div class="ticket-description">
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>                                        
                                    </div>
                            
                            </div>

                        </div>

                        <br><br><br><br>
                        <div class="cart">
                            <div class="row">
                                <div class="col-xs-6">
                                    <p>
                                        <span class="ticket-count">0</span> Tiket <span class="divider"></span>
                                        Total: Rp. <span class="total-amount">0</span>
                                    </p>
                                </div>
                                <div class="col-xs-6">
                                    <div class="text-right">
                                        <a class="btn disabled" data-toggle="modal"
                                            data-target="#ticket-details">PESAN</a>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Message --}}
                            @if(session()->has('message-order-ticket'))
                                <br>
                                <div class="alert alert-success">
                                    {{ session()->get('message-order-ticket') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <br>
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal right fade" id="ticket-details" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!--<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Share your contact Details</h4>
        </div>-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="images/icons/cancel.png">
                        </button>
                        <h4 class="modal-title">Tiket anda</h4>
                    </div>
                    <div class="modal-body">

                        <div class="cart-information">
                            <div class="ticket-type"></div>
                            <ul>
                                <li>Tiket: <span class="ticket-count"></span></li>
                                <li>Harga: <span class="ticket-amount"></span></li>
                                <hr>
                                <li>Total: <span class="total-amount"></span></li>
                            </ul>
                        </div>

                        <div class="contactForm">
                            <h3>Detail data diri</h3>

                            <form method="POST" action="{{ url('ticket') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="ticket"
                                        id="ticket" required>
                        
                                    <select class="form-control" id="campus" name="campus" required>
                                        <option value="" disabled selected >Kampus</option>
                                        <option value="dipa">KD DIPA</option>
                                        <option value="umi">KD UMI</option>
                                    </select>

                                    <input style="color:black;" type="text" class="form-control" name="name"
                                        placeholder=" Nama" required>

                                    <input style="color:black;" type="text" class="form-control" name="nra"
                                        placeholder=" NRA" required>
                       
                                    <input style="color:black;" type="text" class="form-control" name="phone"
                                        placeholder=" Hp/wa." required>
                          
                                    <input style="color:black;" type="email" class="form-control" name="email"
                                        placeholder=" Email" required>
                      
                                    <input style="color:black;" type="text" class="form-control" name="address"
                                        placeholder=" Alamat" required>
                                        
                                    <!-- @ if(  != 'silver') -->
                                        <br>
                                        <h3>Baju</h3> *Hanya untuk tiket jenis platinum dan gold
                                        <select class="form-control" id="tshirt" name="tshirt">
                                            <option value="" disabled selected>Warna</option>
                                            <option value="black">Hitam</option>
                                            <option value="white">Putih</option>
                                        </select>
                                        
                                        <select class="form-control" id="tshirt_type" name="tshirt_type">
                                            <option value="" disabled selected>Lengan</option>
                                            <option value="long">Panjang</option>
                                            <option value="short">Pendek</option>
                                        </select>

                                        <select class="form-control" id="tshirt_size" name="tshirt_size">
                                            <option value="" disabled selected>Ukuran</option>
                                            <option value="s">S</option>
                                            <option value="m">M</option>
                                            <option value="l">L</option>
                                            <option value="xl">XL</option>
                                            <option value="xxl">XXL</option>
                                        </select>
                                    <!-- @ endif -->
                                   
                                </div>

                                <button type="submit" class="btn">Proses Pesanan</button>
                            </form>
                            <br>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="{{ asset('js/allscript.js') }}"></script>
    </body>

    </html>