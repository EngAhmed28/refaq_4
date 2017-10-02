     </div>
    </div>
    <!--------------------------------------->
<!--
    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/datepicker.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/js.js"></script>
-->


  

   <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/datepicker.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/main.js"></script>


  <script src="<?php echo base_url()?>asisst/admin_asset/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/responsive.bootstrap.min.js"></script>


 <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/js.js"></script>


    <!------------ SCRIPT TEXTAREA ------>
    <script src="<?php echo base_url()?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/ckeditor/js/sample.js"></script>
    <script>
        initSample();
    </script>


  



 <script>
  $.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
    var fileIdCounter = 0;
    
    this.closest(".files").change(function (evt) {
        var output = [];

        for (var i = 0; i < evt.target.files.length; i++) {
            fileIdCounter++;
            var file = evt.target.files[i];
            var fileId = sectionIdentifier + fileIdCounter;

            filesToUpload.push({
                id: fileId,
                file: file
            });

            var removeLink = "<img src='" + URL.createObjectURL(file) + "' style='width:100%;'/><span class=\"removeFile closebtn\" style='cursor: pointer' data-fileid=\"" + fileId + "\"><h6>x</h6></span>";

            output.push('<li class="ui-state-default" data-order=0 data-id="' + file.lastModified + '">'+ removeLink+'</li> ');
        };

        $(this).children(".fileList")
            .append(output.join(""));

        //reset the input to null - nice little chrome bug!
        evt.target.value = null;
    });

    $(this).on("click", ".removeFile", function (e) {
        e.preventDefault();

        var fileId = $(this).parent().children("span").data("fileid");
        
        // loop through the files array and check if the name of that file matches FileName
        // and get the index of the match
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id === fileId)
                filesToUpload.splice(i, 1);
        }
        
        $(this).parent().remove();
    });

    this.clear = function () {
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id.indexOf(sectionIdentifier) >= 0)
                filesToUpload.splice(i, 1);
        }

        $(this).children(".fileList").empty();
    }
    
    return this;
 };

 (function () {
    var filesToUpload = [];

    var files1Uploader = $("#files1").fileUploader(filesToUpload, "files1");
    
    $("#uploadBtn").click(function (e) {
        
        e.preventDefault();
        
        var dataString = new FormData();
        
        for (var i = 0, len = filesToUpload.length; i < len; i++) {
            dataString.append("files[]", filesToUpload[i].file);
        }
        
        //for sending texteara data
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        
        var other_data = $('form').serializeArray();
        
        $.each(other_data,function(key,input){
            dataString.append(input.name,input.value);
        });
        
        $.ajax({
            url: '<?php echo base_url() ?>Emails/inbox/'+$("#page_type").val()+'/'+$("#page_id").val(),
            data: dataString,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
                //location.reload();
                window.location = "<?php echo base_url() ?>Emails/inbox/new/0";
                console.log("hi");
                console.log(data);
                files1Uploader.clear();
                $("#email_to").val('').selectpicker('refresh');;
                $('#title').val('');
                CKEDITOR.instances[instance].setData('');
                $('#images').val('');
            },
            error: function (data) {
                console.log("shit");
                console.log(data);
                //alert("ERROR - " + data.responseText);
            }
        });
    });
 })()


    </script>
    
    
<script>
    $(document).ready(function(){
    $('#all').on('click',function(){
        if(this.checked){
            $('.cc').each(function(){
                this.checked = true;
                document.getElementById('delet').style.display = "inline";
            });
        }else{
             $('.cc').each(function(){
                this.checked = false;
                document.getElementById('delet').style.display = "none";
            });
        }
    });

    $('.cc').on('click',function(){
        if($('.cc:checked').length == $('.cc').length){
            $('#all').prop('checked',true);
        }else{
            $('#all').prop('checked',false);
        }
        if($('.cc:checked').length != 0)
            document.getElementById('delet').style.display = "inline";
        else{
            if($('.cc:checked').length == 0)
                document.getElementById('delet').style.display = "none";
        }
    });
 });
</script>


</body>

</html>