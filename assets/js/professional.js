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
            data : {
                id_job : Professional.submitId
            },
            success: function(result) {
                window.location = result.redirect;
            }
        });
        
        return false;
    },
    leaderboard: function() {
        
        $.ajax({
            url : base_url + 'index/listProfessionals',
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                Professional.listProfile(result.professionals);
            }
        });
    },
    listProfile: function(professionals) {
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                for (var i = 0; i < professionals.length; i++) {
                    $.ajax({
                        url : 'https://graph.facebook.com/'+professionals[i].fbuid,
                        type: 'GET',
                        dataType: 'json',
                        async: false,
                        success: function(ret) {                            
                            var pName = document.getElementById('fb_' + ret.id);
                            pName.innerHTML += ret.first_name;
                        }
                    });
                }
            }
        });
    }
}