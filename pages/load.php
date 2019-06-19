<?php 
session_start();
ob_start();

 ?>
 <?php
 require('config.php');


 ?>
                 <div class="col-xs-12 col-md-8">
                        <?php
                      $id=(int)$_SESSION["id"];
                      $select=$bdd->prepare("SELECT * FROM conversation WHERE user_id=? ORDER BY dat_send DESC LIMIT 1");
                      $select->execute(array($id));
                       while ($list=$select->fetch()) { ?>
                       	 <?php
						   $datform= date_create($list['dat_send']);
						   $annee=date_format($datform,"d/m/Y");
						   $heure=date_format($datform,"G:i");
						                                  
						  ?>
                       <p class="moi" id="text"><small class="glyphicon glyphicon-time"><?=$heure?> <?=$annee?> </small><br>
                       <?php echo $list["message"];?>
                       </p>
                      <?php }  ?>
                      
                      </div>
                      <div  class="col-xs-12 col-md-4"></div>
                       <div class="col-xs-12 col-md-8">
                                 <?php
                       $id=(int)$_SESSION["id"];
                      $select=$bdd->prepare("SELECT * FROM conversation WHERE user_id!=? ORDER BY dat_send DESC LIMIT 1");
                       $select->execute(array($id));
                       while ($list=$select->fetch()) { ?>
                       	<?php
						   $datform= date_create($list['dat_send']);
						   $annee=date_format($datform,"d/m/Y");
						   $heure=date_format($datform,"G:i");
						                                  
						  ?>
                       <p class="toi" id="text"><small class="glyphicon glyphicon-time"><?=$heure?> <?=$annee?> </small><br>
                       <?php echo $list["message"];?>
                       </p>
                    <?php }  ?>
                      </div>

 