
	<br>
	<center><h3><?php sambutan(); ?></h3>
	<br>
	<img width="700" src="<?php echo $background; ?>">
	
	<!--
	<div class="row">
	
			


        
		

        
        <div class="col-lg-3 col-xs-6">
        
          <div class="small-box bg-green">
            <div class="inner">
              <h3>0</h3>

              <p>Menu2</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
		
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>0</h3>

              <p>Menu3</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
        
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>

              <p>Menu4</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
	
         
      </div>
	
	
	<br>
	
	
          
	<?php
	$sql = "select table_name from information_schema.tables where table_schema='$database'";
	$result = @mysql_query($sql);
	while($row = @mysql_fetch_array($result))
	{
		$tabel = $row[0]; 
		?>

		
	<div class="col-md-3 col-sm-6 col-xs-12">	
	<div class="info-box bg-green">
		
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $tabel; ?></span>
              <span class="info-box-number"><?php total($tabel,""); ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
                  <span class="progress-description">
				  <a href="<?php echo "../".$tabel."/"; index();?>">
                    Detail
					</a>
                  </span>
            </div>
           
          </div>
		   </div>
		<?php
	}
		?>
	<br>
	<br>
	
		-->

          