<?php
	$root = "../../";
	require "../template/header.php";
?>

		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Foto</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<!-- Multiupload setelah diklik ADD MORE -->
			<script>
				var quantityImage=1;
				function addImage(){
					quantityImage++;
					var div=document.createElement('div');
					div.innerHTML='<div class="col-md-9"> <div class="img-upload"> <div class="fileUpload btn btn-warning"> <span>Browse File...</span> <input type="file" onchange="readURL(this,'+quantityImage+');" name="image'+quantityImage+'" class="inputupload" /> </div> <input  class="form-control textupload" type="text" name="ImgCapt'+quantityImage+'" placeholder="Judul Gambar" /> <input  class="form-control textupload" type="text" name="ImgCatg'+quantityImage+'" placeholder="Kategori Gambar" /> <input  class="form-control textupload" type="text" name="ImgInfo'+quantityImage+'" placeholder="Keterangan Gambar" /> </div> </div> <div class="col-md-3"> <img id="blah'+quantityImage+'" src="#" class="img img-responsive upImg center-block"> </div>';
				document.getElementById('image').appendChild(div) ;
				};
			</script>
			
			<!-- Script untuk preview gambar, not working untuk gambar ke 2 dst -->
			<script>
				function readURL(input,num) {
					if (input.files && input.files[0]) {
						var reader = new FileReader();
						var gbr1 = 1;

						reader.onload = function (e) {
							gbr1++;
							$('#blah'+num)
								.attr('src', e.target.result);
						};

						reader.readAsDataURL(input.files[0]);
						
						$('input[name=name]').val(input.files[0].name);
					}
				}
			</script>
			
			<div class="form-group" >
				<!-- Form untuk upload gambar pertama -->
				<div id="image" class="row">
					<div class="col-md-9">
						<div class="img-upload">
							<div class="fileUpload btn btn-warning">
								<span>Browse File...</span>
								<input type='file' onchange="readURL(this,1);" name="image1" class="inputupload" />
							</div>
							<input class="form-control textupload" type="text" name="ImgCapt" placeholder="Judul Gambar" placeholder="Judul Gambar"/>
							<input class="form-control textupload" type="text" name="ImgCatg" placeholder="Kategori Gambar"
							placeholder="Kategori Gambar"/>
							<input class="form-control textupload" type="text" name="ImgInfo" placeholder="Keterangan Gambar" placeholder="Keterangan Gambar"/>
						</div>
					</div>
					<div class="col-md-3">
						<img id="blah1" src="#" class="img img-responsive upImg center-block">
					</div>
					
				</div>
				
				<button type=button name="btnAddImage" class="btn btn-primary" onclick="addImage()" >Add More</button>	
			</div>
			
		</div>
	
    <!-- jQuery -->
    <script src="<?php echo $root; ?>assets-admin/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $root; ?>assets-admin/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $root; ?>assets-admin/dist/js/sb-admin-2.js"></script>
	
	<!-- jQuery v1.11 -->
	<script src="<?php echo $root; ?>assets-admin/dist/jquery/old-jq/jquery.min.js"></script>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
</body>

</html>