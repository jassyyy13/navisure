@extends('layout_index')
@section('contents')
	
<div style="position: relative; top:50px;" class="p-5">
<h2 class="w-100 mb-3">Legend</h2> 
<p>This serves as a comprehensive guide to the symbols and colors used on the interactive map. Users can refer to this page to understand the meaning of various map elements, such as building categories and paths, and other essential markers.</p>
<div class="table-responsive">
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td class="text-center"><img style="height: 60px; width: 60px;" src="{{url('\public\asset\img\legend_controls\vector-sign-of-building-icon.jpg')}}" class="img-responsive"></td>
				<td>- Buildings</td>
			</tr>
			<tr>
				<td class="text-center"><img style="height: 45px; width: 80px;" src="{{url('\public\asset\img\legend_controls\class.png')}}" class="img-responsive"></td>
				<td>- Building for classes</td>
			</tr>
			<tr>
				<td class="text-center"><img style="height: 45px; width: 80px;" src="{{url('\public\asset\img\legend_controls\nclass.png')}}" class="img-responsive"></td>
				<td>- Building not for classes</td>
			</tr>
			<tr>
				<td class="text-center"><img style="height: 45px; width: 80px;" src="{{url('\public\asset\img\legend_controls\ref.png')}}" class="img-responsive"></td>
				<td>- Reference Building</td>
			</tr>
			<tr>
				<td class="text-center"><img style="height: 45px; width: 80px;" src="{{url('\public\asset\img\legend_controls\path.png')}}" class="img-responsive"></td>
				<td>- Road</td>
			</tr>
			@foreach($legend as $lgnd)
			<tr>
				<td class="text-center"><img style="height: 60px; width: 60px;" src="{{url('public/asset/img/legend_icon/'.$lgnd->legend_img)}}" class="img-fluid"/></td>
				<td>- {{ $lgnd->legend_title }}</td>
			</tr>
			@endforeach
			
		</tbody>
	</table>
</div>
</div>

@endsection