<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<title>E-Ticket</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<style>
@import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");

/* div#myDiv {
  transform: rotate(20deg);
} */

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;

}

body,
html {
	height: 100vh;
	display: grid;
	font-family: "Staatliches", cursive;
	background: #d83565;
	color: black;
	font-size: 14px;
	/* letter-spacing: 0.1em; */

}

.ticket {
	margin: auto;
	display: flex;
	background: white;
	box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}

.left {
	display: flex;
}

.image {
	height: 100%;
	width: 100%;
	background-image: url("images/logo-milad-22.jpeg");
	background-size: contain;
	opacity: 0.85;
}

.admit-one {
	position: absolute;
	color: darkgray;
	height: 250px;
	padding: 0 10px;
	letter-spacing: 0.15em;
	display: flex;
	text-align: center;
	justify-content: space-around;
	writing-mode: vertical-rl;
	transform: rotate(-180deg);
}

.admit-one span:nth-child(2) {
	color: white;
	font-weight: 700;
}

.left .ticket-number {
	height: 250px;
	width: 250px;
	display: flex;
	justify-content: flex-end;
	align-items: flex-end;
	padding: 5px;
}

.ticket-info {
	padding: 10px 30px;
	display: flex;
	flex-direction: column;
	text-align: center;
	justify-content: space-between;
	align-items: center;
}

.date {
	border-top: 1px solid gray;
	border-bottom: 1px solid gray;
	padding: 5px 0;
	font-weight: 700;
	display: flex;
	align-items: center;
	justify-content: space-around;
}

.date span {
	width: 100px;
}

.date span:first-child {
	text-align: left;
}

.date span:last-child {
	text-align: right;
}

.date .june-29 {
	color: #d83565;
	font-size: 20px;
}

.show-name {
	font-size: 24px;
	font-family: "Nanum Pen Script", cursive;
	color: #d83565;
	white-space: nowrap;
}

.show-name h1 {
	font-size: 35px;
	/* font-weight: 700;
	letter-spacing: 0.1em; */
	color: #4a437e;
}

.time {
	padding: 10px 0;
	color: #4a437e;
	text-align: center;
	display: flex;
	flex-direction: column;
	gap: 10px;
	font-weight: 700;
}

.time span {
	font-weight: 400;
	color: gray;
}

.left .time {
	font-size: 16px;
}


.location {
	display: flex;
	justify-content: space-around;
	align-items: center;
	width: 100%;
	padding-top: 8px;
	border-top: 1px solid gray;
}

.location .separator {
	font-size: 20px;
}

.right {
	width: 180px;
	border-left: 1px dashed #404040;
}

.right .admit-one {
	color: darkgray;
}

.right .admit-one span:nth-child(2) {
	color: gray;
}

.right .right-info-container {
	height: 250px;
	padding: 10px 10px 10px 35px;
	display: flex;
	flex-direction: column;
	justify-content: space-around;
	align-items: center;
}

.right .show-name h1 {
	font-size: 18px;
}

.barcode {
	height: 100px;
	position: relative;
	transform: scale(0.4);
	transform-origin: top;
}

.barcode img {
	height: 100%;
}

.right .ticket-number {
	color: gray;
}

</style>

</head>
<body>
	
<div class="ticket">
	<div class="left">
		<div class="image">
			<p class="admit-one">
				<span>ADMIT ONE</span>
				<span>ADMIT ONE</span>
				<span>ADMIT ONE</span>
			</p>
			<div class="ticket-number">
				<p>
					{{-- Message --}}
					@if(session()->has('message-my-ticket'))
						{{ session()->get('message-my-ticket')->name }}
						#{{ session()->get('message-my-ticket')->id }}
					@else
						<p class="ticket-number" style="color : red;">Fake ticket</p>
					@endif

					@if ($errors->any())
						<p class="ticket-number" style="color : red;">Fake ticket</p>
					@endif
				</p>
			</div>
		</div>
		<div class="ticket-info">
			<p class="date">
				<span>SATURDAY</span>
				<span class="june-29">Dec 10TH</span>
				<span>2022</span>
			</p>
			<div class="show-name">
				<h1>22nd Anniversary</h1>
				<h2>Rewrite Blue Folder</h2>
			</div>
			<div class="time">
				<p>16:00 PM <span>TO</span> 21:00 PM</p>
				<p>DOORS <span>@</span> 15:30 PM</p>
			</div>
			<!-- <p class="location"><span>KAPAL PHINISI</span>
				<span class="separator"><i class="far fa-smile"></i></span><span>Pantai Losari, Makassar</span>
			</p> -->
			<p class="location"><span>LOCATION</span>
				<span class="separator"><i class="far fa-smile"></i></span><span>Location, Makassar</span>
			</p>
		</div>
	</div>
	<div class="right">
		<p class="admit-one">
			<span>ADMIT ONE</span>
			<span>ADMIT ONE</span>
			<span>ADMIT ONE</span>
		</p>
		<div class="right-info-container">

			<!-- <p style="color : gray; font-size:10px;">
			*screenshot this qr code
			</p> -->

			<div class="show-name">
			</div>
            <div class="time">

				@if(session()->has('message-my-ticket'))

					<p>{{ session()->get('message-my-ticket')->customer_name }} <br>
					{{ session()->get('message-my-ticket')->customer_nra }} <br>
					<span>kd {{ session()->get('message-my-ticket')->customer_campus }}</span></p>
				@else
					<p class="ticket-number" style="color : red;">Fake ticket</p>
				@endif

			</div>
			<div class="barcode">
				
				@if(session()->has('message-my-ticket'))
					@php
						echo DNS2D::getBarcodeHTML(session()->get('message-my-ticket')->customer_nra.','.session()->get('message-my-ticket')->customer_campus , 'QRCODE');
					@endphp

				@else
					<h1 class="ticket-number" style="color : red; font-size:200px;">X</h1>
				@endif

			</div>
			<p class="ticket-number">
				{{-- Message --}}
				@if(session()->has('message-my-ticket'))
					#{{ session()->get('message-my-ticket')->id }} <br>
					{{ session()->get('message-my-ticket')->name }}
				@else
					<p class="ticket-number" style="color : red;">Fake ticket</p>
				@endif

				@if ($errors->any())
					<p class="ticket-number" style="color : red;">Fake ticket</p>
				@endif

				
			</p>
		</div>
	</div>
</div>

</body>
</html>




