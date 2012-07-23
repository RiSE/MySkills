var Professional = {
    
    submitId : null,
    onReady: function() {
        
        $('#frmJob :input[type=submit]').click(function() {
            Professional.submitId = this.id;
        });
        $('#frmJob').submit(Professional.submitApplyForJob);
    },
    submitApplyForJob: function() {
        
        $.ajax({
            url : base_url + 'index/apply',
            type : 'POST',
            dataType : 'json',
            data : {id_job : Professional.submitId},
            success: function(result) {
                window.location = result.redirect;
            }
        });
        
        return false;
    }
}