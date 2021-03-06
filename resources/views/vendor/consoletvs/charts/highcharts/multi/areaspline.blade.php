<script type="text/javascript">
    $(function () {
        var {{ $model->id }} = new Highcharts.Chart({
            chart: {
                type: 'areaspline',
                renderTo:  "{{ $model->id }}",
                @include('charts::_partials.dimension.js2')
            },
            @if($model->title)
                title: {
                    text:  "{!! $model->title !!}",
                    x: -20 //center
                },
            @endif
            @if(!$model->credits)
                credits: {
                    enabled: false
                },
            @endif
            xAxis: {
                categories: [
                    @foreach($model->labels as $label)
                        "{!! $label !!}",
                    @endforeach
                ],
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                    text: "{!! $model->element_label !!}"
                }
            },
            legend: {
                @if(!$model->legend)
                    enabled: false,
                @endif
            },
            tooltip: {
                shared: true,
                valueSuffix: ' units'
            },
             plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [
                @for ($i = 0; $i < count($model->datasets); $i++)
                    {
                        name:  "{{ $model->datasets[$i]['label'] }}",
                        @if($model->colors && count($model->colors) > $i)
                            color: "{{ $model->colors[$i] }}",
                        @endif
                        data: [
                            @foreach($model->datasets[$i]['values'] as $dta)
                                {{ $dta }},
                            @endforeach
                        ]
                    },
                @endfor
            ]
        })
    });
</script>

@if(!$model->customId)
    @include('charts::_partials.container.div')
@endif
