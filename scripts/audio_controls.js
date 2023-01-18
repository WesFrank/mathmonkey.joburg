$('#myForm input').on('change', function() {
        
    value = $('input[name=radioName]:checked', '#myForm').val()

    if (value==1) {
        
        document.getElementById("george").removeAttribute("hidden");
        document.getElementById("alice").setAttribute("hidden", true);
        document.getElementById("alice").pause();
        
    } else if (value==2) {
     
        document.getElementById("alice").removeAttribute("hidden");
        document.getElementById("george").setAttribute("hidden", true);
        document.getElementById("george").pause();
        
    }
    
});