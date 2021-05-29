<?php if($branch_data): ?>                  
                    <?php foreach ($branch_data as $branch_key => $branch_value): ?>
                        <?php 

                        $user_id = $this->session->userdata('id');
                        if($user_id==1):
                            ?>
                            
       
                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <a href="<?php echo base_url('dashboard/proceed') ?>/<?php echo $branch_value['branch_id']; ?>">
                    <div class="dash-box">
                        <div class="website-traffic-ctn align-center" style="padding-top: 30px">
                            <img src="<?php echo base_url('assets/images/branch.png'); ?>" style="height: 100px !important;width: auto !important;" >
                            <br>
                            <h4><?php echo $branch_value['branch_name']; ?></h4>
                        </div>
                        <div class="sparkline-bar-stats1"><canvas width="58" height="36" style="display: inline-block; width: 58px; height: 36px; vertical-align: top;"></canvas></div>
                    </div>
                </a>
                </div>
               
                            <?php
                        else:
                            ?>
                     
                         <?php if(in_array(preg_replace('/\s+/', '', $branch_value['branch_name']), $user_permission)): ?>
                           <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <a href="<?php echo base_url('dashboard/proceed') ?>/<?php echo $branch_value['branch_id']; ?>">
                    <div class="dash-box">
                        <div class="website-traffic-ctn align-center" style="padding-top: 30px">
                            <img src="<?php echo base_url('assets/images/branch.png'); ?>" style="height: 100px !important;width: auto !important;" >
                            <br>
                            <h4><?php echo $branch_value['branch_name']; ?></h4>
                        </div>
                        <div class="sparkline-bar-stats1"><canvas width="58" height="36" style="display: inline-block; width: 58px; height: 36px; vertical-align: top;"></canvas></div>
                    </div>
                </a>
                </div>
                 <?php  endif;
                        ?>
                <?php endif; ?>
      <?php endforeach ?>
                  <?php endif; ?>
          
 