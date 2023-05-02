
function toogleAvatar() {
	document.getElementById("myDropdown").classList.toggle("hidden");
}

document.getElementsByTagName("nav").item(0).addEventListener("mouseleave",(event)=>{
    document.getElementById("myDropdown").classList.add("hidden");
});