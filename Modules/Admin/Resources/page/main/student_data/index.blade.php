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
						<input-text name="f_name" :model="$model" :value="$request->f_name" />
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
						<th >{{ $model->getLabel('f_name') }}</th>
						<th >{{ $model->getLabel('s_name') }}</th>
						<th >{{ $model->getLabel('date_b') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('country_id') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('email') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('phone') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('enter_date') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('need_degree_id') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('note') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('connect_email') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('connect_phone') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('connect_sms') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('edited_user_id') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('created_at') }}</th>
						<th data-breakpoints="all">{{ $model->getLabel('updated_at') }}</th>
						<th>
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($items as $i)
						<tr>
							<td>{{ $i->id }}</td>
							<td>{{ $i->f_name }}</td>
							<td>{{ $i->s_name }}</td>
							<td>{{ $i->date_b }}</td>
							<td>{{ $i->country_name }}</td>
							<td>{{ $i->email }}</td>
							<td>{{ $i->phone }}</td>
							<td>{{ $i->enter_date }}</td>
							<td>{{ $i->degree_name }}</td>
							<td>{{ $i->note }}</td>
							<td>{{ $i->connect_email_name }}</td>
							<td>{{ $i->connect_phone_name }}</td>
							<td>{{ $i->connect_sms_name }}</td>

							<td>{{ $i->edited_user_name }}</td>
							<td>{{ $i->created_cool }}</td>
							<td>{{ $i->updated_cool }}</td>
							<th>
								<div class="btn-group">
									<button type="button" class="btn  btn-primary btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<i class="icon-menu7"></i> 
									</button>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="{{ route($route_path.'_show', $i) }}">@lang('main.show') </a></li>
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
