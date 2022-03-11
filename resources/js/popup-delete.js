$(document).ready(function()
{
    $("button").click(function()
        {
            $("text").load("text.txt", function(responseText, statusText, xhr)
            {
                if(statusText == "success")
                {
                    console.log("We have success");
                }
                if(statusText == "error")
                {
                    console.log("Error: " + xhr.status + ": " + xhr.statusText);
                }
            })
        });
});