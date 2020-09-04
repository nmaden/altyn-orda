@extends('admin::layout')

@section('title', $title)

@section('content')
<div class="row">
    <disclaymer :model="$model" type="index" />  
    <form  method="get" >
		<filter >
			<slot name="top_line">
				<div class="row">
					<div class="col-md-3">
						<input-int name="id" :model="$model" :value="$request->id" />
					</div>
					<div class="col-md-9">
						<input-text name="name" :model="$model" :value="$request->name" />
					</div>
				</div>
			</slot>
		</filter>
	</form>
	<div class="col-md-12">
		<div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">{{ $title }}</h5>
            </div>
			<table class="table table-togglable">
				<thead>
					<tr>
						<th >{{ $model->getLabel('id') }}</th>
						<th >{{ $model->getLabel('name') }}</th>
						<th >{{ $model->getLabel('note') }}</th>
						
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
							<td>{{ $i->name }}</td>
							<td >{{ $i->note }}</td>
							<td>{{ $i->edited_user_name }}</td>
							<td>{{ $i->created_cool }}</td>
							<td>{{ $i->updated_cool }}</td>
							<th>
								<div class="btn-group">
									<button type="button" class="btn  btn-primary btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<i class="icon-menu7"></i> 
									</button>
									<ul class="dropdown-menu dropdown-menu-right">
										@foreach ($sys_lang->getAr() as $k => $v) 
											<li><a href="{{ route($route_path.'_show', $i) }}?lang={{ $k }}">@lang('main.show') "{{ $v }}" </a></li>
										@endforeach
										<li class="divider"></li>

										@foreach ($sys_lang->getAr() as $k => $v) 
											<li><a href="{{ route($route_path.'_update', $i) }}?lang={{ $k }}">@lang('main.update') "{{ $v }}" </a></li>
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
