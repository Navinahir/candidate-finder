<div class="section-incremental-form-alpha-item">
    <div class="row section-incremental-form-alpha-relative qualification-box">
        <div class="col-md-12 col-lg-12">
            <div class="section-incremental-form-alpha-remove remove-section" 
                data-type="qualification"
                data-id="{{ $qualification['resume_qualification_id'] ? encode($qualification['resume_qualification_id']) : ''; }}"
                title="{{__('message.remove_section')}}">
                <i class="fas fa-trash-alt"></i>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group form-group-account">
                <label for="">{{ __('message.degree_title') }} *</label>
                <input type="hidden" name="resume_id[]" 
                    value="{{ $qualification['resume_id'] ? encode($qualification['resume_id']) : ''; }}" />
                <input type="hidden" name="resume_qualification_id[]" 
                    value="{{ $qualification['resume_qualification_id'] ? encode($qualification['resume_qualification_id']) : ''; }}" />
                <input type="text" class="form-control" name="title[]" value="{{ $qualification['title'] }}" />
                <small class="form-text text-muted">{{ __('message.enter_degree_title') }}</small>
            </div>
            <div class="form-group form-group-account">
                <label for="">{{ __('message.percentage_cgpa_marks') }} *</label>
                <input type="text" class="form-control" name="marks[]" value="{{ $qualification['marks'] }}" />
                <small class="form-text text-muted">{{ __('message.enter_percentage_cgpa_marks') }}</small>
            </div>
            <div class="form-group form-group-account">
                <label for="">{{ __('message.from') }} *</label>
                <input type="date" class="form-control datepicker" placeholder="29-12-1985" name="from[]" 
                    value="{{ dateOnly($qualification['from']) }}" />
                <small class="form-text text-muted">{{ __('message.start_date_of_degree') }}</small>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="form-group form-group-account">
                <label for="">{{ __('message.institutuion') }} *</label>
                <input type="text" class="form-control" name="institution[]" 
                    value="{{ $qualification['institution'] }}" />
                <small class="form-text text-muted">{{ __('message.enter_institutuion') }}</small>
            </div>
            <div class="form-group form-group-account">
                <label for="">{{ __('message.out_of') }} *</label>
                <input type="text" class="form-control" name="out_of[]" value="{{ $qualification['out_of'] }}">
                <small class="form-text text-muted">{{ __('message.total_of_percentage_or_cgpa') }}.</small>
            </div>
            <div class="form-group form-group-account">
                <label for="">{{ __('message.to') }} *</label>
                <input type="date" class="form-control datepicker" placeholder="29-12-1985" name="to[]" 
                    value="{{ dateOnly($qualification['to']) }}" />
                <small class="form-text text-muted">{{ __('message.end_date_of_degree') }}</small>
            </div>
        </div>
    </div>
</div>
