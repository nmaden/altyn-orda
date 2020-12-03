
<div style="border:1px solid black;padding:10px">

@foreach($photo as $k=>$item)
<div class='rm'>
<input type="hidden" name="gallery[{{$k}}]" value="{{$item}}"/>
	
 уже загружено <a href="{{URL::asset($item)}}" target="_blank">
просмотреть</a>&nbsp&nbsp
<a href="{{$item}}" id="{{$id}}" target="_blank" class='slider_remove'>
удалить</a>
@if(isset($hint[$k]))

<input type="text" 
placeholder="Заголовок картинки"
name="hint[]" value="{{$hint[$k]}}"
class="form-control"
/>
@else
<input placeholder="Заголовок картинки" type="text" name="hint[]" value=""
class="form-control"
/>
@endif

 </br>
 
 
 </div>
@endforeach
</div>

