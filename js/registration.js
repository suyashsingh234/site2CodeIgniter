var loginBtn=document.getElementById('loginBtn');
var signupBtn=document.getElementById('signupBtn');
var loginForm=document.getElementById('loginForm');
var signupForm=document.getElementById('signupForm');
var white="#ffffff";
var silver="#C0C0C0";

loginBtn.addEventListener('click',function(){
	loginBtn.style.backgroundColor=white;
	loginForm.style.display="block";
	signupBtn.style.backgroundColor=silver;
	signupForm.style.display="none";
});

signupBtn.addEventListener('click',function(){
	signupBtn.style.backgroundColor=white;
	signupForm.style.display="block";
	loginBtn.style.backgroundColor=silver;
	loginForm.style.display="none";
});
