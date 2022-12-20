let chosenImage = document.getElementById("chosen-image");
let uploadBtn = document.getElementById("upload-btn");
let uploadFile = document.getElementById("upload-file");

uploadFile.onchange = () => {
  let reader = new FileReader();
  reader.readAsDataURL(uploadFile.files[0]);
  var fileName = uploadFile.files[0]['name'];
  var allowed_extensions = ["jpg","png","jpeg"];
  var file_extension = fileName.split('.').pop().toLowerCase(); 
  for(var i = 0; i <= allowed_extensions.length; i++)
  {
      if(allowed_extensions[i] == file_extension)
      {
        reader.onload = () => {
          chosenImage.setAttribute("src", reader.result);
          document.getElementById("invalidImage").innerHTML = "";
        }       
      } else if((allowed_extensions[i] !== file_extension)) {
        chosenImage.setAttribute("src", "./img/user.png");
        document.getElementById("invalidImage").innerHTML = "Invalid Image Extension";
      }
  }
};

