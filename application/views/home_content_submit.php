<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gelio Laft </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="architecture,building,business,bootstrap,creative,exterior design,furniture design,gallery,garden design,house,interior design,landscape design,multipurpose,onepage,portfolio,studio">
    <meta name="author" content="">


    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->


    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/css/jpreloader.css" type="text/css">
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/css/animate.css" type="text/css">
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/css/plugin.css" type="text/css">
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/css/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/css/owl.transitions.css" type="text/css">
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/demo/demo.css" type="text/css">

    <!-- custom background -->
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/css/bg.css" type="text/css">

    <!-- color scheme -->
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/css/color.css" type="text/css" id="colors">

    <!-- load fonts -->
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/fonts/font-awesome/css/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/fonts/elegant_font/HTML_CSS/style.css" type="text/css">
    <link rel="stylesheet" href="<?= SITE_URL;?>assets/fonts/et-line-font/style.css" type="text/css">
<script>
	
</script>
</head>

<body id="homepage">

    <div id="wrapper">

        <!-- header begin -->
        <header>
			<div class="info">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="col">Working Hours Monday - Friday <span class="id-color"><strong>08:00-16:00</strong></span></div>
							<div class="col">Toll Free <span class="id-color"><strong>1800.899.900</strong></span></div>
							<!-- social icons -->
							<div class="col social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-rss"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-envelope-o"></i></a>
							</div>
                        <!-- social icons close -->
						</div>
					</div>
				</div>
			</div>
			
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="#wrapper">
                                <img class="logo" src="images/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo close -->

                        <!-- small button begin -->
                        <span id="menu-btn"></span>
                        <!-- small button close -->
                        
						<!-- mainmenu begin -->
                        <nav>
                            <ul id="mainmenu">
                                <li><a href="http://underbygging.no/geilo-laft/">Home</a></li>
                                <!--<li><a href="#section-services">What We Do</a></li>
                                <li><a href="#section-steps">Process</a></li>
                                <li><a href="#section-team">Team</a></li>
                                <li><a href="#section-portfolio">Projects</a></li>
                                <li><a href="#section-blog">Blog</a></li>
                                <li><a href="#section-contact">Contact</a></li>-->
                            </ul>
                        </nav>

                    </div>
                    <!-- mainmenu close -->

                </div>
            </div>
        </header>
        <!-- header close -->

        <!-- content begin -->
        <div id="content" class="no-bottom no-top">
		
			<section id="section-services">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-md-offset-2 text-center wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
								<div class="spacer-single"></div>
								<h1>Gelio Laft</h1>
								<div class="separator"><span><i class="fa fa-circle"></i></span></div>
								<div class="spacer-single"></div>
								<?php
								 $msg = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
									if(strlen($msg) > 0){?>
									<div class="alert alert-success">
									  <strong>Suksess!</strong> <?= $msg;?>.
									</div>
								<?php } 
								$newdata = array('msg' => '');
								$this->session->set_userdata($newdata);
								?>
							</div>
							
							<form action="" method="POST" onsubmit="return submit_design()">
							<?php
							if($ipda > 0){
								$name = '';
								$email = '';
								$phone = '';
								if($user > 0){
									$userInfo = $this->db->query("SELECT * FROM `user_info` WHERE USER_ID = '".$user."' ");
									$userDetails = $userInfo->result_array();
									if(is_array($userDetails) AND sizeof($userDetails) > 0){
										$name = $userDetails[0]['USER_NAME'];
										$email = $userDetails[0]['USER_EMAIL'];
										$phone = $userDetails[0]['USER_PHONE'];
									}
								}
							?>
							
							<div class="col-md-8 col-md-offset-0 wow fadeInLeft animated" data-wow-delay=".1s" style="visibility: visible; animation-name: fadeInLeft;">
								<div class="row1">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
											<label for="usr">Gi prosjektet ditt et navn:</label>
												<input type='text' name='design-name' id='design-name' value='<?= $design_name;?>' class="form-control" placeholder="Gi prosjektet ditt et navn">
										</div>
										<div class="form-group">
											<label for="usr">Navn:</label>
												<input type='text' name='name' value='<?= $name;?>' id='name' class="form-control" placeholder="Navnet ditt">
										</div>
										<div class="form-group">
											<label for="usr">E-post:</label>	
											<input type='text' name='email' value='<?= $email;?>' id='email' class="form-control" placeholder="Din epost">
										
										</div>
										<div class="form-group">
											<label for="usr">telefon:</label>	
												<input type='text' name='phone' value='<?= $phone;?>' id='phone' class="form-control" placeholder="Din telefon">
											
										</div>
                                    </div>
                                    <!--<div class="col-md-6">
                                        <div class="form-group">
											<label for="usr">kommentarer:</label>	
											<textarea name='message' id='message' class="form-control" placeholder="Your Comments"></textarea>
											
                                        </div>
                                    </div>-->

                                </div>
								<div class="spacer-single"></div>
							
							</div> 
							<?php } ?>
							
							<div class="col-md-4 fadeInRight animated sub-total-div" data-wow-delay=".2s" style="">
								<div class="" style="margin-bottom:30px;" id="design_view">
								
									<?php
									 if(is_array($design_list) AND sizeof($design_list) > 0){
										$li = 1;
										foreach($design_list AS $dataList){
										$classActive = '';
										?>
										<div class="col-md-5 box-div-for-items" id="div" onclick="image_preview(<?= $dataList['DESIGN_UP_ID']; ?>);" >	
												<img src="<?= SITE_URL;?>assets/img/demo/<?= $dataList['IMAGE_URL']; ?>" class="img-responsive width-fixed" id="myImg__<?= $dataList['DESIGN_UP_ID']; ?>" alt="<?= $dataList['DESIGN_NAME_UP']; ?>"> 
												<p class="lead"><?= $dataList['DESIGN_NAME_UP']; ?> <br/> </p>
												<input type="hidden" value="<?= $dataList['DESIGN_UP_ID']; ?>" name="choose_design">
											</div>
										<?php
										$li++;
										}
									 }
									?>
								</div>
								<div class="">
									<div class="total-amount-headding">
										<h3 class="headding-class"><span class="id-color">Oppsummering av din forespørsel</span> </h3>
									</div>
									<div class="sub-amount">
										<div class="row">	
											<?php
											$checkEdit = $this->db->query("SELECT type.MODEL_NAME, type.MODEL_ID, item.ITEMS_NAME, item.ITEM_PRICE FROM design_partten AS par INNER JOIN model_type AS type ON par.MODEL_ID = type.MODEL_ID INNER JOIN model_items AS item ON par.ITEMS_ID = item.ITEMS_ID WHERE par.DESIGN_ID = '".$ipda."' AND par.DESIGN_STATUS = 'Active'");
											$result = $checkEdit->result_array();
											//print_r($result);
											$total_amount = 0;
											if(is_array($result) AND sizeof($result) > 0){
												foreach($result AS $subResut){
												?>
												
													<div class="col-md-8 col-sm-8 col-xs-9" id="title__<?= $subResut['MODEL_ID'];?>">
														<b><?= $subResut['MODEL_NAME'];?> - </b> <?= $subResut['ITEMS_NAME'];?> :
													</div>
													<div class="col-md-3 col-sm-3 col-xs-3" id="price__<?= $subResut['MODEL_ID'];?>">
														<?= number_format($subResut['ITEM_PRICE']);?> kr.
													</div>
												
												
												<?php	
												$total_amount += $subResut['ITEM_PRICE'];
												}
											}
											?>
										</div>
									</div>
									<div class="sub-amount">
										<div class="row">
											<div class="col-md-10 text-right">
												<h2 class="price-label primary-price-label" id="total_sub" ><?= number_format($total_amount);?> kr.</h2>
											</div>
										</div>
									</div>
								
								<div id="summary-footer" class="clearfix">
									<a class="saveDesign" href="<?= SITE_URL;?>design?id=<?= $ipda;?>">
										<div>
											<h3>Oppdater</h3>
										</div>
									</a>
									<button class="bookButton us-ca-done"  name="save_design">
										<div>
											<?php if($ipda > 0){?><h3>Send forespørsel</h3> <?php }else{ ?><h3>Neste</h3> <?php } ?>
										</div>
									</button>
								</div>
								</div>
							</div>
							</form>
						</div>
					</div>
				</section>
				<div id="myModal" class="modal">
				  <span class="close">&times;</span>
				  <img class="modal-content" id="img01">
				  <div id="caption"></div>
				</div>
		</div>
		
		<script src="<?= SITE_URL;?>assets/js/jquery.min.js"></script>
		<script src="<?= SITE_URL;?>assets/js/jpreLoader.js"></script>
		<script src="<?= SITE_URL;?>assets/js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3"></script>
		<script src="<?= SITE_URL;?>assets/js/wow.min.js"></script>
		<script src="<?= SITE_URL;?>assets/js/jquery.magnific-popup.min.js"></script>
		<script src="<?= SITE_URL;?>assets/js/enquire.min.js"></script>
		<script src="<?= SITE_URL;?>assets/js/designesia.js"></script>
		<script src="<?= SITE_URL;?>assets/demo/demo.js"></script>

		<script>
		function select_items(i, m, price, items, model){
			var x = document.getElementsByClassName('div__'+i);
			
			for(var cla = 0; cla < Number(x.length); cla++){
				document.getElementById('div__'+i+'__'+cla).classList.remove('active-items');				
			}
			document.getElementById('cost_id__'+i).value = price;
			document.getElementById('model_type_id__'+i).value = items;
			document.getElementById('model_id__'+i).value = model;
			
			document.getElementById('div__'+i+'__'+m).classList.add('active-items');	
			sub_total();			
		}
		
		function sub_total(){
			var x = document.getElementsByClassName('cost_id');
			var sub = 0;
			
			for(var cla = 1; cla < Number(x.length + 1); cla++){
				var cost = document.getElementById('cost_id__'+cla).value;
				sub += Number(cost);
			}
				
			document.getElementById('total_sub').innerHTML = Number(sub)+'kr.';
			document.getElementById('total_sub_lone').innerHTML = Number(sub)+'kr.';
		}
			
		//sub_total();
		
		
		function submit_design(){
			if(!confirm('Er du sikker p책 at du lagrer dette designet')){
				return false;
			}
			return true;
		}
		</script>
		<script>
		
		var modal = document.getElementById('myModal');
		function image_preview(idN){
			var img = document.getElementById('myImg__'+idN);
			var modalImg = document.getElementById("img01");
			var captionText = document.getElementById("caption");
			img.onclick = function(){
				modal.style.display = "block";
				modalImg.src = this.src;
				captionText.innerHTML = this.alt;
			}
		}
		var span = document.getElementsByClassName("close")[0];

		span.onclick = function() { 
			modal.style.display = "none";
		}
		</script>
	</body>

</html>
