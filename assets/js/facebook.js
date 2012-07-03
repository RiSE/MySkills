var Facebook = {
    
    onReady : function(appId) {
        
        window.fbAsyncInit = function() {
            
            FB.init({
                appId      : appId,
                status     : true, 
                cookie     : true,
                xfbml      : true,
                oauth      : true
            });
                
            /*FB.login(function(response) {
                if (response.authResponse) {
                    FB.api('/me', function(data) {
                        Facebook.username = data.name;
                    });
                }
            });*/
                
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {                        
                } else if (response.status === 'not_authorized') {
                }
            });
                
            FB.getLoginStatus(Facebook.updateButton);
            FB.Event.subscribe('auth.statusChange', Facebook.updateButton);
        };
        
        (function(d){
            var js, id = 'facebook-jssdk';
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement('script');
            js.id = id;
            js.async = true;
            js.src = "//connect.facebook.net/en_US/all.js";
            d.getElementsByTagName('head')[0].appendChild(js);
        }(document));
    },
    
    updateButton : function() {
        
    },
    
    fbStatus : function() {
        var status = null;
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                status = response.status;
            } 
        });
        return status;
    },
    
    fbLogout : function() {
        //FB.logout();
        //window.location = 'index';
        //FB.Connect.logoutAndRedirect('/logout'); 
        //return false;
        Facebook.onReady();
        $.ajax({
            type : 'POST',
            dataType : 'json',
            url : base_url + 'index/logout'
        });
        FB.logout(function(response) {
            window.location = base_url + 'index/logout';
        });
    }  
};