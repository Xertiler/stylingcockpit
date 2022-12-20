var colorPickerValue =  document.getElementById("color-picker").getAttribute('value');

document.getElementById("color-picker").addEventListener("change", function(event){
    colorPickerValue = event.target.value;
});

function alertColor(){
    alert(colorPickerValue.toString());
}




    require(['TYPO3/CMS/Core/Ajax/AjaxRequest'], function (AjaxRequest) {
    var testButtons = document.getElementsByClassName("testButton");

    let test = function (element){
        var element = this;

        const randomNumber = Math.ceil(Math.random() * 32);
        new AjaxRequest(TYPO3.settings.ajaxUrl.test_test)
            .withQueryArguments({input: randomNumber})
            .get()
            .then(async function (response){
                const resolved = await response.resolve();
                console.log(resolved.result);
            })



    }

    for (var i = 0; i < testButtons.length; i++){
        testButtons[i].addEventListener('click', test, false);
    }
});