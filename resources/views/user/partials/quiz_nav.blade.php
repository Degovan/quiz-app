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
    <div class="col-md-12">
        <h4>Sisa Waktu anda</h4>
        <div id="demo"></div>
    </div>
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
    <script>
        
        var countDownDate = new Date().setMinutes(120);
        
    var x = setInterval(() => {
        var now = Date.now();

        var distance = countDownDate - now;
        
        
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("demo").innerHTML = hours + " jam " + minutes + " menit " + seconds + " detik";

        if (distance < 0) {
            clearInterval(x);
            document.getElementsById("demo").innerHTML = 'EXPIRED';
        }
    }, 1000);

    </script>
@endpush