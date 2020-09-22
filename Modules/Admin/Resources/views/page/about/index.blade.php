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
						<th >{{ $model->getLabel('photo') }}</th>
						<th >{{ $model->getLabel('name') }}</th>
							<th data-breakpoints="all">{{ $model->getLabel('edited_user_id') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('created_at') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('updated_at') }}</th>
					@if(count($items) <= 0)
						<th>
							<a href="{{ route($route_path.'_create') }}" class="btn btn-sm  bg-success">@lang('main.add')</a>
						</th>
					</tr>
					@endif
				</thead>
					<tbody>
					@foreach ($items as $i)
						<tr>
							<td>{{ $i->id }}</td>
							<td>
							@if($i->photo)
								загружено <a href="{{URL::asset($i->photo)}}" target="_blank">просмотреть</a>
							@else
								не загружено
							@endif
	
							
							
							
							</td>
							<td>{{ $i->name }}</td>
							<td>{{ $i->edited_user_name }}</td>
							
							<th data-breakpoints="all">{{ $model->getLabel('created_at') }}</th>
							<td>{{ $i->updated_cool }}</td>
						<th>
								<div class="btn-group">
									<button type="button" class="btn  btn-primary btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<i class="icon-menu7"></i> 
									</button>
									<ul class="dropdown-menu dropdown-menu-right">@include('admin::page.components.lang.switch_lang_index')
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
