<div id="translate_item_{{$translating->id}}" class=" translating_item_wrapper ">


    {!! Form::model($translating, [
                               'method' => 'PATCH',
                               'url' => route("admin.landing_pages.update_translating",["id"=> $translating->id]),
                               'class' => 'form-horizontal form-admin ',
                               'files' => true
                           ]) !!}
    @php ($bag = $errors->getBag('_translate_errors_'.$translating->id))
    @php ($old_prefix = "_translate_old_".$translating->id)
    @php ($t_id = $translating->id)


    <div class="form-group  {{$bag->has('title')?' has-error':''}} ">
        {!! Form::label('title', 'Заголовок', ['class' => 'control-label  ']) !!}
        <div class="w-100">
            {!! Form::text('title', old($old_prefix.".title") , ['class' => 'form-control'  ])!!}
            {!! $bag->first('title', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{$bag->has('description')?' has-error':''}}">
        {!! Form::label('description', 'Опис', ['class' => 'control-label ']) !!}
        <div class="w-100">
            {!! Form::textarea('description', old($old_prefix.".description"), ['class' => 'form-control description ckeditor' ,]) !!}
            {!! $bag->first('description', '<p class="invalid-feedback d-block">:message</p>') !!}
        </div>
    </div>
    <div class="card ">
        <div class="card-header">Seo</div>
        <div class="card-body pt-4">
            <div class="form-group {{$bag->has('seo_title')?' has-error':''}}">
                {!! Form::label('seo_title', 'Seo Title', ['class' => '']) !!}
                <div class="w-100">
                    {!! Form::text('seo_title',old($old_prefix.".seo_title"), ['class' =>  'form-control ' ] ) !!}
                    {!! $bag->first('seo_title', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{$bag->has('seo_description')?' has-error':''}}">
                {!! Form::label('seo_description', 'Seo Description', ['class' => ' ']) !!}
                <div class="w-100">
                    {!! Form::text('seo_description',old($old_prefix.".seo_description"), ['class' => 'form-control' ]) !!}
                    {!! $errors->first('seo_description', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{$bag->has('seo_keywords')?' has-error':''}}">
                {!! Form::label('seo_keywords', 'Seo Keywords', ['class' => ' ']) !!}
                <div class="w-100">
                    {!! Form::text('seo_keywords', old($old_prefix.".seo_keywords"), ['class' => 'form-control' ]) !!}
                    {!! $errors->first('seo_keywords', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group  {{$bag->has('seo_text')?' has-error':''}}">
                {!! Form::label('seo_text', 'Seo текст', ['class' => '']) !!}
                <div class="w-100">
                    {!! Form::textarea('seo_text', old($old_prefix.".seo_text"), ['class' => 'form-control description ckeditor ckeditor-area' ]) !!}
                    {!! $bag->first('seo_text', '<p class="invalid-feedback d-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="form-group w-100">
        <div class=" w-100 text-center p-4">
            {!! Form::submit( 'Зберегти', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
