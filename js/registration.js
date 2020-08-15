var loginBtn=document.getElementById('loginBtn');
var signupBtn=document.getElementById('signupBtn');
var loginForm=document.getElementById('loginForm');
var signupForm=document.getElementById('signupForm');

loginBtn.addEventListener('click',function(){
	loginBtn.style.backgroundColor="#00FF00";
	loginForm.style.display="block";
	loginBtn.style.color="white";
	signupBtn.style.backgroundColor="white";
	signupForm.style.display="none";
	signupBtn.style.color="black";
});

signupBtn.addEventListener('click',function(){
	signupBtn.style.backgroundColor="#00FF00";
	signupForm.style.display="block";
	signupBtn.style.color="white";
	loginBtn.style.backgroundColor="white";
	loginForm.style.display="none";
	loginBtn.style.color="black";
});
