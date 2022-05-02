var profilePicturePreview = function (event) {
    if (event.target.files[0]) {
        let placeholder = document.getElementById("profilePicturePlaceholder");
        placeholder.classList.remove("outline");

        document.getElementById("labelProfilePicturePreview").innerHTML = "";
        document.getElementById("labelProfilePicturePreview").innerHTML =
            "<img id='preview-profile-picture'/>";
        let image = document.getElementById("preview-profile-picture");
        image.src = URL.createObjectURL(event.target.files[0]);
    }
};

var profilePictureDisplay = function (event) {
    if (event.target.files[0]) {
        document.getElementById("labelProfilePictureDisplay").innerHTML = "";
        document.getElementById("labelProfilePictureDisplay").innerHTML =
            "<img id='display-profile-picture'/>";
        let image = document.getElementById("display-profile-picture");
        image.src = URL.createObjectURL(event.target.files[0]);
    }
};

// var roleIndicator = function () {
//     let role = document.getElementById("roleIndicator");
//     let selector = document.getElementById("roleSelectList");
//     role.innerHTML = selector.value;
// };

var roleSelect = function () {
    let selector = document.getElementById("roleSelectList");
    let url = "home/" + selector.value;
    document.location.href = url;
};

var roleChange = function () {
    let selector = document.getElementById("roleSelectList");
    document.location.href = selector.value;
};
