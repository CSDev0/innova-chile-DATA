<div class="row section" id="2">
    <div class="col-sm-12">
        <h1 >Graficos destacados</h1>
        <!--<p style="padding-top:300px;">algo</p>-->
        <br><br>
        <div class="row">
            <div class="col-sm-4">
                <h2>$xxxx Millones</h2>
                <h2>2010</h2>
            </div>
            <div class="col-sm-4">
                <h2>+xxxx</h2>
                <h2>Iniciativas <br> apoyadas</h2>
            </div>
            <div class="col-sm-4">
                <h2>+xxxx</h2>
                <h2>Empresas <br> beneficiadas</h2>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <div id="tester1" style="width:300px;height:300px;">
                    <script>
                        TESTER1 = document.getElementById('tester1');
                        var data1 = [
                            {
                                x: ['dato1', 'dato2', 'dato3'],
                                y: [20, 14, 23],
                                type: 'bar',
                                width: [0.2, 0.2, 0.2]
                            }
                        ];
                        Plotly.newPlot(TESTER1, data1, {displayModeBar: false});
                        console.log(Plotly.BUILD);
                    </script>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="tester2" style="width:300px;height:300px;">
                    <script>
                        TESTER2 = document.getElementById('tester2');
                        var data2 = [
                            {
                                x: ['dato1', 'dato2', 'dato3'],
                                y: [20, 14, 23],
                                type: 'scatter',
                                width: [0.2, 0.2, 0.2]
                            }
                        ];
                        Plotly.newPlot(TESTER2, data2, {displayModeBar: false});
                        console.log(Plotly.BUILD);
                    </script>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="tester3" style="width:300px;height:300px;">
                    <script>
                        TESTER3 = document.getElementById('tester3');
                        var data3 = [
                            {
                                values: [19, 26, 55],
                                labels: ['dato1', 'dato2', 'dato3'],
                                type: 'pie',
                                width: [0.2, 0.2, 0.2]
                            }
                        ];
                        Plotly.newPlot(TESTER3, data3, {displayModeBar: false});
                        console.log(Plotly.BUILD);
                    </script>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <div id="tester4" style="width:300px;height:300px;">
                    <script>
                        TESTER4 = document.getElementById('tester4');
                        var data4 = [
                            {
                                x: ['dato1', 'dato2', 'dato3'],
                                y: [20, 14, 23],
                                type: 'scatter',
                                width: [0.2, 0.2, 0.2]
                            }
                        ];
                        Plotly.newPlot(TESTER4, data4, {displayModeBar: false});
                        console.log(Plotly.BUILD);
                    </script>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="tester5" style="width:300px;height:300px;">
                    <script>
                        TESTER5 = document.getElementById('tester5');
                        var data5 = [
                            {
                                x: ['dato1', 'dato2', 'dato3'],
                                y: [20, 14, 23],
                                type: 'scatter',
                                width: [0.2, 0.2, 0.2]
                            }
                        ];
                        Plotly.newPlot(TESTER5, data5, {displayModeBar: false});
                        console.log(Plotly.BUILD);
                    </script>
                </div></div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</div>

