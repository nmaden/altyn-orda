




<h3>Личные данные</h3>
<hr/>
@if(isset($info->relUsers->email))
<p style="font-size:20px"><b>email:</b> {{ $info->relUsers->email }}</p>
@endif
@if(isset($info->relUsers->login))
<p style="font-size:20px"><b>login:</b> {{ $info->relUsers->login }}</p>
@endif
@if(isset($info->relUsers->name))
<p style="font-size:20px"><b>ФИО:</b> {{ $info->relUsers->name }}</p>
@endif




