function loadPic() {
    var roverValue = document.getElementById("rover");
    var rover = roverValue.options[roverValue.selectedIndex].value;
    var cameraValue = document.getElementById("camera");
    var camera = cameraValue.options[cameraValue.selectedIndex].value;
    $query = "processor.php?rover=" + rover + "&camera=" + camera + "&t=" + new Date();
    $.get($query, function(data){
        document.getElementById("picture").innerHTML = data;
    });
}