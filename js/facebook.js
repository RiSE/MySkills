var Facebook = {
    
    username : null,
        
    onReady : function() {
        
        window.fbAsyncInit = function() {
            
            FB.init({
                appId      : '380703318658533',
                status     : true, 
                cookie     : true,
                xfbml      : true,
                oauth      : true
            });
                
            FB.login(function(response) {
                if (response.authResponse) {
                    FB.api('/me', function(data) {
                        Facebook.username = data.name;
                    });
                }
            });
                
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
        
        var button = document.getElementById('abtnlogin');
                
        if (response.status === 'connected') {
            //button.innerHTML = '<div class="fb-login-button">Logout</div>';
            button.innerHTML = 'Logout';
            button.onclick = function() {
                FB.logout(function(response) {
                    //Log.info('FB.logout callback', response);
                    window.location = 'index';
                });
            };
        } else {
            //button.innerHTML = '<div class="fb-login-button">Login</div>';
            button.innerHTML = 'Login';
            button.onclick = function() {
                        
                FB.login(function(response) {
                    Log.info('FB.login callback', response);
                    if (response.status === 'connected') {
                    //Log.info('User is logged in');
                    } else {
                    //Log.info('User is logged out');
                    }
                });
            }
  
        }
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
    
    fbLogout : function(url) {
        //FB.logout();
        //window.location = 'index';
        
        var url_redirect = '/logout';
        
        if (url != undefined) {
            url_redirect = url;
        }
        
        FB.Connect.logoutAndRedirect(url_redirect);
        return false;
    }  
};