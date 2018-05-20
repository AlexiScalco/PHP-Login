//REGISTRATION FORM
$(document)
.on("submit", "form.js-register", function(event){
    event.preventDefault();
    
    var _form = $(this);
    var _error = $(".js-error", _form);
    
    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };
    
    if (dataObj.email.length < 6){
        _error
            .text("Please enter a valid e-mail address...")
            .show();
        
        return false;
        
    } else if (dataObj.password.length < 8) {
        _error
            .text("Password must be at least 8 characters long...")
            .show();
        
        return false;
    }
    
    //begin ajax
    _error.hide();
    
    $.ajax({
        type: 'POST',
        url: '/PHP/ajax/register.php',
        data: dataObj,
        dataTyle: 'json',
        async: true
    })
    .done(function ajaxDone(data){
        //Whatever data is
        if(data.redirect !== undefined){
            window.location = data.redirect
        } else if(data.error !== undefined) {
            _error
                .text(data.error)
                .show();
        }
    })
    .fail(function ajaxFailed(e){
        //Failed
    })
    .always(function ajaxAlwaysDoThis(data){
        //Always do
        console.log("Always");
    })
    
    return false;
});


//LOGIN FORM
$(document)
.on("submit", "form.js-login", function(event){
    event.preventDefault();
    
    var _form = $(this);
    var _error = $(".js-error", _form);
    
    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };
    
    if (dataObj.email.length < 6){
        _error
            .text("Please enter a valid e-mail address...")
            .show();
        
        return false;
        
    } else if (dataObj.password.length < 8) {
        _error
            .text("Password must be at least 8 characters long...")
            .show();
        
        return false;
    }
    
    //begin ajax
    _error.hide();
    
    $.ajax({
        type: 'POST',
        url: '/PHP/ajax/login.php',
        data: dataObj,
        dataTyle: 'json',
        async: true
    })
    .done(function ajaxDone(data){
        //Whatever data is
        if(data.redirect !== undefined){
            window.location = data.redirect
        } else if(data.error !== undefined) {
            _error
                .html(data.error)
                .show();
        }
    })
    .fail(function ajaxFailed(e){
        //Failed
    })
    .always(function ajaxAlwaysDoThis(data){
        //Always do
        console.log("Always");
    })
    
    return false;
});