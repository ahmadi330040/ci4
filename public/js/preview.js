function previewImg(){

  const img_bank = document.querySelector('#img_bank');
  const imgLabel = document.querySelector('.form-label');
  const imgPreview = document.querySelector('.img-preview');

  imgLabel.textContent = img_bank.files[0].name;

  const fileImage = new FileReader();
  fileImage.readAsDataURL(img_bank.files[0]);

  fileImage.onload = function(e) {
    imgPreview.src = e.target.result;
  }
}
