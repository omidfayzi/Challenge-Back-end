var statusText = document.getElementById('status');
var statusMark = document.getElementById('statusMark');

statusText.style.visibility = "hidden";


statusMark.addEventListener('change', function () {
    statusText.value = "voldaan";

    console.log(statusText.value)
})


