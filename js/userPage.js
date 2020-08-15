var add=document.getElementById('add')
var addProjectForm=document.getElementById('addProjectForm')

add.addEventListener('click',function(){
	addProjectForm.style.display='block'
})

addProjectForm.addEventListener('submit',function(){
	addProjectForm.style.display='none'
})
