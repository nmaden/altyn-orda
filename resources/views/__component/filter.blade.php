
<div class="col-md-12">
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">
                @lang('main.filter_title')
            </h6>
        </div>
        <div class="panel-body m_p_0">
            {!! $top_line !!} 
            <a href="?clear_filter=1" class="btn btn-sm btn-warning col-md-4 pull-left">@lang('main.filter_clear_link')</a>
            <button class="btn btn-sm btn-info col-md-4 pull-right" name="save_filter" value="1">@lang('main.filter_accept_link')</button>
        </div>
    </div>
</div>