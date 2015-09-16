<script type="text/javascript">
    /*
     * autocomplete search form
     */
    jQuery(document).ready(function () {
        
        jQuery.validator.addMethod("loginRegex", function(value, element) {
            return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
        }, "<div id='search-validate' class='search-validate'>Search string contain only letters, numbers, or dashes.</div>");
        
       
        jQuery('#searchform').validate({
            rules: {
                "s": {
                    required: false,
                    loginRegex: true
                }
            }
        });
        
        /*
         * autocomplete
         */
        jQuery("#SearchKeywords").autocomplete({
            delay: 500,
            source: function (request, response) {
                jQuery.ajax({
                    url: "http://localhost/wordpress-foundation/wp-includes/autocomplete.php",
                    data: {term: jQuery("#SearchKeywords").val()},
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        response(data);
                    }
                });
            }
        });
    });
/*
 * end autocomplete search form
 */
</script>
<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" placeholder="Search Site" name="s" id="SearchKeywords" />
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>
