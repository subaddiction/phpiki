<div style="margin:1em auto;max-width:1200px;font-size:11px;line-height:12px;">
	<p>
	<?php echo $config['LOCALE']['IMAGE_TEXT']['EN']; ?>
	</p>
	<input type="file" id="files" name="files[]" style="border:0;background:#000000;color:#ffffff;" />
	<textarea id="b64image" rows="2" style="width:100%;height:48px;background:#333333;color:#cccccc;"></textarea>
</div>

<script type="text/javascript">
//<![CDATA[
function handleFileSelect(evt) {
	
	var files = evt.target.files; // FileList object

	var output = [];
	
	for (var i = 0, f; f = files[i]; i++) {
		
		var reader = new FileReader();
		reader.readAsDataURL(f);
		
		reader.onload = (function(theFile) {
			return function(e) {
				var imageCode = '%%&lt;img src="' + e.target.result + '" / &gt;%%';
				document.getElementById('b64image').innerHTML = imageCode;
			};
		})(f);

	}
    
}
document.getElementById('files').addEventListener('change', handleFileSelect, false);
//]]>
</script>
