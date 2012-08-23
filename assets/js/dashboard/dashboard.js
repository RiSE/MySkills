var Dashboard = {
    
    onReady: function() {
        $('#btnRecruiter').click(Dashboard.recruiter);
        $('#btnDeveloper').click(Dashboard.developer);
        
        $("#PostMessage").click(Dashboard.postMessage); 
        $("#Message").keyup(Dashboard.messageKeyUp);
    },
    postMessage: function() {
        if($.trim($("#Message").val()) =="" ||$.trim($("#Message").val()) == $.trim("Send a public message. (limited to 140 characters) Will appear after you refresh the page.")){
            $("#divError").show();
            $("#msnerro").html("The messagem field can't be empty");
        }else{
            $("#frmDBoard").submit();
        }
    },
    messageKeyUp: function(event) {
        
        var num = $(this).val().length;
        if(event.keyCode == 8 || event.keyCode == 46){
            if(num != 1){
                $('#limitecaracter').text(-num+140);
            }
        }else{
            if($('#limitecaracter').text() == "1"){
                var texto = $(this).val();
                $(this).val(texto.substring(0,140));
            }else{
                $("#limitecaracter").text(-num+140);
            }
        }
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