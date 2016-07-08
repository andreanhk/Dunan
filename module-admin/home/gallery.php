<?php
	$root = "../../";
	require "../template/header.php";
?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
			<h1 class="page-header">Pengaturan Galeri Foto</h1>
		</div>
	</div>
			

		<!-- Portfolio Projects -->
        <div class="row">
        	<div class="col-md-3">
            	<!-- Filter -->
                <div id="options" class="work-nav">
                    <ul id="filters" class="option-set" data-option-key="filter">
                    	<li class="type-work">Kategori</li>
                        <li><a href="#filter" data-option-value="*" class="selected">Semua</a></li>
                        <li><a href="#filter" data-option-value=".design">Pilihan Studio</a></li>
                        <li><a href="#filter" data-option-value=".photography">Properti Foto</a></li>
                        <li><a href="#filter" data-option-value=".video">Contoh Hasil</a></li>
                    </ul>
                </div>
                <!-- End Filter -->
            </div>
            
            <div class="col-md-9">
            	<div class="row">
					<div class="col-md-3 gal">
						<img src="<?php echo $root; ?>assets/img/work/full/image-01-full.jpg" class="img img-responsive">
						<button class="btn btn-small btn-danger delBtn"><i class="fa fa-trash"></i></button>
						<button class="btn btn-small btn-info editBtn"><i class="fa fa-edit"></i></button>
					</div>
					<div class="col-md-3 gal">
						<img src="<?php echo $root; ?>assets/img/work/full/image-01-full.jpg" class="img img-responsive">
						<button class="btn btn-small btn-danger delBtn"><i class="fa fa-trash"></i></button>
						<button class="btn btn-small btn-info editBtn"><i class="fa fa-edit"></i></button>
					</div>                    
            	</div>
            </div>
        </div>
        <!-- End Portfolio Projects -->
			
</div>
</div>
	
    <!-- jQuery -->
    <script src="<?php echo $root; ?>assets-admin/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $root; ?>assets-admin/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $root; ?>assets-admin/dist/js/sb-admin-2.js"></script>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
</body>

</html>