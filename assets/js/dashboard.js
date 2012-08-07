var Dashboard = {
    
    onReady: function() {
        $('#btnRecruiter').click(Dashboard.recruiter);
        $('#btnDeveloper').click(Dashboard.developer);
    },
    developer: function() {
        Dashboard.doAjax(1);  
    },
    recruiter: function(e) {
        Dashboard.doAjax(2);
    },    
    doAjax: function(value) {
        
        $.ajax({
            type : 'POST',
            url  : base_url + 'index/defineType',
            dataType : 'json',
            data : {
                type : value
            },
            success: function(result) {
                if (result.error == true) {
                    $('#divError').append(result.message);
                    $('#divError').fadeIn('slow', function() {
                        $(this).css('display', 'block');
                    });
                } else {
                    document.location.reload();
                }
            }
        });
    }
};