 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>



<!-- load library jquery dan highcharts -->
<script src="<?php echo base_url();?>asset2/js/jquery.js"></script>
<script src="<?php echo base_url();?>asset2/js/highcharts.js"></script>
<!-- end load library -->
 
<?php
    /* Mengambil query report*/
    foreach($report as $result){
        $namasiswa[] = $result->tgl; //ambil bulan
        $value[] = (double) $result->jumlah; //ambil nilai
    }
    /* end mengambil query*/
     
?>
 </br>
<!-- Load chart dengan menggunakan ID -->
<div id="report"></div>
<!-- END load chart -->
 
<!-- Script untuk memanggil library Highcharts -->
<script type="text/javascript">
$(function () {
    $('#report').highcharts({
        chart: {
            type: 'column',
            margin: 75,
            options3d: {
                enabled: false,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Grafik Peristiwa',
            style: {
                    fontSize: '18px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        subtitle: {
           text: '',
           style: {
                    fontSize: '15px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories:  <?php echo json_encode($namasiswa);?>
        },
        exporting: { 
            enabled: false 
        },
        yAxis: {
            title: {
                text: 'Nilai Reward'
            },
        },
        tooltip: {
             formatter: function() {
                 return 'abc<b>' + this.x + '</b> is <b>' + Highcharts.numberFormat(this.y,2) + '</b>, in '+ this.series.name;
             }
          },
        series: [{
            name: 'Nilai',
            data: <?php echo (json_encode($value,10));?>,
            shadow : true,
            dataLabels: {
                enabled: true,
                color: '#045396',
                align: 'center',
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 2);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});

        </script>
          </div>
            </div>
    </div>
    </div> <!-- /.widget-inner -->
</div> <!-- /.widget-main -->   

