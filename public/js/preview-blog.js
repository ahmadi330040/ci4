function previewImg(){

    const imgpath = document.querySelector('#imgpath');
    const imgLabel = document.querySelector('.form-label');
    const imgPreview = document.querySelector('.img-preview');
  
    imgLabel.textContent = imgpath.files[0].name;
  
    const fileImage = new FileReader();
    fileImage.readAsDataURL(imgpath.files[0]);
  
    fileImage.onload = function(e) {
      imgPreview.src = e.target.result;
    }
  }
  