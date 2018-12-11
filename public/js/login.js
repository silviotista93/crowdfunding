let iniciarErrores = true;
$("#xs_contact_get_action").click(function (e){
    e.preventDefault();
    let form = $("#frmLogin");
    let url = form.attr("action");
    let data = form.serialize();
    data+="&json=true";

    showError = (error, element) => {
        form.find(".mesajesError");
        if (error){
            if (typeof error === "string"){
                form.find(element).html(error);
            }else{
                form.find(element).html(error[0]);
            }
        }
    }

    $.post(url, data,function (e){
        console.log(e,"ssssssssssss");
    }, "JSON").fail(function (e){
        startErrors();
        e = e.responseJSON;
        if (e && e.errors){
            showError(e.errors.password, "#error-password");
            showError(e.errors.email, "#error-email");
        }else{
            window.location.reload();
        }
        //showError(e.message, "#errorGeneral");
    });
});

function startErrors(){
    if (!iniciarErrores){
        return;
    }
    iniciarErrores = false;
    let form = $("#frmLogin");
    form.find(".xs-input-control").each(function (){
        $(this).removeClass(".is-invalid");
        $(this).change(function (e){
            $(this).val($(this).val().trim());
            form.find("#error-"+e.target.name).html("");
        });
    });
}

$("#xs_register_get_action").click(function (e){
    alert("registro");
    e.preventDefault();
});