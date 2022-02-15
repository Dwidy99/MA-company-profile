<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
               <div class="inner">
                  <h3>BERITA</h3>

                  <p><?= count($news); ?> berita</p>
               </div>
               <div class="icon">
                  <i class="ion ion-bag"></i>
               </div>
               <a href="<?= base_url('admin/berita'); ?>" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-success">
                  <div class="inner">
                     <h3>GALERI</h3>

                     <p><?= count($galleries); ?> galeri</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="<?= base_url('admin/galeri'); ?>" class="small-box-footer">More info <i
                     class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                     <div class="inner">
                        <h3>PENGGUNA</h3>

                        <p><?= count($users); ?> pengguna</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-person-add"></i>
                     </div>
                     <a href="<?= base_url('admin/user'); ?>" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-danger">
                        <div class="inner">
                           <h3>LAYANAN</h3>

                           <p><?= count($services); ?> layanan</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?= base_url('admin/layanan'); ?>" class="small-box-footer">More info <i
                           class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                     <!-- ./col -->
                  </div>
               </div>
            </section>
         </table>

         <div class="col-md-12">
            <hr>
            <h2>Statistik kunjungan terakhir</h2>
            <hr>
            <!-- Styles -->
            <style>
               #chartdiv {
                  width: 100%;
                  height: 500px;
               }
            </style>

            <!-- Resources -->
            <script src="https://www.amcharts.com/lib/4/core.js"></script>
            <script src="https://www.amcharts.com/lib/4/charts.js"></script>
            <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

            <!-- Chart code -->
            <script>
               am4core.ready(function() {

      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      // Create chart instance
      var chart = am4core.create("chartdiv", am4charts.XYChart);
      chart.paddingRight = 20;

      // Add data
      chart.data = [
      <?php 
      foreach($kunjungan as $kunjungan) {
         ?> {
            "year": "<?php echo date('d-m-Y',strtotime($kunjungan->hari)) ?>",
            "value": <?php echo $kunjungan->total; ?>
         },
      <?php } ?>
      ];

      // Create axes
      var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis.dataFields.category = "year";
      categoryAxis.renderer.minGridDistance = 50;
      categoryAxis.renderer.grid.template.location = 0.5;
      categoryAxis.startLocation = 0.5;
      categoryAxis.endLocation = 0.5;

      // Pre zoom
      chart.events.on("datavalidated", function() {
         categoryAxis.zoomToIndexes(Math.round(chart.data.length * 0.4), Math.round(chart.data.length *
            0.55));
      });

      // Create value axis
      var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
      valueAxis.baseValue = 0;

      // Create series
      var series = chart.series.push(new am4charts.LineSeries());
      series.dataFields.valueY = "value";
      series.dataFields.categoryX = "year";
      series.strokeWidth = 2;
      series.tensionX = 0.77;

      var range = valueAxis.createSeriesRange(series);
      range.value = 0;
      range.endValue = 1000;
      range.contents.stroke = am4core.color("#FF0000");
      range.contents.fill = range.contents.stroke;

      // Add scrollbar
      var scrollbarX = new am4charts.XYChartScrollbar();
      scrollbarX.series.push(series);
      chart.scrollbarX = scrollbarX;

      chart.cursor = new am4charts.XYCursor();

   }); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>


</div>