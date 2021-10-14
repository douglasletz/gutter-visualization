@extends("layouts.master")

@section("title")
Rain Gutter Visualizer
@endsection


@section("content")
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('/images/background/6.jpg') }});">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Gutter Calculator</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">Home</a></li>
                    <li>Gutter Calculator</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->    

    <section class="calc-wrapper bg-grey padding">
        <div class="slider-wrapper">
            <h1 class="text-center"> Just the Gutters </h2>
            <h5 class="text-center"> Please provide the estimated total footage needed for gutters on your home </h4>

            <p class="text-center"> Just the Gutters </p>
            <input type="range" class="form-range" id="customRange1" min=0 max=3250 value=1000>
            <p class="text-center"> Please slide to equal total footage needed for gutters </p>

            <p class="text-center"> Just the Downspouts </p>
            <input type="range" class="form-range" id="customRange2" min=0 max=3250 value=1000>
            <p class="text-center"> Please slide to equal total footage needed for downspouts </p>

            <h1 class="text-center"> Lifetime No Clog Warranty </h1>
            <p class="text-center"> 
                Raindrop Gutter Guards are an absolutely fantastic way to save time and exten the life of your gutters, 
                roof, and home. By adding Raindrop Gutter Protection System to your order, 
                we guarantee a lifetime of free flowing gutters.
            </p>
            <input type="range" class="form-range" id="customRange3" min=0 max=5000 value=3000>
            <p class="text-center"> Please slide to equal total footage needed for gutters on your home </p>
        </div>
        <div class="value-wrapper">
            <img src="{{ asset('./images/calc/happy.png') }}" />
            <div class="gutter-result">
                <span>$ </span>
                <span id="result-value">3000</span>
            </div>
        </div>
    </section>
@endsection

@section("script")

    <script>
        let gutterVal = 1000
        let downSpoutVal = 1000
        let warrantyVal = 1000

        $('#customRange1').on('input', (e) => {
            gutterVal = parseInt(e.target.value)
            console.log(gutterVal, downSpoutVal, warrantyVal)
            $('#result-value').html(gutterVal + downSpoutVal + warrantyVal)
        });

        $('#customRange2').on('input', (e) => {
            downSpoutVal = parseInt(e.target.value)
            console.log(gutterVal, downSpoutVal, warrantyVal)
            $('#result-value').html(gutterVal + downSpoutVal + warrantyVal)
        })

        $('#customRange3').on('input', (e) => {
            warrantyVal = parseInt(e.target.value)
            console.log(gutterVal, downSpoutVal, warrantyVal)
            $('#result-value').html(gutterVal + downSpoutVal + warrantyVal)
        })
    </script>
@endsection