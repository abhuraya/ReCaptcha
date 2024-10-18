window.addEventListener("load", function(){
    "use strict";
    const form = document.querySelector(".contact")
    form.addEventListener("submit", function(event){
        event.preventDefault()
        console.log("form submitted")
        let fields = document.querySelectorAll(".contact .form-control")
        let valid = true;
        for(var i = 0; i < fields.length; i++){
            fields[i].classList.remove("no-error")
            if(fields[i].value === ""){
                fields[i].classList.add("has-error")
                fields[i].nextElementSibling.style.display = "block"
                valid = false
            }else{
                fields[i].classList.remove("has-error")
                fields[i].classList.add("no-error")
                fields[i].nextElementSibling.style.display = "none"

            }
        }

        if(valid){
            document.querySelector(".formfields").style.display = "none"
            document.querySelector("#alert").innerText = "Processing your submission, please wait... "
        }
    })
})