@if ($model && $model->id)
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">
                <a class="collapsed" data-toggle="collapse"  data-parent="#{{ $model->getTable() }}_{{ $model->id }}" href="#{{ $model->getTable() }}_{{ $model->id }}">{{ $title }}</a>
            </h6>
        </div>
        <div id="{{ $model->getTable() }}_{{ $model->id }}" class="panel-collapse collapse ">
            <div class="panel-body">
                <ul class="list-feed">
                    @foreach (sdk\Model\ChangeModelLog\ChangeModelLog::where('table_name', $model->getTable())->where('el_id', $model->id)->take('12')->latest()->get() as $log) 
                        <li>
                            {{ $log->created_at }}. Пользователь <a href="#">{{ $log->user_name }} (№ {{ $log->user_id }})</a> {{ $log->is_new ? 'создал' : 'изменил' }} запись: 
                            {!! $log->note !!} 
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@else 
    @php 
        $key = rand(1000, 9999);
    @endphp
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">
                <a class="collapsed" data-toggle="collapse"  data-parent="#rand_{{ $key }}" href="#rand_{{ $key }}">{{ $title }}</a>
            </h6>
        </div>
        <div id="rand_{{ $key }}" class="panel-collapse collapse ">
            <div class="panel-body">
                <ul class="list-feed">

                </ul>
            </div>
        </div>
    </div>
@endif
