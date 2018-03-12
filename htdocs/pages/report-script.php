<script>
    $().ready(function() {
        var nmc = $("#fmc_radio-1");
        var fmc = $("#fmc_radio-0");
        var textarea = $("#textarea");
        
        nmc.click(function(){
            textarea.attr("disabled", false);
            textarea.attr("required", true);
        });
        
        fmc.click(function(){
            textarea.attr("disabled", true);
            textarea.attr("required", false);
        });
    });
</script>