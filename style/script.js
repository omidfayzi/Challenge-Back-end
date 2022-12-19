var statusText = document.getElementById('status');
var statusMark = document.getElementById('statusMark');

statusText.style.visibility = "hidden";

statusMark.addEventListener('change', function () {
    if(statusText.value == "voldaan") {
        statusText.value = "NIET voldaan";
    } else if(statusText.value == "NIET voldaan") {
        statusText.value = "voldaan"
    }
    console.log(statusText.value)
})



