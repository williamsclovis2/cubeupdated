<?php 
    include "admin/core/init.php";
?>

<div class="col-md-12 col-lg-12">
        <div class="row  custom-album" id="moresection">
  <!-- Start of Gallery Loop -->
        <?php 
            $sql="SELECT * FROM album ORDER BY id desc LIMIT 7 offset 12";
            $items=DB::getInstance()->query($sql);
            
            if($items->count()):foreach($items->results() as $item):
        ?>

         <div class="col-md-3">
            <div class="content">
                <a href="#" data-toggle="modal" data-target="#mymodal<?=$item->id?>">
                  <div class="content-overlay"></div>
                  <img src="images/ourwork/front/<?=$item->picture?>" class="content-image" style="width:100%;">
                  <div class="content-details fadeIn-bottom">
                    <h3 class="content-title"><?=$item->details?> </h3>
                  </div>
                </a>
            </div>
         </div>
         

      <section id="kwibuka">
        <div class="modal fade modal-fullscreen" id="mymodal<?=$item->id?>" role="dialog" style="background-color:#000;">
            <div class="modal-dialog modal-lg" style="boeder-raduis">
                <div class="modal-content" style="box-shadow:none; border:none;border-radius:0 !important;">
                    <div class="model-body">
                        <div class="container-fluid">
                            <a class="close" data-dismiss="modal"><img src="closeicon.png"></a>
                        <div class="row">
                        <div class="col-md-12">
                          <div id="carousel-custom-16<?=$item->id?>" class="carousel slide" data-ride="carousel" data-interval="false" >
                          <!-- Wrapper for slides -->
                              <div class="carousel-inner" role="listbox">

                              <?php 
                                  $inner_sql="SELECT * FROM picture WHERE album_id=".$item->id;
                                  $inner_items=DB::getInstance()->query($inner_sql);
            
                                  if($inner_items->count()): $counter=1; $class=""; foreach($inner_items->results() as $inner_item):

                                    if($counter==1) $class="active"; else $class="";
                              ?>
                                <div class="item <?=$class?>">
                                  <img src="images/ourwork/<?=$item->name?>/<?=$inner_item->name?>" alt="..." class="img-responsive">
                                   <div class="carousel-caption hidden-xs" id="">
                                        <h3><?=$inner_item->title?></h3>
                                        <p><?=$inner_item->details?></p>
                                  </div>  
                                </div>
                                
                              <?php 
                                  $counter++;
                                endforeach;
                              endif;
                              ?>

                               <!-- <div class="item">
                                  <img src="images/ourwork/EF/ef2.jpg" alt="..." class="img-responsive">
                                  <div class="carousel-caption hidden-xs" id="">
                                        <h3>25th Commemoration of the 1994 Genocide against the Tutsi | Rwanda</h3>
                                        <p>Event Production Management | Stage design &amp; construction | Provision of Screens, Lighting &amp; AV equipment | Media Audio &amp; Video Distribution </p>
                                  </div> 
                                </div>
                                 
                               <div class="item">
                                  <img src="images/ourwork/EF/ef2.jpg" alt="..." class="img-responsive">
                                  <div class="carousel-caption hidden-xs" id="">
                                        <h3>25th Commemoration of the 1994 Genocide against the Tutsi | Rwanda</h3>
                                        <p>Event Production Management | Stage design &amp; construction | Provision of Screens, Lighting &amp; AV equipment | Media Audio &amp; Video Distribution </p>
                                  </div>     
                                </div>
                                <div class="item">
                                  <img src="images/ourwork/EF/ef3.JPG" alt="..." class="img-responsive">
                                  <div class="carousel-caption hidden-xs" id="">
                                        <h3>25th Commemoration of the 1994 Genocide against the Tutsi | Rwanda</h3>
                                        <p>Event Production Management | Stage design &amp; construction | Provision of Screens, Lighting &amp; AV equipment | Media Audio &amp; Video Distribution </p>
                                  </div>  
                                </div>
                                <div class="item">
                                  <img src="images/ourwork/EF/ef4.JPG" alt="..." class="img-responsive">
                                  <div class="carousel-caption hidden-xs" id="">
                                        <h3>25th Commemoration of the 1994 Genocide against the Tutsi | Rwanda</h3>
                                        <p>Event Production Management | Stage design &amp; construction | Provision of Screens, Lighting &amp; AV equipment | Media Audio &amp; Video Distribution </p>
                                  </div> 
                                </div> -->
                                

                              </div>

                              <!-- Controls -->
                              <a class="left carousel-control" href="#carousel-custom-16<?=$item->id?>" role="button" data-slide="prev">
                                <i class="fa fa-long-arrow-left"></i>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#carousel-custom-16<?=$item->id?>" role="button" data-slide="next">
                                <i class="fa fa-long-arrow-right"></i>
                                <span class="sr-only">Next</span>
                              </a>


                              <!-- Indicators -->
                              <ol class="carousel-indicators">

                              <?php 
                                  $inner_nav_sql="SELECT * FROM picture WHERE album_id=".$item->id;
                                  $inner_nav_items=DB::getInstance()->query($inner_nav_sql);
            
                                  if($inner_nav_items->count()): $counter=1; $class=""; foreach($inner_nav_items->results() as $inner_nav_item):

                                    if($counter==1) $class="active";
                              ?>
                                  <li data-target="#carousel-custom-16<?=$item->id?>" data-slide-to="0" class="<?=$class?>">
                                     <img src="images/ourwork/<?=$item->name?>/<?=$inner_nav_item->name?>" alt="..." class="img-responsive">
                                  </li>

                                  <?php 
                                  $counter++;
                                endforeach;
                              endif;
                              ?>
                                  <!-- <li data-target="#carousel-custom-16" data-slide-to="1">
                                     <img src="images/ourwork/EF/ef2.jpg" alt="..." class="img-responsive">
                                  </li>
                                  <li data-target="#carousel-custom-16" data-slide-to="2">
                                     <img src="images/ourwork/EF/ef3.JPG" alt="..." class="img-responsive">
                                  </li>
                                   <li data-target="#carousel-custom-16" data-slide-to="3">
                                     <img src="images/ourwork/EF/ef4.JPG" alt="..." class="img-responsive">
                                  </li> -->

                              </ol> 
                                <div class="visible-xs" id="cap1">
                                        <h3>Eisenhower Fellowships Africa Regional Conference 2019 |Kigali |Rwanda</h3>
                                        <p>Concept development | Website building | Branding | Advertising &amp; Communications Services | Media Management | Participant Management |Technical Production planning &amp; execution| Stage design &amp; construction | Provision of Sound, Lighting &amp; AV equipment| Filming &amp;&amp; Live Feed | Transport Management | Accommodation Management | Airport Meet &amp; Greet | Catering Management | Social activities| Delegate tour activities</p>
                                     </div>
                           </div>
                          </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
  <!-- End of Gallery Loop -->

      <?php 
        endforeach;
      endif;
      ?>

      
      </div>
      
    </div>