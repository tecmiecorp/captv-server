<?php
/**
  * @var  \App\View\AppView $this
  */
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb" style="padding-right: 18px">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/sessions">Sessions</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row" style="padding-top:20px">
        <!-- left column -->
        <div class="col-md-6 col-xs-12" style="padding-top:10px;">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= __('Session info') ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="row">
                <!-- left column -->
                
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="box-body">
                              
                                 <?= $this->Form->create($session) ?>
                                <fieldset>
                                    
                                    <?php
                                        echo $this->Form->control('device', ['label' => 'Mac Address', 'disabled'=>true, 'value' => h($session->device)]);
                                        echo $this->Form->control('ip', ['label' => 'Ip Address', 'disabled'=>true, 'value' => h($session->ip)]);
                                        echo $this->Form->control('ap', ['label' => 'Access Point', 'disabled'=>true, 'value' => h($session->ap)]);
                                        ?>
                                <label>Session start (time / date)</label>
                                <div class="form-group datetime required">
                                        
                                     <?php
                                        
                                        echo $this->Form->hour('lastlog', ['disabled'=>true]);
                                        echo $this->Form->minute('lastlog', ['disabled'=>true]); 
                                     ?>
                                    
                                    &nbsp;
                                    
                                    <?php
                                        echo $this->Form->day('lastlog', ['disabled'=>true]); 
                                        echo $this->Form->month('lastlog', ['disabled'=>true, 'monthNames' => true]);
                                        echo $this->Form->year('lastlog', ['disabled'=>true]); 
                                    ?>
                                        
                                </div>
                                
                                <label>Expire Surfing (time / date)</label>
                                <div class="form-group datetime required">
                                        
                                     <?php
                                        
                                        echo $this->Form->hour('expire', ['disabled'=>true]);
                                        echo $this->Form->minute('expire', ['disabled'=>true]); 
                                     ?>
                                    
                                    &nbsp;
                                    
                                    <?php
                                        echo $this->Form->day('expire', ['disabled'=>true]); 
                                        echo $this->Form->month('expire', ['disabled'=>true]);
                                        echo $this->Form->year('expire', ['disabled'=>true]); 
                                    ?>
                                        
                                </div>
                                    
                                <label>Next session available (time / date)</label>
                                <div class="form-group datetime required">
                                        
                                     <?php
                                        
                                        echo $this->Form->hour('remove', ['disabled'=>true]);
                                        echo $this->Form->minute('remove', ['disabled'=>true]);
                                    ?>
                                    
                                    &nbsp;
                                    
                                    <?php
                                        echo $this->Form->day('remove', ['disabled'=>true]); 
                                        echo $this->Form->month('remove', ['disabled'=>true]);
                                        echo $this->Form->year('remove', ['disabled'=>true]);  
                                    ?>
                                        
                                </div>
                                    <?php
                                        echo $this->Form->control('browser', ['label' => 'Browser', 'disabled'=>true, 'class'=>'form-control', 'value' => h($session->browser)]);
                                        echo $this->Form->control('os', ['label' => 'Operating System', 'disabled'=>true, 'value' => h($session->os)]);
                                    ?>
                                </fieldset>
                                
                               <?= $this->Form->end() ?>
                            </div>
                        </div>
                </div>
              </div>
              

              <div class="box-footer">
               
              </div>
           
          </div>

        </div>
        
          <div class="col-md-6 col-xs-12">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                
                <div class="panel box box-secondary">
                  <div class="box-header with-border">
                   <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                      <h3 class="box-title">Actions</h3>
                  </div>
                  <!--<div id="collapseTwo" class="panel-collapse collapse in">-->
                    <div class="box-body">
                        <div class="row">
                            
                            <div class="col-md-6">
                                 <abbr title="Edit session">
                                     <?= $this->Html->link(__('<button type="button" class="btn btn-warning btn-block"><i class="fa fa-edit"></i></button>'), ['action' => 'edit', $session->id], ['escape' => false, 'style' => 'color:#fff']) 
                                     ?>
                                </abbr>
                             </div> 
                            
                            <div class="col-md-6">
                                 <abbr title="delete this session (reset device status)">
                                     <?= $this->Form->postLink(__("<button type='button' class='btn btn-danger btn-block'><i class='fa fa-trash-o'></i></button>"), ['action' => 'delete', $session->id], ['escape' => false, 'style' => 'color:#fff', 'confirm' => __('Are you sure you want to delete session {0}?', $session->id)])
                                     ?>
                                </abbr>
                            </div>
                            
                           
                        </div>
                     
                    </div>
                 <!-- </div> -->
                </div> 
                 <div class="panel box box-secondary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        User
                      </a>
                    </h4>
                  </div>
                   <div id="collapseTwo" class="panel-collapse ">
                    <div class="box-body">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tr>
                                <?php $user=$session->user ?>
                            <th><abbr title="user's log in name"><?= $this->Paginator->sort('username') ?></abbr></th>
                            <th><abbr title="user enable to log in"><?= $this->Paginator->sort('enabled') ?></abbr></th>
                            <th class="actions"><?= __('Actions') ?></th>
                            </tr>                              
                                <tr>
                                <td><?= h($user->username) ?></td>
                                <td><?php if (h($user->enabled)==true) echo "Yes"; else echo "No"; ?></td>
                                <td class="actions">
                                    <abbr title="View">
                                        <?= $this->Html->link(__("<small class='label bg-green'><i class='fa fa-info'></i></small>"), ['controller' => 'Users','action' => 'view', $user->id], ['escape' => false]) ?>
                                    </abbr>
                                    <abbr title="Edit">
                                        <?= $this->Html->link(__("<small class='label bg-yellow'><i class='fa fa-edit'></i></small>"), ['controller' => 'Users', 'action' => 'edit', $user->id], ['escape' => false]) ?>
                                    </abbr>
                                   
                                </td>
                            </tr>
                            
                          </table>
                        </div>
                       </div>
                     </div>
                  </div>
                <div class="panel box box-secondary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Quick Help</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                 <!-- <div id="collapseOne" class="panel-collapse collapse in">-->
                    <div class="box-body">
                      <ul>
                         <li><b>Mac Address:</b> device connected's address</li>
                        <li><b>IP Address:</b> device's IP</li>
                        <li><b>Access Point 's mac address</b> access point 's mac where device is connected</li>
                         <li><b>Session Start:</b> login 's device datetime</li>
                         <li><b>Expire Surfing:</b> session expire datetime (reload splash page and block user)</li>
                         <li><b>Next session available</b> unblock user datetime</li>
                         <li><b>Browser</b> User's browser agent</li>
                         <li><b>Os</b> User device's operating system</li>
                         <li><b>User:</b> username (if guest, is a unregistered guest)</li>
                      </ul>
                    </div>
                 <!-- </div>-->
                </div>
                  
              </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <!-- /.row -->
   
    </section>
    <!-- /.content -->

