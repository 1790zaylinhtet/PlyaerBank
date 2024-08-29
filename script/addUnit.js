//Fetch img and admin register upload
async function fetchImg() {
    var formdata = new FormData();
    formdata.append('key', Fkey);
    formdata.append('image', Fphoto.files[0]);
    await fetch("https://api.imgbb.com/1/upload", {
        method: "post",
        body: formdata
    }).then(response => response.json()).then(data => {
        img = data.data.display_url;
        uploadPhp(img);
        console.log(img);
    });
}

async function uploadPhp(img) {
    let formData = new FormData();
    formData.append("img", img);
    formData.append("gameid", Fgameid.value);
    formData.append("product", Fproduct.value);
    formData.append("price", Fprice.value);

    await fetch("../admin/addUnitJumper.php", {
        method: "post",
        body: formData
    }).then(response => response.json()).then(data => {
        if (data.error == "") {
            console.log(data.success);
        } else if (!(data.error == "")) {
            window.alert(data.error);
        }
    });
}