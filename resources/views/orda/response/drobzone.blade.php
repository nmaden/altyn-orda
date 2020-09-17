

@foreach($photo as $k=>$item)
<div class='rm'>
<input type="hidden" name="photo[]" value="{{$item}}"/>
	
 уже загружено <a href="{{URL::asset($item)}}" target="_blank">
просмотреть</a>&nbsp&nbsp
<a href="{{$item}}" id="{{$id}}" target="_blank" class='slider_remove'>
удалить</a>
 </br>
 </div>
@endforeach


