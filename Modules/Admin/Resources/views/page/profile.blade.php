




<h3>Личные данные</h3>
<hr/>
@if(isset($info->email))
<p style="font-size:20px"><b>email:</b> {{ $info->email }}</p>
@endif
@if(isset($info->login))
<p style="font-size:20px"><b>login:</b> {{ $info->login }}</p>
@endif
@if(isset($info->relUsers->name))
<p style="font-size:20px"><b>ФИО:</b> {{ $info->name }}</p>
@endif




