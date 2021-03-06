<div class="row">
    <div class="weather-evolution daily">
        <div class="we-title">Evolution</div>
        <div class="chart-container">
            <div class="chart-title">Daily Forecast Evolution (°C)</div>
            <div class="ct-chart">
                <script>
                    new Chartist.Line('.ct-chart', {
                        labels: ['Thursday', 'Friday', 'Saturday', 'Sunday', 'Monday',],
                        series: [
                            ['19', '20', '20', '21', '20',],
                            ['16', '15', '13', '11', '14',]
                        ]
                    }, {
                        axisY: {
                            labelInterpolationFnc: function (value) {
                                return (value) + '°';
                            }
                        },
                        fullWidth: true,
                        lineSmooth: false,
                        chartPadding: {
                            right: 50,
                            top: 20
                        },
                        height: 200
                    });
                </script>
            </div>
            <div class="chart-legends">
                <div class="chart-legend">
                    <div class="legend-color legend-min"></div>
                    <div class="legend-name">Lowest temperature</div>
                </div>
                <div class="chart-legend">
                    <div class="legend-color legend-max"></div>
                    <div class="legend-name">Highest temperature</div>
                </div>
            </div>
        </div>
    </div>
</div>
