var colorPickerValue =  document.getElementById("color-picker").getAttribute('value');
var lastHomepage = "";
var lastGrid = "";

document.getElementById("color-picker").addEventListener("change", function(event){
    colorPickerValue = event.target.value;
});

function alertColor(){
    alert(colorPickerValue.toString());
}

function changeHomepage() {
    var e = document.getElementById("homepageOption");
    var currentHomepage = e.options[e.selectedIndex].text;

    if (lastHomepage != "") {
        let a = document.getElementById(lastHomepage);
        a.style.visibility = "collapse";
    } 

    let p = document.getElementById(currentHomepage);
    p.style.visibility = "visible";
    lastHomepage = currentHomepage;
}

function changeGrid() {
    var e = document.getElementById("gridOption");
    var currentGrid = e.options[e.selectedIndex].text;

    if (lastGrid != "") {
        let a = document.getElementById(lastGrid);
        a.style.visibility = "collapse";
    } 

    let p = document.getElementById(currentGrid);
    p.style.visibility = "visible";
    lastGrid = currentGrid;
}


/*
    require(['TYPO3/CMS/Core/Ajax/AjaxRequest'], function (AjaxRequest) {
    var testButtons = document.getElementsByClassName("testButton");

    let test = function (element){
        var element = this;

        const randomNumber = Math.ceil(Math.random() * 32);
        new AjaxRequest(TYPO3.settings.ajaxUrls.test_test)
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
*/

/*
require(['TYPO3/CMS/Core/Ajax/AjaxRequest'], function (AjaxRequest) {
    // Generate a random number between 1 and 32
    const randomNumber = Math.ceil(Math.random() * 32);
    new AjaxRequest(TYPO3.settings.ajaxUrls.testingAjax)
        .withQueryArguments({input: 1})
        .get()
        .then(async function (response) {
            const resolved = await response.resolve();

            console.log(resolved.result);
        });
});
 */

