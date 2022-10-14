const devices = document.getElementById("devices")
const analysis = document.getElementById("analysis")
const temp = document.getElementById("temp")

devices.addEventListener("click", () =>{
    document.getElementById("tablepage").style.display = "block"
    document.getElementById("graph").style.display = "none"
    document.getElementById("chart").style.display = "none"
    analysis.classList.remove("active")
    devices.classList.add("active")
    temp.classList.remove("active")
})

analysis.addEventListener("click", () =>{
    document.getElementById("tablepage").style.display = "none"
    document.getElementById("graph").style.display = "block"
    document.getElementById("chart").style.display = "none"
    analysis.classList.add("active")
    devices.classList.remove("active")
    temp.classList.remove("active")

})

temp.addEventListener("click", () =>{
    document.getElementById("tablepage").style.display = "none"
    document.getElementById("graph").style.display = "none"
    document.getElementById("chart").style.display = "block"
    analysis.classList.remove("active")
    devices.classList.remove("active")
    temp.classList.add("active")
})