$("#contactForm").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitForm();
});

function submitForm(){
    //initialise variables with form content
    // var name = $("#name").val();
    // var email = $("#email").val();
    // var message = $("#message").val();

    // $.post(
    //     './process.php',
    //     {
    //         name : $("#name").val(),
    //         email = $("#email").val(),
    //         message = $("#message").val()
    //     },
    //     function(text){
    //         if (text == "success"){
    //             formSuccess();
    //         }
    //     },
    //     'text',
    // );

    $.ajax({
        type: "POST",
        url: "./process.php",
        data: 
        {
            "name": $("#name").val(),
            "email": $("#email").val(),
            "message": $("#message").val()
        },
        success : function(data){
            if (data == "success"){
                formSuccess();
            }
        }
    });
};

function formSuccess(){
    $( "#msgSubmit" ).animate({'opacity':'1'}, 800);;
}