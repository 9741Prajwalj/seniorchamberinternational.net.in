<section class="slice-lg sct-color-1">
    <div class="container">
        <div class="section-title section-title--style-1 text-center mb-4">
            <h3 class="section-title-inner heading-1">
                <?php echo translate('blogs')?>
            </h3>
            <span class="section-title-delimiter clearfix d-none"></span>
        </div>
        <span class="clearfix"></span>
        <?php
            $channel_partner_text = $this->db->get_where('frontend_settings', array('type' => 'blog_status'))->row()->value;
        ?>
        <div class="fluid-paragraph fluid-paragraph-sm c-gray-light strong-300 text-center">
            <?=$blog_status?>
        </div>
    </div>
</section>
  
<div class="block-wrapper" id="result">
    <!-- Loads List Data with Ajax Pagination -->
</div>

<section class="slice sct-color-1 mb-4">
    <div id="pagination" class="pr-5" style="float: right;">
        <!-- Loads Ajax Pagination Links -->
    </div>
</section>
           

<script>
    $(document).ready(function(){
        filter_channels('0');
    });

    function filter_channels(page){      
        var form = $('#filter_form');
        //var url = form.attr('action')+page+'/';
        var url = '<?php echo base_url(); ?>home/ajax_channel_list/'+page;
        var place = $('#result');
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        $.ajax({
            url: url, // form action url
            type: 'POST', // form submit method get/post
            dataType: 'html', // request type html/json/xml
            data: formdata ? formdata : form.serialize(), // serialize form data 
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend: function() {
                place.html("");
                place.html("<div class='text-center pt-5 pb-5' id='payment_loader'><i class='fa fa-refresh fa-5x fa-spin'></i><p>Please Wait...</p></div>").fadeIn(); 
                // change submit button text
            },
            success: function(data) {

                console.log(data);
                setTimeout(function(){
                    place.html(data); // fade in response data
                }, 20);
                setTimeout(function(){
                    place.fadeIn(); // fade in response data
                }, 30);
            },
            error: function(e) {
                // alert("hi");
                console.log(e)
            }
        });
        
    }
</script>
