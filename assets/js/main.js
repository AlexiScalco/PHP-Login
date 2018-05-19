$(document)
.on("submit", "form.js-register", function(event){
    event.preventDefault();
    
    var _form = $(this);
    var _error = $(".js-error", _form);
    
    var _data = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };
    
    if (_data.email.length < 6){
        _error
            .text("Please enter a valid e-mail address...")
            .show();
        
        return false;
        
    } else if (_data.password.length < 8) {
        _error
            .text("Password must be at least 8 characters long...")
            .show();
        
        return false;
    }
    
    _error.hide();
    
    return false;
    
})