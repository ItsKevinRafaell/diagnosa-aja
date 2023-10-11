const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;
nextBtnFirst.addEventListener("click", function(event){
    let nama = document.getElementById('nama-depan').value.trim();
    let email = document.getElementById('email').value;

    let errorNama = document.getElementById('error-nama');
    let errorEmail = document.getElementById('error-email');

    let isValid = true;
    const errorMessage = 'Wajib Di isi';

    // Validasi Nama
    if (nama === '') {
        errorNama.textContent = errorMessage;
        isValid = false;
    } else {
        errorNama.textContent = '';
    }

    // Validasi Email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errorEmail.textContent = errorMessage;
        isValid = false;
    } else {
        errorEmail.textContent = '';
    }
    
    event.preventDefault();
    if(isValid){ 
        slidePage.style.marginLeft = "-25%";
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        current += 1;
    }
}); 

nextBtnSec.addEventListener("click", function(event){  
  let umur = document.getElementById('umur').value.trim();
  let gender = document.getElementsByName('gender')[0].value;

  let errorUmur = document.getElementById('error-umur');
  let errorGender = document.getElementById('error-gender');

  let isValid = true;
  const errorMessage = 'Wajib Di isi';

  // Validasi Umur
  if (umur === '') {
      errorUmur.textContent = errorMessage;
      isValid = false;
  } else if (umur > 200) { 
    errorUmur.textContent = 'Maks 200';
    isValid = false;
  } else {
      errorUmur.textContent = '';
  }

  // Validasi Jenis Kelamin
  if (gender === '') {
      errorGender.textContent = errorMessage;
      isValid = false;
  } else {
      errorGender.textContent = '';
  } 

  event.preventDefault();
  if(isValid){ 
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  } 
});

nextBtnThird.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-75%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});

submitBtn.addEventListener("click", function(event){
event.preventDefault();
  // let username = document.getElementById('username').value.trim();
  let password = document.getElementById('password').value.trim();
  
  // let errorUsername = document.getElementById('error-username');
  let errorPassword = document.getElementById('error-password');
  
  let isValid = true;
  const errorMessage = 'Wajib Di isi';
  
  // Validasi Umur
    // if (username === '') {
    //     errorUsername.textContent = errorMessage;
    //     isValid = false; 
    // } else {
    //     errorUsername.textContent = '';
    // }

// Validasi password
if (password === '') {
    errorPassword.textContent = errorMessage;
    isValid = false;
} else {
    errorPassword.textContent = '';
}  

if (isValid) {
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
}

  // setTimeout(function(){
  //   alert("Your Form Successfully Signed up");
  //   location.reload();
  // },800);  
});

prevBtnSec.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});

prevBtnThird.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});

prevBtnFourth.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
}); 


$(document).ready(function(){
 
    $('.add-input').click(function() {
        let uniqid = Date.now();
        let inputElement = `
        <div class="box-riwayat">
            <input type="text" class="riwayat-${uniqid}" id="riwayat-${uniqid}"> 
            <div class="trash fas fa-trash" id="trash-${uniqid}"></div>
        </div>`;
        $('.overlay-riwayat').append(inputElement);

      // Function Hapus per Item
      $('.overlay-riwayat').on('click', `#trash-${uniqid}`, function() {
          $(this).parent().remove(); 
      });
    }); 

  $('#umur').on('input', function(){
      var umurValue = $(this).val().trim();   
      $(this).val(umurValue.replace(/\D/g, '')); 

  });
});