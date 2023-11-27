@extends('layout_index')
@section('contents')

<div style="position: relative; top:50px;" class="p-5">
	<h2 class="w-100 bg-light mb-3">Map Controls</h2>
	<p>This is an overview of the interactive features and tools available in the map.</p>
	<div class="table-responsive">
		<table class="table table-bordered mb-5">
			<tbody>
				<tr>
					<td class="text-center" style="width: 25%"><img style="height: 25px; width: 25px;" src="{{url('\public\asset\img\legend_controls\fullscreen.png')}}" class="img-responsive"></td>
					<td>- Toggle Fullscreen</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 25px; width: 25px;" src="{{url('\public\asset\img\legend_controls\plus.png')}}" class="img-responsive"></td>
					<td>- Zoom in</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 35px; width: 35px;" src="{{url('\public\asset\img\legend_controls\minus.jfif')}}" class="img-responsive"></td>
					<td>- Zoom out</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 40px; width: 40px;" src="{{url('\public\asset\img\legend_controls\compass.jfif')}}" class="img-responsive"></td>
					<td>- (Tap) Reset bearing to north, (Hold and drag) Rotate map</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 40px; width: 40px;" src="{{url('\public\asset\img\legend_controls\gps.png')}}" class="img-responsive"></td>
					<td>- Turn on/off GPS</td>
				</tr>
			</tbody>
		</table>

		<h2 class="w-100 bg-light">Mouse & Keyboard Controls</h2>
		<p>This is an overview of the interactive features and tools available while using a mouse and keyboard which helps in providing a smooth experience while using the interactive map.</p>
		<table class="table table-bordered mb-5">
			<tbody>
				<tr>
					<td class="text-center"><img style="height: 45px; width: 35px;" src="{{url('\public\asset\img\legend_controls\m3.png')}}" class="img-responsive"></td>
					<td>- Left-click on an entity in the map to see more information.</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 45px; width: 45px;" src="{{url('\public\asset\img\legend_controls\m2.png')}}" class="img-responsive"></td>
					<td>- Left-click + drag to move across the map.</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 45px; width: 105px;" src="{{url('\public\asset\img\legend_controls\m10.png')}}" class="img-responsive"> or <img style="height: 45px; width: 45px;" src="{{url('\public\asset\img\legend_controls\m8.png')}}" class="img-responsive"></td>
					<td>- Double-click or Scroll up to zoom in.</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 40px; width: 35px;" src="{{url('\public\asset\img\legend_controls\m9.png')}}" class="img-responsive"></td>
					<td>- Scroll down on the map to zoom out</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 45px; width: 45px;" src="{{url('\public\asset\img\legend_controls\m7.png')}}" class="img-responsive"> or <img style="height: 45px; width: 105px;" src="{{url('\public\asset\img\legend_controls\m11.png')}}" class="img-responsive"></td>
					<td>- Right-click or hold Ctrl then drag to rotate the map.</td>
				</tr>
			</tbody>
		</table>
	</div>

	<h2 class="w-100 bg-light mb-3">Touchscreen Controls</h2>
	<p>This is an overview of the interactive features available while using touchscreen devices.</p>
	<div class="table-responsive">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td class="text-center"><img style="height: 50px; width: 50px;" src="{{url('\public\asset\img\legend_controls\pinch_out.png')}}" class="img-responsive"> or <img style="height: 50px; width: 50px;" src="{{url('\public\asset\img\legend_controls\tap2.png')}}" class="img-responsive"></td>
					<td>- Pinch out or double tap to zoom in</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 50px; width: 50px;" src="{{url('\public\asset\img\legend_controls\pinch_in.png')}}" class="img-responsive"></td>
					<td>- Pinch in to zoom out</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 50px; width: 50px;" src="{{url('\public\asset\img\legend_controls\tap.png')}}" class="img-responsive"></td>
					<td>- Tap on an entity in the map to see more information.</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 50px; width: 50px;" src="{{url('\public\asset\img\legend_controls\touch_drag.png')}}" class="img-responsive"></td>
					<td>- Touch and drag to move across the map.</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 50px; width: 50px;" src="{{url('\public\asset\img\legend_controls\two_rotate.webp')}}" class="img-responsive"></td>
					<td>- Drag two fingers in a rotating motion to rotate the map.</td>
				</tr>
				<tr>
					<td class="text-center"><img style="height: 50px; width: 50px;" src="{{url('\public\asset\img\legend_controls\double_down.jfif')}}" class="img-responsive"></td>
					<td>- Drag two fingers up or down to change the map's bearing.</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>	

@endsection