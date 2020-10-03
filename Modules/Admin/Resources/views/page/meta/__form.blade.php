@php
$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}
@endphp

<div style="font-size: 12px; color: gray;"><img style="animation: rotate 4s cubic-bezier(0.18, 0.89, 0.32, 1.28) infinite;" src="https://vippromokod.ru/wa-data/public/site/img/gift-for-repost.png"> Поделитесь и получите подарок:</div>
<div class="ya-share2 btn_vippromokod" data-services="vkontakte,facebook,odnoklassniki,twitter,viber,whatsapp,skype,telegram" data-limit="3"></div>
<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>
<script>
    $(function () {
      $('.btn_vippromokod').click(function(){
        $(".block_with_text_vippromokod").fadeToggle(100);
      });
    });
</script>
<!--------------------------------------
<div style='padding:10px 5px;'> 
<label for="text"><b>Текст</b></label> 


<textarea 
 {{$page ? 'disabled': ''}}
 value="" 
 name='description' 
  rows="16" 
 cols="4" 
 class="form-control {{$page ? '' : 'wysihtml5 wysihtml5-default'}}">
 {{isset($model->description) ? $model->description : ''}}
</textarea>
</div>
----------------------------------->

 <div>   

    <label for="title"><b>название</b></label> 
			<select {{$page ? 'disabled': ''}} name="name"  class="form-control select2">
			<option value="">@lang('model.disabled')</option>
			<option></option>
          
        </select>
		</div>


<div>  
 <label for="title"><b>название</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->name) ? $model->name: ''}}" 
name='name' placeholder="{{$page ? '': 'http://www.w3.org/2000/svg'}} " 
class="form-control"/>
</div>

<br><br>
<div>  
 <label for="title"><b>URL(текст)</b></label> 
<input {{$page ? 'disabled': ''}} 
type="text" value="{{isset($model->path) ? $model->path: ''}}" 
name='path' placeholder="{{$page ? '': 'https://vk.com/name'}} " 
class="form-control"/>
</div>

