window.addEventListener("load", () => {
    function popUp() {
        alert("Thanks for your submission");
    }

    const submitButton = document.getElementById("form-submit");

    submitButton.addEventListener("click", popUp);

});