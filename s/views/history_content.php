<div class="innerLR"  style="margin-top:30px;">
    <div class="innerT">
        <div class="media">
            <div class="media-body innerAll half">
                <h2>
                    History
                </h2>
            </div>
        </div>
    </div>

    <div class="widget widget-tabs-content widget-tabs-responsive widget-none">



<div class="widget-body">
<!--    <h4 class="innerB">History</h4>-->
 
    <div >
        <ul id="history" class="timeline-activity project list-unstyled">
		<ul class="timeline-activity project list-unstyled" id="history">
		 <?php
                    if (!empty($history_detail)) {
                        
                     foreach ($history_detail as $history) {
                           
                            ?>
		<li class="">
                    <span class="list-date"><span class="day"><?php echo date('d',  strtotime($history->created));?></span><span class="month"><?php echo date('F',  strtotime($history->created));?></span></span>
                    <div class="block block-inline">
                        <div class="">
                            <div class="media">
                                <div class="media-body">
                                    <div class="clearfix"></div>
                                    <strong><?php echo $history->title;?></strong> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $history->message;?>  </div>
                            </div>
                        </div>
                    </div>
                </li>
                     <?php }
                    }
                    else{ ?>
                <div style="color: red;text-align: center;">No records found.</div>
                    <?php } ?>
		</ul>
		
		
		

    </div>
</div>
    </div>

</div>