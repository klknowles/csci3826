var request = null;

function getCurrentTime()
{
    request = new XMLHttpRequest();
    var url = "common/time.php";
    request.open("GET", url, true);
    request.onreadystatechange = updatePage;
    request.send(null);
}

function updatePage()
{
    if (request.readyState == 4)
    {
        var dateDisplay = document.getElementById("datetime");
        dateDisplay.innerHTML = request.responseText;
    }
}

getCurrentTime();
setInterval('getCurrentTime()', 60000);
