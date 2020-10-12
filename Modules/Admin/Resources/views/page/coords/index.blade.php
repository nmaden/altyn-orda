@extends('admin::layout')

@section('title', $title)

@section('content')
<div class="row">
 
	</form>
	<div class="col-md-12">
		<div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">{{ $title }}</h6>
            </div>
			<table class="table table-togglable">
				<thead>
					<tr>
						<th >{{ $model->getLabel('id') }}</th>
						
							<td>маршрут</td>

							<th data-breakpoints="all">{{ $model->getLabel('edited_user_id') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('created_at') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('updated_at') }}</th>
					
						<th>
							<a href="{{ route($route_path.'_create') }}" class="btn btn-sm  bg-success">@lang('main.add')</a>
						</th>
					</tr>
				</thead>
					<tbody>
					@foreach ($items as $i)
						<tr>
							<td>{{ $i->id }}</td>
							<td>
							@if($i->getRoutersAr())
							{{$i->getRoutersAr()[$i->routes_id]}}
						@else
							'не выбран'
							@endif
							</td>
							<td>{{ $i->edited_user_name }}</td>
							
							<th data-breakpoints="all">{{ $model->getLabel('created_at') }}</th>
							<td>{{ $i->updated_cool }}</td>
						<th>
								<div class="btn-group">
									<button type="button" class="btn  btn-primary btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<i class="icon-menu7"></i> 
									</button>
									<ul class="dropdown-menu dropdown-menu-right">
										@foreach ($sys_lang->getAr() as $k => $v) 
										@if($k == 'ru')
											<li><a href="{{ route($route_path.'_show', $i) }}?lang={{ $k }}">
										
										@lang('main.show') "{{ $v }}" </a></li>
										@endif
										@endforeach
										<li class="divider"></li>

										@foreach ($sys_lang->getAr() as $k => $v) 
										@if($k == 'ru')
											<li><a href="{{ route($route_path.'_update', $i) }}?lang={{ $k }}">@lang('main.update') "{{ $v }}" </a></li>
										@endif
										@endforeach
										<li class="divider"></li>
										<li><a href="{{ route($route_path.'_delete', $i) }}">@lang('main.delete')</a></li>
									</ul>
									
								</div>
								
							</th>
							
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="panel-footer text-right">
				{!! $items->appends($request->all())->links() !!}

			</div>
		</div>
	</div>
</div>
@endsection
