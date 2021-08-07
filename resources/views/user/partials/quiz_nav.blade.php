<div class="row">
    @foreach ($quiz->question as $key=>$value)
        <div class="col-2">
            <a href="#q{{ $key+1 }}" class="mr-1">
                <div class="card card-body my-2 mx-3 w-50">
                    <div class="d-flex justify-content-center">{{ $key+1 }}</div>
                </div>
            </a>
        </div>
    @endforeach
</div>

@push('script')
    <style>
        .num-card{
            border: 1px solid black;
            margin: 10px;
            padding: 10px 15px;
        }
        a:hover{
            text-decoration: none;
        }
    </style>
@endpush